<?php
session_start();

echo "mY name is " . $_SESSION['ussername'] . "and my age is ";
echo $_SESSION['age'];
