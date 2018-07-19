<?php
include_once "helpers.php";
include_once "FlashMessage.php";

$flashMessage = new FlashMessage();
$connection = new mysql("localhost", "root","","blog");
$titulo= $_POST['titulo'];
$contenido= $_POST['contenido'];
$fecha = array getdate ([int $timestamp=time()]);

if($connection->connect_errno){
  echo "Failed to connect to MYSQL(".$connection->connect_errno.")"  $connection->connect_error;
}

if(!empty($titulo) && !empty($contenido)){
    "SELECT * FROM posts WHERE title='$titulo' "
    "SELECT * FROM posts WHERE content='$contenido'"
    "SELECT * FROM posts WHERE date='$fecha'"
}else{
$flashMessage->setMessage('Verify that all fields are full.');
}

if ($flashMessage->hasMessage() || $flashMessage->hasErrors()) {
  $flashMessage->setInputs($_POST);
  // Guardando los cambios de la sesion
  $flashMessage->save();
  header("Location: ".base_url()."index.php");
  exit();
}
$result = $connection->query(
  "INSERT INTO posts (title, content, date)"."VALUES('$titulo','$contenido','$fecha')"
);
if ($result) {
  $flashMessage->setSuccessMessage('You have already registered Successfully.');
} else {
  $flashMessage->setMessage("The user could not register: (" . $connection->errno . ") " . $connection->error);
}

$flashMessage->save();
header("Location: ".base_url()."index.php");
exit();
 ?>
