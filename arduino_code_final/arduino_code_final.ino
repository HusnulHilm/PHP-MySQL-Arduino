/////////////////
#define A 19
#define M 20
//#define S 2
int A_count = 0;
int M_count = 0;
String order;
/////////////////
//int Temperature_input1 = A2;
//int Temperature_input2 = A3;
//int Temperature_input3 = A4;
int Pressure_input = A1;
int strain_input = A0;
int strain_signal = 22;
//int stop_output = 13;
/////////////////
float pressure_result_1[100];
float pressure_result_2[100];
float pressure_result_3[100];
float pressure_result_4[100];
float pressure_result_5[100];
float pressure_result_moyen[100];
float strain_result_1[100];
float strain_result_2[100];
float strain_result_3[100];
float strain_result_4[100];
float strain_result_5[100];
float strain_result_moyen[100];
//float Temperature1_1;
//float Temperature1_2;
//float Temperature1_3;
//float Temperature1_4;
//float Temperature1_5;
//float Temperature1_moyen;
//float Temperature2_1;
//float Temperature2_2;
//float Temperature2_3;
//float Temperature2_4;
//float Temperature2_5;
//float Temperature2_moyen;
//float Temperature3_1;
//float Temperature3_2;
//float Temperature3_3;
//float Temperature3_4;
//float Temperature3_5;
//float Temperature3_moyen;
/////////////////

void setup() {
  pinMode(A, INPUT);
  pinMode(M, INPUT);
  //pinMode(S, INPUT);
  //pinMode(stop_output, OUTPUT);
  pinMode(Pressure_input, INPUT);
  pinMode(strain_input, INPUT);
  pinMode(strain_signal, INPUT);
  //pinMode(Temperature_input1, INPUT);
  //pinMode(Temperature_input2, INPUT);
  //pinMode(Temperature_input3, INPUT);
  Serial.begin(9600);
  attachInterrupt(digitalPinToInterrupt(M), M_CHANGE , RISING);
  attachInterrupt(digitalPinToInterrupt(A), A_CHANGE, RISING);
  //attachInterrupt(digitalPinToInterrupt(S), END_CHANGE , RISING);

}
void loop() {
  if (Serial.available() > 0) {
    order = Serial.readString();
    if (order == "ok\n") {
      M_count = 0;
      A_count = 0;
    }
  }
  if (M_count == 6 && order == "ok\n"  ) {
    //Temperature1_moyen = (Temperature1_1 + Temperature1_2 + Temperature1_3 + Temperature1_4 + Temperature1_5) / 5;
    //Temperature2_moyen = (Temperature2_1 + Temperature2_2 + Temperature2_3 + Temperature2_4 + Temperature2_5) / 5;
    //Temperature3_moyen = (Temperature3_1 + Temperature3_2 + Temperature3_3 + Temperature3_4 + Temperature3_5) / 5;
    for (int i = 0; i < 100; i++) {
      pressure_result_moyen[i] = (pressure_result_1[i] + pressure_result_2[i] + pressure_result_3[i] + pressure_result_4[i] + pressure_result_5[i]) / 5;
      strain_result_moyen[i] = (strain_result_1[i] + strain_result_2[i] + strain_result_3[i] + strain_result_4[i] + strain_result_5[i]) / 5;
    }
    //Serial.println(Temperature1_moyen);
    //delay(10);
    //Serial.println(Temperature2_moyen);
    //delay(10);
    //Serial.println(Temperature3_moyen);
    //delay(10);
    for (int i = 0; i < 100; i++) {
      Serial.println(pressure_result_moyen[i]);
      delay(10);
    }
    for (int i = 0; i < 100; i++) {
      Serial.println(strain_result_moyen[i]);
      delay(10);
    }
    M_count = 0;
  }
}
void A_CHANGE() {
  if (order == "ok\n") {
    if (M_count == 1) {
      if (A_count == 0) {
        //Temperature1_1 = analogRead(Temperature_input1);
        //Temperature2_1 = analogRead(Temperature_input2);
        //Temperature3_1 = analogRead(Temperature_input3);
      }
      pressure_result_1[A_count] = analogRead(Pressure_input);
      if (digitalRead(strain_signal) == LOW) {
        strain_result_1[A_count] = analogRead(strain_input);
      } else {
        strain_result_1[A_count] = -analogRead(strain_input);
      }

    }
    else if (M_count == 2) {
      if (A_count == 0) {
        //Temperature1_2 = analogRead(Temperature_input1);
        //Temperature2_2 = analogRead(Temperature_input2);
        //Temperature3_2 = analogRead(Temperature_input3);
      }
      pressure_result_2[A_count] = analogRead(Pressure_input);
      if (digitalRead(strain_signal) == LOW) {
        strain_result_2[A_count] = analogRead(strain_input);
      } else {
        strain_result_2[A_count] = -analogRead(strain_input);
      }
    }
    else if (M_count == 3) {
      if (A_count == 0) {
        //Temperature1_3 = analogRead(Temperature_input1);
        //Temperature2_3 = analogRead(Temperature_input2);
        //Temperature3_3 = analogRead(Temperature_input3);
      }
      pressure_result_3[A_count] = analogRead(Pressure_input);
      if (digitalRead(strain_signal) == LOW) {
        strain_result_3[A_count] = analogRead(strain_input);
      } else {
        strain_result_3[A_count] = -analogRead(strain_input);
      }
    }
    else if (M_count == 4) {
      if (A_count == 0) {
        //Temperature1_4 = analogRead(Temperature_input1);
        //Temperature2_4 = analogRead(Temperature_input2);
        //Temperature3_4 = analogRead(Temperature_input3);
      }
      pressure_result_4[A_count] = analogRead(Pressure_input);
      if (digitalRead(strain_signal) == LOW) {
        strain_result_4[A_count] = analogRead(strain_input);
      } else {
        strain_result_4[A_count] = -analogRead(strain_input);
      }
    }
    else if (M_count == 5) {
      if (A_count == 0) {
        //Temperature1_5 = analogRead(Temperature_input1);
        //Temperature2_5 = analogRead(Temperature_input2);
        //Temperature3_5 = analogRead(Temperature_input3);
      }
      pressure_result_5[A_count] = analogRead(Pressure_input);
      if (digitalRead(strain_signal) == LOW) {
        strain_result_5[A_count] = analogRead(strain_input);
      } else {
        strain_result_5[A_count] = -analogRead(strain_input);
      }
    }
    else if (M_count == 6) {
      digitalWrite(13, HIGH);
    }
    else {

    }
    A_count++;
    if (A_count == 100) {
      A_count = 0;
    }
  }
}
void M_CHANGE() {
  if (order == "ok\n") {
    M_count++;
    A_count = 0;
  }

}
void END_CHANGE() {
  noInterrupts();
  detachInterrupt(digitalPinToInterrupt(M));
  detachInterrupt(digitalPinToInterrupt(A)) ;
  //detachInterrupt(digitalPinToInterrupt(S)) ;
}
