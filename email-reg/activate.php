<?php
session_start();
include '../links.php';
if (isset($_GET['token'])) {
    $token = $_GET['token'];
}
