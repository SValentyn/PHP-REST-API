<?php
header('Content-type: application/json');
session_start();

use app\Controllers\Connection;

$id = $_REQUEST['id'];

$target_dir = "public/images/";
$fileName = $_FILES['file']['name'];
$fileContent = file_get_contents($_FILES['file']['tmp_name']);
$dataUrl = $target_dir . $fileName;
$json = json_encode(array(
    'dataUrl' => $dataUrl
));

$connection = (new Connection())->getConnection();

mysqli_query($connection, "UPDATE users SET image_path='$target_dir', image_name='$fileName' 
                                 WHERE id ='$id'");
echo $json;
