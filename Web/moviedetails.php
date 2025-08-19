<?php
 require("header.php");
 $id = $_GET['id'];
 $row = $movie->selectOne($id);



 ?>
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1><?php echo $row['movie_title']?></h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	
	
	
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admintop.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href='movies.php'>Movies</a>

            <li class="breadcrumb-item active">Cinema</li>
            
        </ol>

          <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-film"></i>
                <?php echo $row['movie_title'];?> 
            </div>           
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group pt-2 pl-2 pr-2">
                        <div class="form-group">
                           <?php
                            $image = $row['directory'];
                            echo "<img src='../$image' class='img-fluid' width ='100' height='100'>"                       
                           ?>
                        </div>
                        <div class="form-group">
                         
                            <?php
                                $resmo = $movie->movieCate($id);
                                if($resmo){
                                    foreach($resmo as $key =>$row){
                                        echo "<sapn = badge>" . $row['category_name'] . ", " . "</span>";
                                    }
                                }

                                
                            ?>
                           
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                
                                    <?php
                                        $result = $movie->selectOnce($id);
                                        if($result){
                                            foreach($result as $key => $row){
                                                $id = $row['moci_id'];
                                                echo "<tr>";
                                                echo "<td>" . $row['moci_id'] . "</td>";
                                                echo "<td>" . $row['cinema_name'] . "</td>";
                                                echo "<td>" . $row['price'] . "</td>";
                                                echo "<td>" . $row['start_date'] . "</td>";
                                                echo "<td>" . $row['end_date'] . "</td>";
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
                    </div>
                </form>
                </div>
            </div>
        </div>

            <footer id="gtco-footer" role="contentinfo">
                <div class="gtco-container">

                    <div class="row copyright">
                        <div class="col-md-12">
                            <p class="pull-left">
                                <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
                                <small class="block">Designed by <a href="http://GetTemplates.co/" target="_blank">GetTemplates.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
                            </p>
                            <p class="pull-right">
                                <ul class="gtco-social-icons pull-right">
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                                </ul>
                            </p>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

</body>
</html>