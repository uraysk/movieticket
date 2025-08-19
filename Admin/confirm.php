<?php
require("../classes/Reserve.php");

$reserve = new Reserve;

$id = $_GET['id'];

$updatereserve = $reserve->update($id);


?>

