<?php
$router = service('router');
$method = $router->methodName();
$sitetitle = "Panel Name";
$mainlogo = "";//base_url('/assets/img/activationcode-2.png') . "?" . rand(00000000, 99999999);
if (isset($thiscontrol)) {
	$storedgeneral = $thiscontrol->getglobalstoredsettings();

	if (isset($storedgeneral) && !empty($storedgeneral)) {
		$sitetitle = (isset($storedgeneral["sitetitle"]) && !empty($storedgeneral["sitetitle"])) ? $storedgeneral["sitetitle"] : $sitetitle;
		$mainlogo = (isset($storedgeneral["logo"]) && !empty($storedgeneral["logo"])) ? base_url('/public/uploads/media/' . $storedgeneral["logo"]) : $mainlogo;
	}
}
if(isset($thiscontrol)){
	$data = $thiscontrol->checkrecaptchdetails();
	if (isset($data) && !empty($data)) {
		$captcha = (isset($data[0]->captcha) && !empty($data[0]->captcha)) ? $data[0]->captcha : "";
		$sitekey = (isset($data[0]->sitekey) && !empty($data[0]->sitekey)) ? $thiscontrol->customencrption("decode",$data[0]->sitekey) :"";
		$secratekey = (isset($data[0]->secratekey) && !empty($data[0]->secratekey)) ? $thiscontrol->customencrption("decode",$data[0]->secratekey) :"";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title><?php echo $sitetitle; ?> | Login</title>

		<!-- Favicon -->
		<link rel="icon" href="<?php echo base_url('public/assets/img/brand/favicon.png'); ?>" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="<?php echo base_url('public/assets/css/icons.css'); ?>" rel="stylesheet">

		<!--  bootstrap css-->
		<link id="style" href="<?php echo base_url('public/assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />

		<!--- Style css --->
		<link href="<?php echo base_url('public/assets/css/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('public/assets/css/style-dark.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('public/assets/css/style-transparent.css'); ?>" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="<?php echo base_url('public/assets/css/skin-modes.css'); ?>" rel="stylesheet" />

		<!--- Animations css-->
		<link href="<?php echo base_url('public/assets/css/animate.css'); ?>" rel="stylesheet">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	</head>
	<style>
		.display-2 {
			font-size: 3.5rem;
			font-weight: 500;
			line-height: 1.2;
			margin-top: 20px;
			margin-left: 47px;
			color: #fff;
		}
			@media (max-width: 1092.8px) {
				.imsgsction {
				display: none !important;
			}
			.display-2 {
				margin-left: 0px;
				text-align: center;
			}
		}

	@media (max-width: 992px) {
    	.imsgsction {
        	display: none !important;
    	}

		.display-2 {
			margin-left: 0px;
			text-align: center;
		}
	}
	#togglePassword{
		position: absolute;
		right: 25px;
		margin-top: -27px;
		font-size: 15px;
	}

	</style>
	<body class="ltr error-page1 bg-primary" style="background-color: var(--primary-bg-color) !important">

		<!-- Loader -->
		<!-- <div id="global-loader">
			<img src="<?php echo base_url('../assets/img/loader.svg'); ?>" class="loader-img" alt="Loader">
		</div> -->
		<!-- /Loader -->

		<div class="square-box">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		<div class="page" >
			<div class="page-single">
				<div class="container">
					<div class="row">

						<div class="col-xl-6 col-md-6  col-lg-6 col-md-8 col-sm-8 col-xs-10 logo-div  mx-auto my-auto py-4 justify-content-center">
							<a href="<?php echo base_url('login');?>">
								<?php 
								if($mainlogo == "")
								{
									if($sitetitle == "")
									{
										?>
										<div data-v-c7378482="" class="display-2  primary--text" >SCA Panel</div>
										<?php
									}
									else
									{
										?>
										<div data-v-c7378482="" class="display-2  primary--text" ><?php echo $sitetitle; ?></div>
										<?php
									}
								}
								else
								{
									?>
										<img src="<?php echo $mainlogo; ?>" style="width: 60%;margin-left: 40px;margin-top: 50px;" id="logo-img">
									<?php
								}
								?>								
							</a>
							<span class="imsgsction">
								<img src="<?php echo base_url('public/assets/img/2112.w039.n003.37B.p1.37-[Converted].png'); ?>" style="width: 100%;    margin: auto;" id="bg-img">
							</span>
						</div>
						<div class="col-xl-6 col-md-6  col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-4 justify-content-center">
							<div class="card-sigin" style="box-shadow: 1px -1px 21px -9px black;">
								 <!-- Demo content-->
								 <div class="main-card-signin d-md-flex">
									 <div class="wd-100p"><div class="d-flex mb-4"></div>
										 <div class="">
											<div class="main-signup-header">
												<h2 style="margin-left: 12px;">Welcome back!</h2>
												<h6 class="font-weight-semibold mb-4" style="margin-left: 12px;">Please sign in to continue.</h6>
												<div class="panel panel-primary">
												   <div class="tab-menu-heading mb-2 border-bottom-0">
												   </div>
												   <div class="panel-body tabs-menu-body border-0 p-3">
													   <div class="tab-content">
														   <div class="tab-pane active" id="tab5">
                                                                <?php
                                                                if (isset($Error)) {
                                                                ?>   

                                                                <div class="alert alert-danger alert-dismissible"  id="danger-danger" style="">
                                                                <strong></strong><?php echo $Error; ?> 
                                                                </div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php $loginarrtibute = array('class' => 'loginformclass'); ?>
                                                                <?= form_open("login", $loginarrtibute); ?>
																<?= csrf_field() ?>
																   <div class="form-group">
																	   <label>Email</label> 
                                                                        <?php $data =
                                                                        [
                                                                        "type" => "text",
                                                                        "name" => "email",
                                                                        "placeholder" => "Email",
                                                                        "class" => "form-control",
                                                                        "value" => isset($_COOKIE["email"]) && !empty($_COOKIE["email"]) ? $_COOKIE["email"] : set_value("email")
                                                                        ];

                                                                        echo form_input($data); ?>                    
                                                                        <div class="text-danger"><?php if (isset($error["email"])) {
                                                                        echo $error["email"];
                                                                        }?></div>  
																   </div>
																   <div class="form-group">
																	   <label>Password</label> 
																	   
                                                                        <?php
                                                                            $encrypter = \Config\Services::encrypter();
                                                                            $cookiepass = "";
                                                                            if (isset($_COOKIE["password"]) && !empty($_COOKIE["password"])) {
                                                                            	$storedPassword = base64_decode($_COOKIE["password"]);
                                                                            	$cookiepass = $encrypter->decrypt($storedPassword);
                                                                            }
                                                                        ?>  
																		<input type="password" name="password" id="password_sec" placeholder="Password" class="form-control" value="<?php echo isset($cookiepass) && !empty($cookiepass) ? $cookiepass : set_value("password");?>"><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>                                
                                                                        <div class="text-danger"><?php if (isset($error["password"])) {
                                                                        echo $error["password"];
                                                                        }?></div>
																    </div>
																	
																			
																		
																		
																		
																

																	<div class="form-group">
                                                                            <?php
                                                                            $data = ['type' => 'checkbox', 'name' => 'Remember', 'id' => 'customCheck','style'=>'margin-left: 0px', 'class' => 'form-check-input', 'value' => 'on','checked='=>'checked'];
                                                                            echo form_input($data);
                                                                            $attributes = ['class' => 'form-check-label mb-0','style'=>'margin-left: 20px'];
                                                                            echo form_label('Remember Me', 'customCheck', $attributes);

                                                                            ?>
                                                                    </div>
                                                                    <?php
                                                                        $data = [
                                                                            "type" => "submit",
                                                                            "value" => "Sign In",
                                                                            "name" => "loginbtn",
                                                                            "class" => "btn btn-primary btn-block"
                                                                        ];
                                                                        echo form_input($data);
                                                                    ?>
																<?= form_close(); ?>
														   </div>
													   </div>
												   </div>
											   </div>
											</div>
										 </div>
									 </div>
								 </div>
							 </div>
						 </div>
					</div>
				</div>
			</div>
		</div>

		<!-- JQuery min js -->
		<script src="<?php echo base_url('public/assets/plugins/jquery/jquery.min.js'); ?>"></script>

		<!-- Bootstrap js -->
		<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('public/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>

		<!-- Moment js -->
		<script src="<?php echo base_url('public/assets/plugins/moment/moment.js'); ?>"></script>

		<!-- eva-icons js -->
		<script src="<?php echo base_url('public/assets/js/eva-icons.min.js'); ?>"></script>

		<!-- generate-otp js -->
		<script src="<?php echo base_url('public/assets/js/generate-otp.js'); ?>"></script>

		<!--Internal  Perfect-scrollbar js -->
		<script src="<?php echo base_url('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>

		<!-- Theme Color js -->
		<script src="<?php echo base_url('public/assets/js/themecolor.js'); ?>"></script>

		<!-- custom js -->
		<script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

	</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("#togglePassword").click(function () {
		var input = $("#password_sec");
		if (input.attr("type") === "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}

	});
});
</script>