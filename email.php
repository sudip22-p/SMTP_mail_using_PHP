<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

?>

<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$mailToUser=new PHPMailer(true); 
$mailToAdmin=new PHPMailer(true); 
//sending mail to user 
try {
    //Server settings
    $mailToUser->isSMTP();                                  //Send using SMTP
    $mailToUser->Host       = 'smtp.gmail.com';             //Set the SMTP server to send through
    $mailToUser->SMTPAuth   = true;                         //Enable SMTP authentication
    $mailToUser->Username   = 'demo0022222@gmail.com';      //SMTP username
    $mailToUser->Password   = 'hyvp sukx sfkx dsaa';        //SMTP password
    $mailToUser->SMTPSecure = 'tls';                        //Enable implicit TLS encryption
    $mailToUser->Port       = 587;                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    
    //Recipients
    $mailToUser->setFrom('demo0022222@gmail.com');
    $mailToUser->addAddress($email);
    $mailToUser->Subject="Message Response Recorded";
    $mailToUser->Body= "Greetings {$name},<br><br>
    I got your message send at <a href='http://sudippdl.com.np'>sudippdl.com.np</a>,<br>
    Your details recorded as:<br>
    Name: {$name}<br>
    Email: {$email}<br>
    Message: {$message}<br><br>
    Thanks for your message!!!<br><br>
    Regards,<br>
    Sudip P.";
    $mailToUser->isHTML(true);
    $mailToUser->send();

}
catch (Exception $e) {
    // An error occurred, redirect to index.php and display error alert
    header("Location: ./html/contact.html");
    exit();
}

//sending mail to admin 
try {
    //Server settings
    $mailToAdmin->isSMTP();                                  //Send using SMTP
    $mailToAdmin->Host       = 'smtp.gmail.com';             //Set the SMTP server to send through
    $mailToAdmin->SMTPAuth   = true;                         //Enable SMTP authentication
    $mailToAdmin->Username   = 'demo0022222@gmail.com';      //SMTP username
    $mailToAdmin->Password   = 'hyvp sukx sfkx dsaa';        //SMTP password
    $mailToAdmin->SMTPSecure = 'tls';                        //Enable implicit TLS encryption
    $mailToAdmin->Port       = 587;                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mailToAdmin->setFrom('demo0022222@gmail.com');
    $mailToAdmin->addAddress('demo0022222@gmail.com');
    $mailToAdmin->Subject="New Message @website";
    $mailToAdmin->Body= 'Hey dude,<br><br>
    
    I got the new mail for you:<br>
    Sender name: ' . $name . '<br>
    Sender email: ' . $email . '<br>
    Message: ' . $message . '<br><br>
        
    Okay bye buddy!!';
    $mailToAdmin->isHTML(true);
    $mailToAdmin->send();

    // Email sent successfully, redirect to index.php and display success alert
    header("Location: index.html");
    exit();

}
catch (Exception $e) {
    // An error occurred, redirect to index.php and display error alert
    header("Location: ./html/contact.html");
    exit();
}
?>
