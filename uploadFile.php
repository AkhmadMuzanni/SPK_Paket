<?php
session_start();
require_once('db.php');
// print_r($_FILES);
echo ($_FILES['file_upload']['name']);
$namaFile = explode(".",$_FILES['file_upload']['name']);
$date = date('dmY_his', time());
$namaFileBaru = 'upload/data_'.$date.".".$namaFile[1];
// echo "data_".$date.".".$namaFile[1];

move_uploaded_file(
  $_FILES['file_upload']['tmp_name'],
  $namaFileBaru
);

$str_input = "python -c \"import runMulti; print runMulti.run('" . $namaFileBaru . "')\" 2>&1";
// echo $str_input;
$file = shell_exec($str_input);

echo 'proses berhasil<br/>';
echo $file;
echo 'br';
echo $_SERVER['SERVER_NAME'];


// header('Location: '."http://" . $_SERVER['SERVER_NAME']. "/SPK_Paket/".$file);
header('Location: '."http://" . $_SERVER['SERVER_NAME']. "/SPK_Paket/".$file);
// "http://" . $_SERVER['SERVER_NAME']. "/SPK_Paket/".$file ;

// $file = basename($_GET['file']);
// $file = '/path/to/your/dir/'.$file;

// if(!file_exists($file)){ // file does not exist
//     die('file not found');
// } else {
//     header("Cache-Control: public");
//     header("Content-Description: File Transfer");
//     header("Content-Disposition: attachment; filename=$file");
//     header("Content-Type: application/zip");
//     header("Content-Transfer-Encoding: binary");

//     // read the file from disk
//     readfile($file);
// }