
import sys
import smtplib
import random
import time

from email.MIMEMultipart import MIMEMultipart
from email.MIMEText import MIMEText




#taking the email address from database
email= str(sys.argv[1])

server = smtplib.SMTP('smtp.gmail.com', 587)
server.ehlo()
server.starttls()
#Next, log in to the server
server.login("otpc850@gmail.com", "test@amex123")

#Generating OTP 
otp = random.randint(1000, 9999)
t = str(otp)
print(t) 
#Send the mail
msg = MIMEMultipart()
msg["Subject"] = "One time password"
msg["From"] = "otpc850@gmail.com"
msg["To"] = email

text = """\
Hi,
Your OTP is :""" + str(otp)

body = MIMEText(text, "plain")
msg.attach(body)

#sending OTP
server.sendmail("otpc850@gmail.com", email, msg.as_string())


#verifying OTP
# start_time = time.time()
#  inp = input("Enter otp to proceed : ")
# time_total = time.time() - start_time
# if str(inp)==str(otp) and time_total<60:
# 	print("correct!")
# elif str(inp)==str(otp) :
# 	print("timed out!")
# else:
# 	print("Incorrect!")