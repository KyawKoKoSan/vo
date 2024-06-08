<?php

function con($dbName = "visibleone_assignment")
{
    $db = new PDO("mysql:host=localhost;dbname=$dbName", "root", "");
    return $db;
}



$role = ['Admin', 'Editor', 'Viewer'];

$url = "http://{$_SERVER['HTTP_HOST']}/visibleone_assignment/admin";

date_default_timezone_set('Asia/Yangon');