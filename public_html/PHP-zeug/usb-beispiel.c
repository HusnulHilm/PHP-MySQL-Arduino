/* jw24f8.c
 * Created on: Jan 15, 2014 By  JPL
 *   Based on: generic_hid.c (Apr 22, 2011) By Jan Axelson
 *
 * Demonstrates communicating with the JoyWarrior24F8 device using HID interface.
 * Sends and receives 8-byte feature control reports.
 * Most of the routines are adapted from codemercs windows code for the 
 * tilt program available here:
 * http://www.codemercs.com/uploads/tx_sbdownloader/jw24f8_win_software_01.zip
 * See functions.ccp and functions_jw24f8.ccp source codes. 
 *
 * the 10 bit acceleration value will come within 2 bytes, msb and lsb,
 * msb: yyyyyyyy, lsb: xx000000. to get the right value, msb must be shifted
 * 2 positions to the left, lsb must shift 6 positions to the right, and
 * afterwards lsb and msb must be added:
 *   msb: yyyyyyyy shiftet --> yyyyyyyy00
 *   lsb: xx000000 shifted --> 00000000xx
 *   10 bit result: yyyyyyyyxx
 * to convert this to a value of type short, the sign must be expanded:
 *   positive: yyyyyyyyxx --> 000000yyyyyyyyxx
 *   negative: yyyyyyyyxx --> 111111yyyyyyyyxx
 *
 * Note: libusb error codes are negative numbers.
 * Note: very limited error checking is done to speedup runtime
 
******************************************** 
******************* Compiling **************
******************************************** 
* The application uses the libusb 1.0 API from libusb.org
* which must be installed first.
* 
* Compile the application with:
* 
* gcc -Wall -lusb-1.0 -lm -o jw24f8 jw24f8.c 
* 
*/


#include <errno.h>
#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <math.h>
#include <fcntl.h>
#include <time.h>
#include "/usr/local/include/libusb-1.0/libusb.h"

/* Enter Vendor and Product ID for the device: */
#define VENDOR_ID  0x07c0 // Vendor code
#define PRODUCT_ID 0x1113 // product code

/* Values for bmRequestType in the Setup transaction's Data packet. */
static const int CONTROL_REQUEST_TYPE_IN = LIBUSB_ENDPOINT_IN | LIBUSB_REQUEST_TYPE_CLASS | LIBUSB_RECIPIENT_INTERFACE;
static const int CONTROL_REQUEST_TYPE_OUT = LIBUSB_ENDPOINT_OUT | LIBUSB_REQUEST_TYPE_CLASS | LIBUSB_RECIPIENT_INTERFACE;

/* From the HID spec:*/
static const int HID_GET_REPORT = 0x01;
static const int HID_SET_REPORT = 0x09;
static const int HID_REPORT_TYPE_INPUT = 0x01;
static const int HID_REPORT_TYPE_OUTPUT = 0x02;
static const int HID_REPORT_TYPE_FEATURE = 0x03;

/* With firmware support, transfers can be greater than the endpoint's max packet size. */
static const int MAX_CONTROL_IN_TRANSFER_SIZE = 8;
static const int MAX_CONTROL_OUT_TRANSFER_SIZE = 8;
static const int INTERFACE_NUMBER = 1;
static const int TIMEOUT_MS = 0;

/* Prototypes */
/* open device an detach from kernel driver */
struct libusb_device_handle * jw24f8_open(unsigned char serial[256], unsigned char product[256]);

/* close device, release to kernel driver */
void jw24f8_close(libusb_device_handle *devh);

/* send control transfer message to device */
unsigned char jw24f8_write(libusb_device_handle *devh,unsigned char address,unsigned char data);

/* get control transfer message from device */
unsigned char jw24f8_read(libusb_device_handle *devh,unsigned char cmd,unsigned char address);

/* get the x,y,z data by sending sucessive control transfer messages to device */
void jw24f8_get_xyz(libusb_device_handle *devh,float *X,float *Y,float *Z);

/* convert msb, lsb --> 10-bit value --> short value */
short jw24f8_calc_byte(unsigned char msb,unsigned char lsb);  

/* run data retrieval */ 
int run(int output); 

/* display help info */
void usage(char msg[]);



int main(int argc, char *argv[])
  { 
  int result;
  if (argc > 2) usage("Too many options");
  result = libusb_init(NULL);                // start the libusb functionality
  if (result < 0)
    {
    fprintf(stderr,"Can't start libusb.\n");
    return 1;
    }
  // check command line arguments
  if (argc == 1) run(0);                     // run program
  else if (!strcmp(argv[1],"-h")) usage(""); // display help info
  else if (!strcmp(argv[1],"-o")) run(1);    // redirect output
  else usage("Option not available");
  libusb_exit(NULL);                         // exit the usblib  
  return 0;
  }


