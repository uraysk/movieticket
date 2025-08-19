<?php
    require("header.php");

    

    if(isset($_POST['submit'])){
        $catename = $_POST['categoryname'];

        $addcategory = $category->store($catename);
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col mt-5 pt-5">
            <div class="card">
                <div class="card-header"><h2>Add Category</h2></div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group pt-2 pl-2 pr-2">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" name="categoryname">
                            </div>
                            <button type="submit" name="submit" class="btn btn-sm btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>
</div>
</body>
</html>
