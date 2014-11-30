<?php
$connection = new mysqli("cpanel1.gohost.mk", "cpfqeivo_hrb", "@finkihrb@", "cpfqeivo_human_behaviour");
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else 
{
	//echo "uspesno povrzano";
} 