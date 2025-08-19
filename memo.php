<?php     
    $id = $_GET['id'];
    if(mysqli_num_rows($query) === 1){
        $row = mysqli_fetch_array($query);
        $_SESSION['fname'] = $row['firstname'];
        $_SESSION['lname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['cinemaid'] = $row['cinemaid'];

        if($id == FALSE){
            "<script>window.location.replace('Web/toppage.php')";
        }
        else if($id == TRUE){
            "<script>window.location.replace('Web/reserve2.php?id=$id')</sctipr>";
        }
    }
  ?>