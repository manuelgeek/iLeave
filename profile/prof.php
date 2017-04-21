
<!--*************PHP PROFILE PHOTO******-->
<?php

include_once 'db.php';

if ($account['photo']=="") {
	$msg4 = "<img src='../img/user.png' style='border-radius:6px; border:8px solid #fff; padding:0px;' height=150px />";
}//else {
	//$msg4 = "";
//}
	?>

<div class="col-md-12">
	<div class="container">
		

						<div class="col-md-8 col-md-offset-2">
								<h2 class="title">Profile</h2>

									<div class="col-md-10 col-md-offset-1">
										
										 <div class="user-img-div">
                            					 <?php
													if(isset($msg4)){
														echo $msg4;
													} else {
														?>

													

													<img src="user_images/<?php echo $account['photo']; ?>"  style="border-radius:6px; border:8px solid #424A5D; padding:0px;"  height=150px />
													<?php
												}?>
						                            <div class="inner-text">
						                                <?php echo $account['name'];?>
						                            <br />
						                                <small>Email:  <b> <?php echo $account['email'];?> </b>    </small><br>
						                                
						                            </div>
						                        </div>


									</div>
<br><br>
										
											<div class="col-md-4 col-sm-4">
												<p ><b>Your Name:</b> </p>
											</div>
											<div class="col-md-8 col-sm-8">
												<p> <?php if($account['name']==''){echo "No Name Yet";}else{ echo $account['name'];}?> 
												 </p>
											</div>
											<div class="col-md-4 col-sm-4">
												<p ><b>Phone Number:</b> </p>
											</div>
											<div class="col-md-8 col-sm-8">
												<p>
											 		<?php if($account['phone']==''){echo "No Number";}else{ echo $account['phone'];}?> 
											 	 </p>
											 </div>
											 <div class="col-md-4 col-sm-4">
												<p ><b>Email Address:</b> </p>
											</div>
											<div class="col-md-8 col-sm-8">
												<p>
											 		<?php if($account['email']==''){echo "No Email Address";}else{ echo $account['email'];}?> 
											 	 </p>
											 </div>
											 <div class="col-md-4 col-sm-4">
												<p ><b>Payroll Number:</b> </p>
											</div>
											<div class="col-md-8 col-sm-8">
												<p>
													 <?php if($account['payroll']=='' || $account['payroll']==0){echo "No Payroll Number";}else{ echo $account['payroll'];}?> 
												 </p>
											</div>
											<div class="col-md-4 col-sm-4">
											<p ><b>Gender</b>  </p>
											</div>
											<div class="col-md-8 col-sm-8">
												<p>
													<?php if($account['gender']==''){echo "Uknown";}else{ echo $account['gender'];}?>
												 </p>
											</div>
											
										</div>



	</div>
</div>