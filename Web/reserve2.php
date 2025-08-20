<?php
require("header.php");
$cid= $_GET['cid'];
$mid = $_GET['mid'];
$row = $movie->selectMovieCinema($cid,$mid);
if(isset($_POST['submit'])){
   
   
    $movie = $_POST['movie'];
    $quantity = $_POST['quantity'];
    $schedule = $_POST['schedule'];
   

    $addreserve = $reserve->store($id,$mid,$cid,$quantity,$schedule);
}
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
    <div class="container">
            <div class="row justify-content-center">
                <div class="col mt-5 pt-5">
                    <div class="card">
                        <div class="card-header"><h2> Reservation</h2></div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group pr-2 pl-2 pt-2">
                                        
                                        <div class="form-group">
                                            <label>Movie</label>
                                            <input type="text"class="form-control" name="movie" value="<?php echo $row['movie_title'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <select name="quantity" class="form-control">
                                                <?php
                                                    $quantity = $row['mc_quantity'];
                                                    for($i=1;$i<=$quantity; $i++){
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label> Date</label>
                                            <input type="date" class="form-control" name="schedule">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Buy</button>
                                    </div>
                                </form>
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

