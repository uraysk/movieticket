<?php
require("header.php");
$row = $user->selectOne($id);

?>

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admintop.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
            <li class="breadcrumb-item">                                           
                <a href='adduser.php'>Add User/<a>
            </li>
        </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-users"></i>
             Users</div>
            
            <div class="card-body">
                <form action="" method="post">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                        
                                <?php
                                    $result = $user->select();
                                    if($result){
                                    foreach($result as $key => $row){
                                        $id = $row['user_id'];
                                        echo "<tr>";
                                        echo "<td>" . $row['user_id'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>
                                            <a href='edituser.php?id=$id' class='btn btn-sm btn-primary'>Edit</a>
                                            <a href='deleteuser.php?id=$id' class='btn btn-sm btn-danger'>Delete</a>
                                            </td>";

                                        echo "</tr>";
                                    }
                                    }

                                    else{
                                    echo "<tr><td colspan='4' class='text-center'>No data available</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
   


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>

     <script>
      $(function(){
        $('dataTable').DataTable({
          'paging'       : true,
          'lengthChange' : true,
          'serching'     : true,
          'ordering'     : true,
          'info'         : true,
          'autoWidth'    :false

        })
      })
    </script>

  </body>

</html>
