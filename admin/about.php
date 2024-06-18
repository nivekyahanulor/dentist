 <?php include('header.php'); include('../controller/admin-about.php');?>

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

   <?php include("nav.php");?>


    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
					
						<div class="card-header">
						
						  <h5 class="card-title"> Contents Data</h5>
							
							<br>
							<br>
							
						</div>
						
						<div class="card-content">
							
						<div class="table-responsive">
							  <table class="table datatable" id="table-1">
						<thead>
						  <tr>
							<th scope="col" class="text-start"> PAGE</th>
							<th scope="col" class="text-start"> CONTENT </th>
							<th scope="col" class="text-start"> ACTION </th>
						  </tr>
						</thead>
						<tbody>
						<?php while($val = $tbl_about->fetch_object()){ ?>
						  <tr>
							<td class="text-start"><?php echo $val->page;?></td>
							<td class="text-start"><?php echo $val->content;?></td>
							<td class="text-start">
								<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $val->about_id;?>"> <i class="la la-pencil-square"></i></button>
							</td>
						  </tr>
						   <div class="modal fade done" id="edit<?php echo $val->about_id;?>" tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title">EDIT INFORMATION</h5>
								  <button type="button" class="btn-close" datadismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								  <form class="row g-3" method="POST">
									<div class="col-md-12">
									  <label for="inputName5" class="form-label"> Content  : </label>
									  <textarea class="summernote" height='90' name="information"  required><?php echo $val->content;?></textarea>
									  <input type="hidden" value="<?php echo $val->about_id;?>" name="about_id" >
									</div>
									<br>
								</div>
								
								<div class="modal-footer">
								  <button type="submit" class="btn btn-success" name="update-information">Update</button>
								  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</form>
							  </div>
							</div>
							</div>	
						<?php } ?>
						</tbody>
					  </table>
									</div>
								</div>
							</div>
						</div>
					</div>

        </div>
      </div>
    </div>

<?php include("footer.php");?>
	<script>
	  $('.summernote').summernote({
  height: 200,
  focus: true
});
	  $('#summernote1').summernote();
	  $('#summernote2').summernote();
		
	</script>