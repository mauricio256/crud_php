<?php

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'crud_php');

    $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
 