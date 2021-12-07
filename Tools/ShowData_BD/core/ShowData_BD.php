<?php

include "includes.php";

$init_data = json_decode(file_get_contents('php://input'));

$Ip       = $init_data->ip;
$Login    = $init_data->login;
$Pass     = $init_data->pass;
$DataBase = $init_data->data_base;
$Table    = $init_data->table;

header('Content-type: application/json; charset=utf-8');

echo ShowData_BD($Ip, $Login, $Pass, $DataBase, $Table);

