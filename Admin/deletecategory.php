<?php
require("../classes/Category.php");

$category=new Category;

$id = $_GET['id'];

$deletecategory = $category->delete($id);
?>