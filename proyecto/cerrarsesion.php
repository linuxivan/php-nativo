<?php

session_start();

unset($_SESSION['user']);
unset($_SESSION['id_user']);
unset($_SESSION['admin']);
session_destroy();

header("location:index.php");