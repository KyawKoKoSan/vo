<?php

session_start();

if (!$_SESSION['user']) {
    header("location:admins_list.php");
}