<?php
require_once "core/auth.php";
require_once "core/checkAdmin.php";
require_once "core/base.php";
require_once "core/functions.php";
$id = $_GET['id'];

if ($_SESSION['user']['role'] == 0) {
    if (adminDelete($id)) {
        linkTo('index.php');
    }
}