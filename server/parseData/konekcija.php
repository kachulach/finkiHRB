<?php
$connection = new mysqli("localhost", "root", "", "dbafinkihrb");
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
