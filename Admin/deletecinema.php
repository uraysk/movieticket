<?php
require("../classes/Cinema.php");

$cinema =new Cinema;

$id = $_GET['id'];

$deletecinema = $cinema->delete($id);
?>