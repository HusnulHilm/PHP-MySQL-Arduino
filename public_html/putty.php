#!/usr/bin/python
# -*- coding: utf-8 -*-

import serial
import sys

if len(sys.argv) != 3:
    print "Please specify a port and a baudrate, e.g. %s /dev/ttyUSB0 115200" % sys.argv[0]
    sys.exit(-1)

ser = serial.Serial(sys.argv[1], sys.argv[2])

while 1:
	sys.stdout.write(ser.readline())
