#include <ESP8266WiFi.h>
#include <SPI.h>
#include <MFRC522.h>


#define SS_PIN D8 
#define RST_PIN D0 
MFRC522 rfid(SS_PIN, RST_PIN); 
MFRC522::MIFARE_Key key;

// network settings
const char* ssid = "ToJestWajFaj";
const char* password = "jestemswiderek";
const char* host = "192.168.10.3";
const int httpPort = 80;

//adres pliku log.php   192.168.10.3:80/log.php

void setup()
{
  pinMode(D1, OUTPUT);
  Serial.begin(9600);
  Serial.println("hello, this is a RFID node");
  
  // Connect to WiFi
  Serial.print("Connecting to WiFi ");
  WiFi.begin(ssid, password);


  while (WiFi.status() != WL_CONNECTED) {
    delay(624);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("############################################################");
  Serial.print("Connected to SSID: ");
  Serial.println(ssid);
  Serial.print("My IP: ");
  Serial.println(WiFi.localIP());
  Serial.print("send rfuid to host: ");
  Serial.print(host);
  Serial.print(":");
  Serial.println(httpPort);
  Serial.println("############################################################");
  Serial.println("");
  Serial.println("");
  Serial.println("ready, waiting for rfid card to hit me");
  Serial.println("");
  
  SPI.begin();
  rfid.PCD_Init();
}

void loop(void) {
  delay(150);
  handleRFID();
}

void handleRFID() {
  
  if (!rfid.PICC_IsNewCardPresent()) return;
  if (!rfid.PICC_ReadCardSerial()) return;
  
  String card_uid = printHex(rfid.uid.uidByte, rfid.uid.size);
  String ausgabe = "/log.php?rfid=" + String(card_uid);
  Serial.print("sending card_uid to server: ");
  Serial.print(card_uid);
  Serial.print(" - ");
  
  WiFiClient client;
  
  if (!client.connect(host, httpPort)) {
    Serial.print("[FAILED]  (connection to ");
    Serial.print(host);
    Serial.println(" failed)");
    return;
  }
  
  client.print(String("GET ") + String(ausgabe) + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
   Serial.print("[OK]");
   delay(2000);
}

String printHex(byte *buffer, byte bufferSize) {
  String id = "";
  for (byte i = 0; i < bufferSize; i++) {
    id += buffer[i] < 0x10 ? "0" : "";
    id += String(buffer[i], HEX);
  }
  return id;
}
