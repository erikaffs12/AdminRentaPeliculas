<?php
$uploaddir = "../peliculas/";

$uploadfile = $uploaddir . basename($_FILES["userfile"]["name"]);

if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile)) {
  echo basename($_FILES["userfile"]["name"]);
} else {
  echo "error";
}
?>