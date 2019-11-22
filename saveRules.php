<?php 
session_start();
require_once('db.php');

$data_id = $_POST["id_rules"];
$data_value_rule = $_POST["value_rule"];

$sql = "";

for ($i = 0; $i < count($data_id); $i++) {
    $sql = "UPDATE rules SET kategoriHasil=".$data_value_rule[$i]." WHERE id = $data_id[$i]";
    echo $sql;
    mysqli_query($link,$sql);
}

header('Location: rules.php');
?>