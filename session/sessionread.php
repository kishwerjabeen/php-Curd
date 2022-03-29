<?php
session_start();

if (isset($_SESSION['ussername'])) {
    echo "mY name is " . $_SESSION['ussername'] . "and my age is ";
    echo $_SESSION['age'];
} else {
    echo "no usser is set";
}
