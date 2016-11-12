<?php
session_start();
 unset($_SESSION['mysesion']);

header('Location: ../login.php');
