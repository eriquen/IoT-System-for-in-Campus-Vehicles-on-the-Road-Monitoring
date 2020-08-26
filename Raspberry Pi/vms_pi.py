import cv2
import imutils
import numpy as np
import pytesseract
from PIL import Image
import RPi.GPIO as IO
from gpiozero import LED
import time
import requests
from PIL import Image
from time import sleep
from datetime import datetime
from picamera import PiCamera


IO.setwarnings(False)
IO.setmode(IO.BCM)

led1 = LED(14)
led2 = LED(15)
IO.setup(23, IO.IN)  # GPIO 23 -> IR sensor as input 1
IO.setup(24, IO.IN)  # GPIO 14 -> IR sensor as input 2
camera = PiCamera()

i = 1
t1 = 1
t2 = 2
FMT = '%H:%M:%S'

try:
    while True:
        print("System Start\n")

        print("Get speed limit from server\n")
        speed = requests.post('http://192.168.137.1/VMS/API/getSpeed.php')
        speedLimit = int(speed.text)
        print(speedLimit.text)
        while 1:
            if(IO.input(23) == False):  # IR sensor 1
                led1.off
                led2.off
                print("vehicle pass first sensor")
                t1 = datetime.now()
                t12 = t1.strftime("%H:%M:%S")

                while IO.input(24) == True:
                    if(IO.input(24) == False):
                        print("vehicle pass second sensor")

                        # led2.on()
                        t2 = datetime.now()
                        t22 = t2.strftime("%H:%M:%S")
                        elapse = datetime.strptime(
                            t22, FMT) - datetime.strptime(t12, FMT)
                        # print(elapse.seconds)
                        speed = 0.04/((float(elapse.seconds)/60)/60)
                        print("Speed of vehicle(km/h): "+str(speed))

                        if(speed > speedLimit):
                            led2.on
                            print("Vehicle Exceed the speed limit")
                            print("Taking photo of vehicle")

                            camera.start_preview()
                            sleep(5)
                            camera.capture(
                                '/home/pi/Desktop/iot/image' + str(i) + '.jpg')
                            print('/home/pi/Desktop/iot/image' + str(i) + '.jpg')
                            camera.stop_preview()

                            print("\n")

                            #img = cv2.imread('image' + str(i) + '.jpg',cv2.IMREAD_COLOR)
                            img = cv2.imread('image.jpg', cv2.IMREAD_COLOR)
                            cv2.imshow('Cropped', img)
                            img = cv2.resize(img, (620, 480))

                            # convert to grey scale
                            gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
                            gray = cv2.bilateralFilter(
                                gray, 11, 17, 17)  # Blur to reduce noise
                            # Perform Edge detection
                            edged = cv2.Canny(gray, 30, 200)

                            # find contours in the edged image, keep only the largest
                            # ones, and initialize our screen contour
                            cnts = cv2.findContours(
                                edged.copy(), cv2.RETR_TREE, cv2.CHAIN_APPROX_SIMPLE)
                            cnts = imutils.grab_contours(cnts)
                            cnts = sorted(
                                cnts, key=cv2.contourArea, reverse=True)[:10]
                            screenCnt = None

                            # loop over our contours
                            for c in cnts:
                                # approximate the contour
                                peri = cv2.arcLength(c, True)
                                approx = cv2.approxPolyDP(
                                    c, 0.018 * peri, True)
                                # if our approximated contour has four points, then
                                # we can assume that we have found our screen
                                if len(approx) == 4:
                                    screenCnt = approx
                                    break

                            # Masking the part other than the number plate
                            mask = np.zeros(gray.shape, np.uint8)
                            new_image = cv2.drawContours(
                                mask, [screenCnt], 0, 255, -1,)
                            new_image = cv2.bitwise_and(img, img, mask=mask)

                            # Now crop
                            (x, y) = np.where(mask == 255)
                            (topx, topy) = (np.min(x), np.min(y))
                            (bottomx, bottomy) = (np.max(x), np.max(y))
                            Cropped = gray[topx:bottomx+1, topy:bottomy+1]

                            # Read the number plate
                            text = pytesseract.image_to_string(
                                Cropped, config='--psm 7 -c tessedit_char_whitelist=0123456789.%')
                            print(text)

                            i = i + 1
                            break
                            #img =Image.open ('1.png')
                            #text = pytesseract.image_to_string(img, config='')
                            #print (text)
                        led1.on

except KeyboardInterrupt:
    print("Press Ctrl-C to terminate while statement")
    IO.cleanup()
    pass
