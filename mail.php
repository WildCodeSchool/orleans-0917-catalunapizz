<?php

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
->setUsername('catalunapizzmail@gmail.com')
->setPassword('w1ld3er!!')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message($subject))
->setFrom([$mail => $name])
->setTo(['f.gabrielcalixte@gmail.com'])
->setBody($message)
;

// Send the message
$result = $mailer->send($message);
