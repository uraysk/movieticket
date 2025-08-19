<?php
    require("header.php");
    $id = $_GET['id'];
    $row = $reserve->selectreserve($id);
?>




<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Reservations</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
    </header>
    <div class="gtco-section">
		<div class="gtco-container">
			<div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-body">
						<form action="" method="post">
                                    <div class="form-group">
                                        
                                            <?php
                                            echo "<label>Name</label>";
                                            echo "<p>" . $row['firstname'] . " " . $row['lastname'] . "</p>";
                                            echo "<label>Movie</label>";
                                            echo "<p>" . $row['movie_title'] . "</p>";
                                            echo "<label>Cinema</label>";
                                            echo "<p>" . $row['cinema_name'] . "</p>";
                                            echo "<label>Quantity</label>";
                                            echo "<p>" . $row['quantity'] . "</p>";
                                            echo "<label>Total Price</label>";
                                            echo "<p>" . $row['quantity'] * $row['price'] . "</p>";
                                            echo "<label>Date</label>";
                                            echo "<p>" . $row['schedule'] . "</p>";
                                            echo "<h3> 
                                            <a href='toppage.php' class='btn btn-sm btn-secondary'>Back</a></h3>"
                                        ?>
                                            
                              
                                </form>
                        </div>
                    </div>
                </div>
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
	<!-- </div> -->

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