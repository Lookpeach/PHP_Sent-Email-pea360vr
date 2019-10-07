<?php

    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set("Asia/Bangkok");
	
	/***
	Server SMTP/POP : mail.thaicreate.com
	Email Account : webmaster@thaicreate.com
	Password : 123456
	*/
	require_once('class.phpmailer.php');
	
	$emailSend = $_REQUEST['email'];
	$nameSend = $_REQUEST['name'];

	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->IsHTML(true);
	$mail->IsSMTP();
	$mail->SMTPAuth = true; // enable SMTP authentication
	$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = 465; // set the SMTP port for the GMAIL server
	$mail->Username = "ascript.info@gmail.com"; // GMAIL username
	$mail->Password = "Ascript@11"; // GMAIL password
	$mail->From = "webmaster@blueelp.com"; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = "PEA VR Event";  // set from Name
	$mail->Subject = "ส่ง โปรโมชั้น รถ FOMM 1.0 ถึงคุณ ลูกค้า.";
	$mail->Body = "สวัสดีครับ คุณ ".$nameSend."<br><b>นี่คือรายละเอียดโปรโมชั่น</b>";

	$mail->AddAddress($emailSend, $nameSend); // to Address

	$mail->AddAttachment("3FOMM3.jpg");
	$mail->AddAttachment("QRCode.png");
	//$mail->AddAttachment("thaicreate/myfile2.zip");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

	$mail->Send(); 
	
	echo "success";
?>
