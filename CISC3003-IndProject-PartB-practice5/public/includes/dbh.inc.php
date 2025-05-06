<?php
$dBServername = "mmtuts.net.mysql";
$dBUsername = "mmtuts_net_mmtutsnew";
$dBPassword = "Charmetrold2";
$dBName = "mmtuts_net_mmtutsnew";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
