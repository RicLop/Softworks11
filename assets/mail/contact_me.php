<?php
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "contato.softworks11@gmail.com";
$subject = "Recebeu um contato de:  $name";
$body = "Você recebeu uma nova mensagem pelo seu site.\n\n".
        "Aqui os detalhes:\n\n
          Nome: $name\n\n
          Email: $email\n\n
          Número: $phone\n\n
          Mensagem:\n $message";
$header = "De: noreply@gmail.com\n";
$header .= "Responder para: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
