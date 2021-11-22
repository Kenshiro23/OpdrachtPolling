#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>

const char* ssid = "WIFIIICT";
const char* password = "fakatijger";
int potValue = 0;

String serverName = "http://10.3.41.36/LM35.php";

float vref = 3.3;
float resolution = vref/1023;

String Vstate = "0";
String Lstate = "0";

WiFiServer server(81);
String header;

unsigned long lastTime = 0;
unsigned long timerDelay = 1000;

unsigned long currentTime = millis();
// Previous time
unsigned long previousTime = 0; 
// Define timeout time in milliseconds (example: 2000ms = 2s)
const long timeoutTime = 2000;

void setup() {
 pinMode(A0,OUTPUT);
 pinMode(5,OUTPUT);
 pinMode(4,OUTPUT);
 Serial.begin(115200); 

  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(100);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
  Serial.println("Timer set to 5 seconds (timerDelay variable), it will take 5 seconds before publishing the first reading.");
  
}

void loop() {
 float temperature = analogRead(A0);
 float millivolts = (temperature/1024.0) * 3300; //3300 is the voltage provided by NodeMCU
 float celsius = millivolts/10;
 delay(1000);
  

 if ((millis() - lastTime) > timerDelay) {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
      WiFi.hostname("Keuken");
      WiFiClient client;
      HTTPClient http;
      String serverPath = serverName + "?T="+ celsius + "&" + "V=" + Vstate + "&" + "L=" + Lstate + "&" + "P=Keuken";
      
      http.begin(client, serverPath.c_str());
      
      // Send HTTP GET request
      int httpResponseCode = http.GET();

      String data = http.getString();
      String idealeTemp = data.substring(data.indexOf("x") + 1, data.indexOf("+"));
      String Lamp = data.substring(data.indexOf("+") + 1);

      if (Lamp == "Aan"){
          Lstate = "1";
          digitalWrite(5, HIGH);
      }else{
          Lstate = "0";
          digitalWrite(5, LOW);
      }

      if (idealeTemp.toFloat() > celsius){
        Vstate = "1";
        digitalWrite(4, HIGH);
      }else{
        Vstate = "0";
        digitalWrite(4, LOW);
      }
      
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
        Serial.println(serverPath);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      // Free resources
      http.end();
    }
 }
}
