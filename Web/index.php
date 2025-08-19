<?php
	require("header.php");
?>

	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Find Cinema</h3>
											<form method="get" action="../login.php">
												<div class="row form-group">
													<div class="col-md-12">
														<label>Cinemas</label>
														<select name="cinemas" id="cinemaid" class="form-control">
															<?php
																$result= $cinema->select();
																if($result){
																	foreach($result as $key =>$row){
																		$cinemaid=$row['cinema_id'];
																		echo "<option value='$cinemaid'>" . $row['cinema_name'] . "</option>";
																	}
																}
															?>
														</select>
														
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<button type="submit" name="search" class="btn btn-primary btn-block">Search</button>
													</div>
												</div>
											</form>	
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Movie</h2>
				</div>
			</div>
			<div class="row">
				
				<?php
				$result = $movie->selectMoviesix();
				
				foreach($result as $key =>$row):
					$image = $row['directory'];
				?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div id="movie-image">
						<?php echo "<a href='../$image' class='movie fh5co-card-item image-popup' value='image1'>"?>
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<?php echo "<img src='../$image' class='movie img-responsive' value='image1'>"?> 
							</figure>
							<div class="fh5co-text">
								<h2><?php echo $row['movie_title']?></h2>
								
								<p><span class="btn btn-primary">Check The Movie</span></p>
							</div>
						</a>
					</div>
				</div>
				<?php
				endforeach;
				?>

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

