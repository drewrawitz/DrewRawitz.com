<?php
include realpath(dirname(__FILE__).'/../../config.php');
require 'includes/scripts/class.phpmailer.php';

function validate_required($field) {
  $field = htmlspecialchars($field, ENT_QUOTES, 'UTF-8');
  $field = trim($field);
  
  return (!empty($field)) ? true : false;
}

$errors = array();

// if the form has been submitted
if(isset($_POST['submit'])) {
  
  $form_name     = htmlspecialchars($_POST['name']);
  $form_email    = htmlspecialchars($_POST['email']);
  $form_subject  = stripslashes(htmlspecialchars($_POST['subject']));
  $form_message  = stripslashes(htmlspecialchars($_POST['message'])); 

  $errors['name'] = !validate_required($form_name) ? "Please enter your Name" : "";
  
  $errors['email'] = !filter_var($form_email, FILTER_VALIDATE_EMAIL) ? "Please enter a valid e-mail address!" : "";
  
  $errors['subject'] = !validate_required($form_subject) ? "Please enter a subject!" : "";
  $errors['message'] = !validate_required($form_message) ? "Please enter a message!" : "";

  if(!array_filter($errors)) {
    $body = "<p>You have been contacted by $form_name via your website, DrewRawitz.com, their additional message is as follows.</p> <p>$form_message</p> <p>You can contact $form_name via email, $form_email</p>";
    
    try {
      $mail = new PHPMailer(true);
      $mail->IsSMTP();               
      $mail->SMTPAuth = true;
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 465;
      $mail->Username = SMTP_USERNAME;
      $mail->Password = SMTP_PASSWORD;
      
      $mail->IsSendmail();
      
      $mail->From   = "".$form_email."";
      $mail->FromName = "".$form_name."";
      
      $mail->AddAddress("email@drewrawitz.com");
      
      $mail->Subject  = $form_subject;
      
      $mail->MsgHTML($body);
      
      $mail->IsHTML(true);
      
      $mail->Send();
    
    } catch (phpmailerException $e) {
      echo $e->errorMessage();
    } 
  
    echo "<div id=\"email_success\">";
    echo "<h3><i class=\"icon-check\"></i> Email Sent Successfully!</h3>";
    echo "<p>Thank you <strong>$form_name</strong>, I'll be sure to get back to you as soon as possible!</p>";
    echo "</div>";

  }
}

if(!isset($_POST['submit']) || array_filter($errors)) {

?>

<form method="post" action="index.php#contact" class="form contact-form">
  <div class="form-row">
    <label for="name"<?php if (isset($errors['name']) && $errors['name']) { echo " class=\"error\""; } ?>>Name:</label>
    <input type="text" id="name" name="name" placeholder="Your Name" value="<?=(isset($form_name)) ? $form_name : "";?>" required>
  </div>
  <div class="form-row">
    <label for="email"<?php if (isset($errors['email']) && $errors['email']) { echo " class=\"error\""; } ?>>Email:</label>
    <input type="text" id="email" name="email" placeholder="Email Address" value="<?=(isset($form_email)) ? $form_email : "";?>" required>
  </div>
  <div class="form-row">
    <label for="subject"<?php if (isset($errors['subject']) && $errors['subject']) { echo " class=\"error\""; } ?>>Subject:</label>
    <input type="text" id="subject" name="subject" placeholder="Subject" value="<?=(isset($form_subject)) ? $form_subject : "";?>" required>
  </div>
  <div class="form-row">
    <label for="message"<?php if (isset($errors['message']) && $errors['message']) { echo " class=\"error\""; } ?>>Message:</label>
    <textarea name="message" id="message" rows="6" placeholder="Message" required><?=(isset($form_message)) ? $form_message : "";?></textarea>
  </div>
  <div class="form-row">
    <label>&nbsp;</label>
    <input type="submit" name="submit" value="Submit Form">
  </div>
</form>

<?php } ?>