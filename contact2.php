	<?php


	include("connect.php");

	$yname=$_POST['yname'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
$source=$_POST['source'];
    $comment=$_POST['comment'];
	
	
	echo  $eve ="INSERT INTO contact VALUES(0,'$yname','$email','$subject','$Source','$comment')";
	
	
		$conn->query($eve);
		


	ob_start();
				require_once('class.phpmailer.php');
	
 
				$mail = new PHPMailer();
				//$mail->IsSMTP();
				$mail->CharSet="UTF-8";
				$mail->SMTPSecure = "ssl";
				$mail->Host = "smtp.gmail.com";
				$mail->Port = "465";
				$mail->Username = "altafuturis@gmail.com";
				$mail->Password = "@@esws@seo@@esws77##$$";
				$mail->SMTPAuth = true;

				$mail->From = "ganesh.s@altafuturis.com";
				$mail->FromName = "Altrafuturis";
				$mail->AddAddress("ganesh.s@altafuturis.com");
		
				$mail->IsHTML(true);
				$mail->Subject    = "Inquiry From Altrafuturis";
				$mail->AltBody    = ".";
			
		     	$mail->Body    = "Inquiry from $yname".",<br>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<br>"."Name: $yname"."<br>"."Email: $email"."<br>"."Subject: $subject"."<br>"."Source: $source"."<br>"."Comment: $comment"."<br>"."";


				if(!$mail->Send())
				{
						//$err=$mail->ErrorInfo;
						//echo "$err";
						$result="0";
	
					//$p2="SMS Sent!";
	
					//	$posts[] = array('p1'=> $result,'p2'=> "$err");
						//echo stripslashes(json_encode( array('item' => $posts)));
						header('Location: contact.html');
						
				}					
				else
				{
				
						echo $result="1";
						
	
				//	echo $p2="Email Sent!";
	
						//$posts[] = array('p1'=> $result,'p2'=> $p2);
					
					
					
				echo "<script> alert('You Have Successfully sent');
			window.location.href='contact.html';			
			</script>";
					header('Location: thankyou.html');
				}
				
				?>



	
