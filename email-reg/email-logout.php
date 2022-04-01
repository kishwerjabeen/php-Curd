<?php
session_start();
session_destroy();
header('location:email-login.php');