void usage(char msg[])
  {
  /* display help info */
  if (msg[0]) fprintf(stderr,"%s\n",msg);  
  fprintf(stderr,
  "usage:\n",
  "  jw [options]\n",
  "  options:\n",
  "   -h : print this help\n",
  "   -o : stream readings to std output\n",
  "        can be redirected to file by\n",
  "        jw24f8 -o > output.txt\n",
  "   no option will print x, y, z values to stderr only.\n");
  exit(1);
  }

int run(int output)
  {
  /* do the work:
   * open device an display product and serial info
   * loop displaying X, Y, Z coordinates until enter key ist pressed
   * argument:
   *   output == 0: print to stderr
   *   output != 0: print to stdout
   */
  struct libusb_device_handle *devh = NULL;    // device handle
  unsigned char serial[256], product[256]; 
  int result = 0, tmp = 0, n = 0;
  char c;
  float X, Y, Z;

  devh = jw24f8_open(serial, product); 
  if (devh != NULL)
    {
    if (output) printf("# Name: %s / Serial: %s\n",product,serial);
    else fprintf(stderr,"# Name: %s / Serial: %s\n",product,serial);
    if (output) printf("#        X            Y            Z\n");
    else fprintf(stderr,"#        X            Y            Z\n");

     // set the terminal for endless loop until Enter is pressed
     // (http://forums.fedoraforum.org/showthread.php?t=147415)     
    tmp = fcntl(0, F_GETFL, 0);
    fcntl (0, F_SETFL, (tmp | O_NONBLOCK));
    // enter the not-so-endless-now loop (exit loop on enter key press)
    while (n <= 0)
      {
      jw24f8_get_xyz(devh,&X,&Y,&Z); // read the true g values.
      // redirect output to a file or comment the line below
      if (output) printf("%12.2f %12.2f %12.2f\n",X,Y,Z);
      else fprintf(stderr,"%12.2f %12.2f %12.2f\r",X,Y,Z); 
      usleep(50000);
      n = read(0, &c, 1); // see if an enter key was pressed
      }
    fcntl(0, F_SETFL, tmp); // set the terminal back to normal
    jw24f8_close(devh);
    }
  else // in case of no device detected
    {
    fprintf(stderr,"No device found.\n");
    return 1;
    }
  fprintf(stderr,"\nDone.\n\n");
  return 0;
  }

struct libusb_device_handle * jw24f8_open(unsigned char serial[256], unsigned char product[256]) 
  /* open device an detach from kernel driver 
   * return parameters:
   *   serial: serial number
   *   product: product ID
   * return value:
   *   pointer to device handle (or NULL, if no success)
   */
  {
  struct libusb_device_handle *devh = NULL;    // device handle
  struct libusb_device *dev = NULL;            // device
  struct libusb_device_descriptor desc;        // device descriptor (name, product, serial etc.)
  int result = 0;
  devh = libusb_open_device_with_vid_pid(NULL, VENDOR_ID, PRODUCT_ID); // get the first available device
  if (devh != NULL)
    {
    dev = libusb_get_device(devh); // get the device
    libusb_detach_kernel_driver(devh, INTERFACE_NUMBER); // Detach the hidusb driver from the HID to enable using libusb.
    result = libusb_claim_interface(devh, INTERFACE_NUMBER); // claim control over the interface
    dev = libusb_get_device(devh); // get the device
    result = libusb_get_device_descriptor(dev,&desc); // get the device descriptor      
    libusb_get_string_descriptor_ascii(devh,desc.iProduct,product,256);// get name
    libusb_get_string_descriptor_ascii(devh,desc.iSerialNumber,serial,256); // get serial
    }
  return devh;
  }

void jw24f8_close(libusb_device_handle *devh)
  /* close device, release to kernel driver
   * parameters:
   *   devh: device handle
   */
  {
  libusb_release_interface(devh, INTERFACE_NUMBER);
  libusb_attach_kernel_driver(devh, INTERFACE_NUMBER);
  libusb_close(devh);
  }


