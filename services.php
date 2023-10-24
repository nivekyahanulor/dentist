<?php include("include/header.php");?>

	<?php include("include/nav.php");?>
    
		<section class="ftco-section ftco-services">
    	<div class="container">
        <div class="row">
		<?php 
		
		$tbl_offer = $mysqli->query("SELECT * from tbl_offer");	
		while($val = $tbl_offer->fetch_object()){ ?>
        	<div class="col-md-4 d-flex services align-self-stretch p-4 ftco-animate">
            <div class="media block-6 d-block">
              <img  class="img w-100" src="page/front/services/<?php echo $val->photo;?>">
              <div class="media-body p-2 mt-3">
                <h3 class="heading"><?php echo $val->service;?></h3>
                <h3 class="heading">₱ <?php echo number_format($val->price,2);?></h3>
                <p><?php echo $val->description;?></p>
              </div>
            </div>
          </div>
        <?php } ?>
		
        </div>
    	</div>
    </section>
		
 <?php include("include/footer.php");?>