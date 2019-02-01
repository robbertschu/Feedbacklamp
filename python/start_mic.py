import sounddevice as sd
from numpy import linalg as LA
import numpy as np
from push_lamp_data import push_lamp_data
from RPI_RGB import greenOn, redOn, yellowOn, Off

duration = 10 # seconds
x = []
lamp_name = "HL-15-VERD-01-LMP-01"#"Hl-15-VERD-02-LMP-01"
calm = 50
moderate = 60
loud = 70

def print_sound(indata, outdata, frames, time, status):
    volume_norm = np.linalg.norm(indata)*10
    if int(volume_norm) >= 50:
        x.append(int(volume_norm))
        print (int(volume_norm))
    return x

while True:
    with sd.Stream(callback=print_sound):
        sd.sleep(duration * 1000)
    print(x)
    try:
        gem = sum(x)/len(x)
        print(gem)
        if gem >= calm and gem < moderate:
            print("Groen")
            Off()
            greenOn()
            push_lamp_data(lamp_name, "Groen", gem)
        elif gem >= moderate and gem < loud:
            print("Geel")
            Off()
            yellowOn()
            push_lamp_data(lamp_name, "Geel", gem)
        elif gem >= loud:
            print("Rood")
            Off()
            redOn()
            push_lamp_data(lamp_name, "Rood", gem)
        x = []
    except ZeroDivisionError:
        x = []
        Off()
        greenOn()
        continue
        
    
    
    
