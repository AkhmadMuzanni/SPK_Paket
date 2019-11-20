<?php 
session_start();
require_once('db.php');

$sql = "UPDATE rules SET deleted=1";
mysqli_query($link,$sql); 

$sql = "SELECT * FROM variables where deleted = 0 and jenis = 0";

$data_variabel = array();
$data_kategori = array();
$new_rules = array();

if ($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    array_push($data_variabel, array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
    $sqlKategori = "SELECT * FROM categories WHERE idVariabel = " . $row[0] . " and deleted = 0";
    $temp_kategori = array();

    if ($resultKategori = mysqli_query($link, $sqlKategori)) {
      while ($rowKategori = mysqli_fetch_row($resultKategori)) {
        array_push($temp_kategori, array($rowKategori[0], $rowKategori[1], $rowKategori[2], $rowKategori[3], $rowKategori[4], $rowKategori[5], $rowKategori[6]));
      }
    }
    array_push($data_kategori, $temp_kategori);
  }
}


for ($i = 0; $i < count($data_kategori[0]); $i++) {
    for ($j = 0; $j < count($data_kategori[1]); $j++) {
        for ($k = 0; $k < count($data_kategori[2]); $k++) {
            for ($l = 0; $l < count($data_kategori[3]); $l++) {
                array_push($new_rules, strval($i+1).';'.strval($j+1).';'.strval($k+1).';'.strval($l+1).';');
            }
        }
    }
}
print_r($new_rules);
foreach ($new_rules as $rule) {
    $sql = "INSERT INTO rules(`id`, `rule`, `kategoriHasil`, `operasi`, `weight`, `deleted`) VALUES (0,'".$rule."',1,1,1,0)";
    echo $sql;
    mysqli_query($link,$sql);
}

header('Location: rules.php');
?>
