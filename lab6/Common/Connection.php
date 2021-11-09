<?php
$server_username = 'b387322b6006bc';
$server_password = '0739b344';
$server_host = "us-cdbr-east-03.cleardb.com";
$database = 'heroku_eedca10c2fc1c8a';

$conn = mysqli_connect($server_host, $server_username, $server_password, $database) or die("cant connect to database");