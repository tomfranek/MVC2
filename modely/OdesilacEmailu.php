<?php


// Pomocná třída, poskytující metody pro odeslání emailu

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class OdesilacEmailu
{

	// Odešle email jako HTML, lze tedy používat základní HTML tagy a nové
	// řádky je třeba psát jako <br /> nebo používat odstavce. Kódování je
	// odladěno pro UTF-8.
	public function odesli($komu, $predmet, $zprava, $od)
	{

		require 'vendor/autoload.php';

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.seznam.cz';  //gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 465;
        $mail->Username   = "ISA3b@seznam.cz";
        $mail->Password   = "Heslo1234";
      
        $mail->IsHTML(true);
        $mail->AddAddress("tomfranek@seznam.cz", "recipient-name");
        $mail->SetFrom("ISA3b@seznam.cz", "set-from-name");
        $mail->Subject = "Odesláno z kontaktní stránky ISA3b:".$od
      .  
        $content = "<b>This is a Test Email sent via SEZNAM using PHP mailer class.</b>".$zprava;
      
        $mail->MsgHTML($content); 
        if(!$mail->Send()) {
          //echo "Error while sending Email.";
          //var_dump($mail);
          return false;
        } else {
        
          return true;
        }


    }




		
		
	
}