  <?php 
	  include("header.php");
	  include('../controller/admin-services.php');
  ?>
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
						
						  <h5 class="card-title"> Services Data</h5>
							<div class="heading-elements">
								<button class="btn btn-sm round btn-info btn-glow" data-toggle="modal" data-backdrop="false" data-target="#addservice" fdprocessedid="cf0o09"><i class="la la-plus font-medium-1"></i> Add Services</button>
							</div>
							<br>
							<br>
							
						</div>
						
						<div class="card-content">
						
							<div class="table-responsive">
							  <table class="table datatable" id="table-1">
									<thead>
									  <tr>
										<th scope="col" class="text-start"> SERVICE</th>
										<th scope="col" class="text-end"> PRICE</th>
										<th scope="col" class="text-start"> DESCRIPTION</th>
										<th scope="col" class="text-start"> PHOTO</th>
										<th scope="col" class="text-center"> ACTION </th>
									  </tr>
									</thead>
									<tbody>
									<?php while($val = $tbl_offer->fetch_object()){ ?>
									  <tr>
										<td class="text-start"><?php echo $val->service;?></td>
										<td class="text-end"><?php echo number_format($val->price,2);?></td>
										<td class="text-start"><?php echo $val->description;?></td>
										<td class="text-start"><img src="../page/front/services/<?php echo $val->photo;?>" width="200px"></td>
										<td class="text-center">
											<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $val->id;?>"> <i class="la la-pencil-square"></i></button>
											<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#delete<?php echo $val->id;?>"> <i class="la la-trash"></i></button>
										</td>
									  </tr>
									   <div class="modal fade done" id="edit<?php echo $val->id ;?>" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
										  <div class="modal-content">
											<div class="modal-header">
											  <h5 class="modal-title">EDIT SERVICES</h5>
											  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
											  <form class="row g-3" method="POST"  enctype="multipart/form-data">
												<div class="col-md-12">
												  <label for="inputName5" class="form-label"> Service Name : </label>
												  <input class="form-control" value="<?php echo $val->service;?>" name="service"  required>
												  <input type="hidden" value="<?php echo $val->id;?>" name="id" >
												</div>
												<div class="col-md-12">
												  <label for="inputName5" class="form-label">Price : </label>
												  <input type="text" class="form-control"  value="<?php echo $val->price;?>"  name="price" required  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
												</div>
												<div class="col-md-12">
												  <label for="inputName5" class="form-label">Description : </label>
												  <textarea class="form-control" name="description" required><?php echo $val->description;?></textarea>
												</div>
												
												<div class="col-md-12">
												  <label for="inputName5" class="form-label">Photo : </label>
												  <input type="file" class="form-control" name="image" >
												  <input type="hidden" class="form-control" name="logo" value="<?php echo $val->photo;?>" >
												</div>
												</div>
											
											<div class="modal-footer">
											  <button type="submit" class="btn btn-success" name="update-services">Update</button>
											  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
											</form>
										  </div>
										</div>
										</div>	
										
										 <div class="modal fade done" id="delete<?php echo $val->id ;?>" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
										  <div class="modal-content">
											<div class="modal-header">
											  <h5 class="modal-title">DELETE SERVICES</h5>
											  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
											  <form class="row g-3" method="POST">
												<br>
												<div class="col-md-12">
												  ARE YOU SURE TO DELETE THIS DATA ? 
												  <input type="hidden" value="<?php echo $val->id;?>" name="id" >
												</div>
												<br>
											</div>
											
											<div class="modal-footer">
											  <button type="submit" class="btn btn-warning" name="delete-services">Delete</button>
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
<!-- Active Orders -->

        </div>
      </div>
    </div>
	<div class="modal fade" id="addservice" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">SERVICE DETAILS</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3" method="POST"  enctype="multipart/form-data">
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Service Name : </label>
						  <input type="text" class="form-control" name="service" required>
						</div>
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Price : </label>
						  <input type="text" class="form-control" name="price" required  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
						</div>
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Description : </label>
						  <textarea class="form-control" name="description" required></textarea>
						</div>
						
						<div class="col-md-12">
						  <label for="inputName5" class="form-label">Photo : </label>
						  <input type="file" class="form-control" name="image" required>
						</div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" id="process" name="add-service" >Add</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
             </div>
			  
<?php include("footer.php");?>
