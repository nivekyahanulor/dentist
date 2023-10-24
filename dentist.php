<?php include("include/header.php");?>

	<?php include("include/nav.php");?>
    

    <section class="ftco-section">
			<div class="container">
				<div class="row">
				<?php 
					$tbl_offer = $mysqli->query("SELECT * from tbl_doctors");	
					while($val = $tbl_offer->fetch_object()){ 
				?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<img class="img align-self-stretch" src="page/front/doctor/<?php echo $val->photo;?>">
							</div>
							<div class="text pt-3 text-center">
								<h3>Dr. <?php echo $val->name;?></h3>
								<span class="position mb-2">Denstist</span>
								<div class="faded">
									<p><?php echo $val->details ;?></p>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>	
					
				</div>
			</div>
		</section>

<?php include("include/footer.php");?>