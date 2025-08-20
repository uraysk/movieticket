<?php
require("../classes/Reserve.php");

$reserve = new Reserve;

$id = $_GET['id'];

$deletereserve = $reserve->delete($id);
?>