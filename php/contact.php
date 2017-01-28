<?php
 
if(isset($_POST['userName'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "vikrantdhimate@gmail.com";
 
    $email_subject = "Visitor";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();

    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['userName']) ||
 
        !isset($_POST['userEmail']) ||
 
        !isset($_POST['userMessage'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $userName = $_POST['userName']; // required
 
    $userEmail = $_POST['userEmail']; // required
 
    $userMessage = $_POST['userMessage']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$userEmail)) {
 
    $error_message .= 'The userEmail Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$userName)) {
 
    $error_message .= 'The userName you entered does not appear to be valid.<br />';
 
  }

 
  if(strlen($userMessage) < 2) {
 
    $error_message .= 'The userMessage you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
    $email_from = "userName: ".clean_string($userName)."\n"; 
    $email_message .= "userName: ".clean_string($userName)."\n";
 
    $email_message .= "userEmail: ".clean_string($userEmail)."\n";
 
    $email_message .= "userMessage: ".clean_string($userMessage)."\n";
 
     
 
     
 
// create userEmail headers
 
$headers = 'From: '.$email_from."\r\n".

'Reply-To: '.$email_to."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
 
 
 
<?php
 
}
 
?>
