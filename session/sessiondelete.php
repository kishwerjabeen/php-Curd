<?php
session_start();

unset($_SESSION['ussername']);

session_destroy();
