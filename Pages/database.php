<?php
$connection = mysqli_connect('localhost', 'root', '', 'origingamer');

if (!$connection) {
    die(mysqli_error($connection)); //used to show connection failed error
}

