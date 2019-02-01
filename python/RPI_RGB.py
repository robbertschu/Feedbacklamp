import sys, time
import RPi.GPIO as GPIO

redPin = 11
greenPin = 13
bluePin = 15
#Kleuren aan pinlocaties koppelen

GPIO.setwarnings(False)
#Zet waarschuwingen voor pinactiviteiten uit

def blink(pin):
#Zet lamp via pins aan
        GPIO.setmode(GPIO.BOARD)
        GPIO.setup(pin, GPIO.OUT)
        GPIO.output(pin, GPIO.HIGH)

def turnOff(pin):
#Zet lamp via pins uit
        GPIO.setmode(GPIO.BOARD)
        GPIO.setup(pin, GPIO.OUT)
        GPIO.output(pin, GPIO.LOW)

def redOn():
        blink(redPin)
	
def greenOn():
        blink(greenPin)
	
def blueOn():
        blink(bluePin)
	
def yellowOn():
        blink(redPin)
        blink(greenPin)

def Off():
        turnOff(bluePin)
        turnOff(redPin)
        turnOff(greenPin)