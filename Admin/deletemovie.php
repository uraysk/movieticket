<?php
require("../classes/Movie.php");

$movie = new Movie;

$id = $_GET['id'];

$deletemovie = $movie->delete($id);
?>