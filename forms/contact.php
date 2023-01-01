<?php
 

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'email@email.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['nome'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['assunto'];

  // Remova o comentário abaixo do código se quiser usar SMTP para enviar e-mails. Você precisa inserir suas credenciais SMTP corretas
  /*
  $contact->smtp = array(
    'host' => 'smtp-mail.outlook.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
