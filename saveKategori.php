<?php 
session_start();
require_once('db.php');

$data_id_variabel = $_POST["id_variabel"];

$sql = "";

for ($i = 0; $i < count($data_id_variabel); $i++) {
    $data_id_kategori = $_POST["id_kategori_".$data_id_variabel[$i]];
    $data_nama_kategori = $_POST["nama_kategori_".$data_id_variabel[$i]];
    $data_batas_bawah = $_POST["batas_bawah_kategori_".$data_id_variabel[$i]];
    $data_batas_tengah = $_POST["batas_tengah_kategori_".$data_id_variabel[$i]];
    $data_batas_atas = $_POST["batas_atas_kategori_".$data_id_variabel[$i]];
    for ($j = 0; $j < count($data_id_kategori); $j++) {
        $sql = "UPDATE categories SET namaKategori='".$data_nama_kategori[$j]."',batasAtas=".$data_batas_atas[$j].",batasTengah=".$data_batas_tengah[$j].",batasBawah=".$data_batas_bawah[$j]." WHERE id = $data_id_kategori[$j]";
        echo $sql."<br/>";
        mysqli_query($link,$sql);    
    }
    
}
header('Location: variabel.php');
