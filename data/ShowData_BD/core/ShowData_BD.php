<?php


$init_data = json_decode(file_get_contents('php://input'));

$Ip        = $init_data->ip;
$Login     = $init_data->login;
$Pass      = $init_data->pass;
$DataBase  = $init_data->data_base;
$Table     = $init_data->table;


function Get_DataTable($Ip, $Login, $Pass, $DataBase, $Table){

    $InitDataBase = mysqli_connect($Ip, $Login, $Pass, $DataBase);

    $result = mysqli_query($InitDataBase, "SELECT * FROM ".$Table);
    $res = [];
    $state = true;
    while ($state != false) {
        $state = mysqli_fetch_assoc($result);
        $res[] = $state;
    }
    $size_res = count($res);
    unset($res[$size_res - 1]);
    return json_encode($res);
}

$release = Get_DataTable($Ip, $Login, $Pass, $DataBase, $Table);
echo $release;