unsigned char jw24f8_write(libusb_device_handle *devh, unsigned char address, unsigned char data)
  /* send control transfer message to device
   *   message format: [0x82][address][data]
   * parameters:
   *   devh: device handle
   *   address, data: message contents
   * return:
   *   result of command
   */
  {
  unsigned char buff[MAX_CONTROL_OUT_TRANSFER_SIZE];
  int bytes_sent, bytes_received;

  memset(buff, 0, sizeof(data));
  buff[0] = 0x82;
  buff[1] = address;
  buff[2] = data; 
  // send command
  bytes_sent = libusb_control_transfer(
      devh,
      CONTROL_REQUEST_TYPE_OUT,
      HID_SET_REPORT,
      (HID_REPORT_TYPE_OUTPUT<<8)|0x00,
      INTERFACE_NUMBER,
      buff,
      MAX_CONTROL_OUT_TRANSFER_SIZE,
      TIMEOUT_MS);
  // receive result
  if (bytes_sent >= 0)
    {
    libusb_clear_halt(devh,130);
    bytes_received = libusb_control_transfer(
        devh,
        CONTROL_REQUEST_TYPE_IN,
        HID_GET_REPORT,
        (HID_REPORT_TYPE_INPUT<<8)|0x00,
        INTERFACE_NUMBER,
        buff,
        MAX_CONTROL_IN_TRANSFER_SIZE,
        TIMEOUT_MS);
    }
  else
    {
    fprintf(stderr, "Error sending  command\n");
    }
  return buff[2];    
  }

unsigned char jw24f8_read(libusb_device_handle *devh, unsigned char cmd, unsigned char address)
  {
  /* send control transfer message to device and receive data
   *   message format: [cmd][address]
   *   cmd defines the amount of bytes to read (0x82: 1 byte .. 0x87: 5 bytes)
   * parameters:
   *   devh: device handle
   *   cmd: command
   *   address: message address
   * return:
   *   result of command
   */
  unsigned char data[MAX_CONTROL_OUT_TRANSFER_SIZE];
  int bytes_sent, bytes_received;
  
  memset(data, 0, sizeof(data));
  data[0] = cmd;          // 0x82 to read one byte 0x83 for two bytes etc. until 0x87;
  data[1] = address | 0x80; 
  // send command 
  bytes_sent = libusb_control_transfer(
      devh,
      CONTROL_REQUEST_TYPE_OUT,
      HID_SET_REPORT,
      (HID_REPORT_TYPE_OUTPUT<<8)|0x00,
      INTERFACE_NUMBER,
      data,
      MAX_CONTROL_OUT_TRANSFER_SIZE,
      TIMEOUT_MS);
  // receive data
  if (bytes_sent >= 0)
    {
    libusb_clear_halt(devh,130);
    bytes_received = libusb_control_transfer(
        devh,
        CONTROL_REQUEST_TYPE_IN,
        HID_GET_REPORT,
        (HID_REPORT_TYPE_INPUT<<8)|0x00,
        INTERFACE_NUMBER,
        data,
        MAX_CONTROL_IN_TRANSFER_SIZE,
        TIMEOUT_MS);
    }
  else
    {
    fprintf(stderr, "Error sending  command\n");
    }
  return data[2];    
  }

void jw24f8_get_xyz(libusb_device_handle *devh, float *X, float *Y, float *Z)
  // 
  /* get the x,y,z data by sending sucessive
   * control transfer messages to device
   * parameters:
   *   devh: device handle
   * return parameters:
   *   X, Y and Z acceleration
   */
  {
  double range;
  unsigned char lsb, msb;

  range = 8.0;
  // get the x data (addresses see datasheet)
  lsb = jw24f8_read(devh,0x82,0x02);
  msb = jw24f8_read(devh,0x82,0x03);
  *X  = jw24f8_calc_byte(msb,lsb)*range/2048.0;
  // get the y data
  lsb = jw24f8_read(devh,0x82,0x04);
  msb = jw24f8_read(devh,0x82,0x05);
  *Y  = jw24f8_calc_byte(msb,lsb)*range/2048.0;
  // get the z data
  lsb = jw24f8_read(devh,0x82,0x06);
  msb = jw24f8_read(devh,0x82,0x07);
  *Z  = jw24f8_calc_byte(msb,lsb)*range/2048.0;
  }


short jw24f8_calc_byte(unsigned char msb, unsigned char lsb)
  {
  /* convert msb, lsb --> 10 bit value --> short value */
  short erg, LSB, MSB, EXEC;

  /* calc neg. values; EXEC will produce
     correct two's complement 16 bit value.
     for neg. numbers EXEC will be:
     0xFC000 --> 1111 1100 0000 0000 */
  if (msb & 0x80) EXEC = 0xFC00;
  else EXEC = 0; 
  /* expand 8 bit MSB to 10 bit 
     xxxxxxxx --> xxxxxxxx00 */
  MSB = (msb << 2) & 0x03FF;
  /* extract 2 bit LSB 
     xx000000 --> 000000xx */
  LSB = ((lsb & 0xC0) >> 6) & 0x0003;
  /* combine all three values */ 
  erg = MSB | LSB | EXEC;
  return erg;
  }
