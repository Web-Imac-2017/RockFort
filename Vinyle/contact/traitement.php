<?php
session_start();
$errors = array(); //vérif de champs
if(!array_key_exists('name', $_POST) || $_POST['name'] == '') {
    $errors ['name'] = "vous n'avez pas renseigné votre nom";
}
if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors ['mail'] = "vous n'avez pas renseigné votre email";
}
if(!array_key_exists('message', $_POST) || $_POST['message'] == '') {
    $errors ['message'] = "vous n'avez pas renseigné votre message";
}
//check infos transmises lors de la validation
if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
    header('Location: ../test/contact.php');
}else{
    $_SESSION['success'] = 1;
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
    $to = 'alexane.lgrn@gmail.com'; //Insérer adresse email ICI
    $subject = 'Message envoyé par ' . htmlspecialchars($_POST['name']) .' '. htmlspecialchars($_POST['email']);
    $message_content = '
  <table>
  <tr>
  <td><b>Emetteur du message:</b></td>
  </tr>
  <tr>
  <td>'. $subject . '</td>
  </tr>
  <tr>
  <td><b>Contenu du message:</b></td>
  </tr>
  <tr>
  <td>'. htmlspecialchars($_POST['message']) .'</td>
  </tr>
  </table>
  ';
    mail($to, $subject, $message_content, $headers);
    header('Location: ../test/contact.php');
}