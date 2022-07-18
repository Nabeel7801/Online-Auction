<?php
    $name = urldecode($_GET['name']);
    $email = urldecode($_GET['email']);
    $code = urldecode($_GET['code']);

    use PHPMailer\PHPMailer\PHPMailer;
    require 'autoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    
    
    $mail->SMTPSecure = 'tls';

    $fromEmail = 'customclearanceauction@gmail.com';
    $fromName = 'Custom Clearance';

    $mail->SMTPAuth = true;
    $mail->Username = 'customclearanceauction@gmail.com';
    $mail->Password = 'nabeel123';
    $mail->setFrom($fromEmail, $fromName);
    $mail->addReplyTo($fromEmail, $fromName);
    $mail->addAddress("nabeel.ahmed0026@gmail.com", $name);
    $mail->Subject = 'Password Recovery Code';

    $Body = "<html>
                <body>
                    <div style='background-color: #fff'>

                        <h2>Hey $name</h2> <br>
                        <p>Here is Code: <h1>$code<h1></p>
                    </div>
                </body>
            </html>
            ";
    $mail->Body = $Body;        
    $mail->IsHTML(true);
    
    $mail->AltBody = 'This is a plain text message body';


    //***************************************** 
    //echo "<script>alert('$code')</script>";
    echo "<input type='hidden' id='mailSentStatus' value='$code'>";
    //********************************************* */
    

    if (!$mail->send()) {
        echo "<script>alert('Mail Not Sent')</script>";

    } else {
        echo "<input type='hidden' id='mailSentStatus' value='$code'>";
    }
    
    
?>