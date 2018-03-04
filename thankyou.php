<?php
if(!isset($_POST['customer_name']))
{
	header('Location: index.html');
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Lumen - Multi-purpose Bootstrap Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link rel="shortcut icon" href="img/favicon.ico">
    
    <!-- Core CSS -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css"><!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"><!-- font-awesome -->
    <link type="text/css" rel="stylesheet" href="css/order-form.css"><!-- Light Theme Core CSS -->
    <link type="text/css" rel="stylesheet" href="css/style.css"><!-- Light Theme Core CSS -->
    
    <!-- Google Fonts here -->
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

    <!-- Preloader Area Start 
    ====================================================== -->
    <div id="mask">
        <div id="loader">      
        </div>
    </div>
    <!-- =================================================
    Preloader Area End -->
    
    <!-- Header Area Start 
    ====================================================== -->
    <header class="header-area">
    	<div class="container clearfix">
        
        	<!-- Start: Logo Area -->
        	<div class="logo-area">
            	<a href="#" class="logo"><img src="img/logo.png" alt=""></a>
                <span class="phone">+44 (0) 91 9539064445</span>
                <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            </div>
        	<!-- End: Logo Area -->
            
        	<!-- Start: Navigation Area -->
            <nav class="nav-main">
            	<ul class="menu-cont">
                	<li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="portfolio-01.html">Portfolio</a></li>
                    <li><a href="#">Pages</a>
                    	<ul class="sub-menu">
                        	<li><a href="pricing.html">Pricing</a></li>
                        	<li><a href="team.html">Team</a></li>
                        	<li><a href="blog.html">Blog</a></li>
                        	<li><a href="blog-single.html">Blog Single</a></li>
                        	<li><a href="coming-soon.html">Coming Soon</a></li>
                        	<li><a href="404.html">404</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                    <li class="active"><a href="order-now.html" class="nav-order-btn">Order Now</a></li>
                </ul>
            </nav>
        	<!-- End: Navigation Area -->
        
        </div>
    </header>
    <!-- =================================================
    Header Area End -->
    
    
    <!-- Banner Area 
    ====================================================== -->
    <section id="home">
    	<div id="particles" class="inner-particle">
        
            <div class="cont-area-inner">
            	<div class="inner-rocket-img"><img src="img/rocket-inner.png" alt=""></div>
                <div class="heading-area">
                	<div class="container clearfix">
                        <div class="col-md-8">
                            <h1>Order</h1>
                        </div>
                        <div class="col-md-4">
                            <ul class="breadcrumbs-inner">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li>Order</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Start: Banner Bottom -->
            <div class="banner-btm-img"><img src="img/buildings.png" alt=""></div>
            <!-- End: Banner Bottom -->
        
    	</div>    
    </section>
    <!-- =================================================
    Banner Area End -->
	<?php
	$msg_suc = '';
	$inner_pages = 0;
	$inner_pages_cost = 0;
	if(isset($_POST))
	{
		if($_POST['payment_status'])
		{
			if(isset($_POST['custom']))
			{
				parse_str($_POST['custom'],$_CUSTOMPOST);
				$customer_name=$_CUSTOMPOST['name'];
				$customer_contact= $_CUSTOMPOST['customer_contact'];
				$email= $_CUSTOMPOST['email'];
				$customer_message= $_CUSTOMPOST['customer_message'];				
			}
			$sellerfrom ="info@yourwebsite.com";
			$name=$_POST['address_name'];
			$customeremail=$_POST['payer_email'];
			$item=$_POST['item_name'];
			$addons=$_POST['option_selection1'];
			$price=$_POST['payment_gross'];
			$qty=$_POST['quantity'];
			$currency=$_POST['mc_currency'];
			
			//----- email to user start ----
			$message="Hello ". $customer_name.", <br /><br />This is the confirmation email from yourwebsite.com to inform you that we have received your request successfully. Soon you will receive a response from one of our technical support expert. We try to keep our response time as fast as possible but sometime it may take upto 24 hours. <br /> <br /><br />
			Regards,<br />yourwebsite.com<br />email: info@yourwebsite.com<br />skype: yourskype<br />Website : http://yourwebsite.com<br />";
			$subject= "yourwebsite.com order completed";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.$sellerfrom. "\r\n";
			mail($email,$subject,$message,$headers);
			//----- email to user end ----
			
			//----- email to us start ----
			$message_team="Hello Team, <br /><br />We have new order successfully received and please analyze this order and send order confirmation mail asap. <br /><br />	<table width='600'  border='1' ><tr><td width='312'>Name : </td><td width='276'>".$customer_name."</td></tr><tr><td width='312'>Email : </td><td width='276'>".$email."</td></tr><tr><td width='312'>Contact : </td><td width='276'>".$customer_contact."</td></tr><tr><td width='312'>Comment : </td><td width='276'>".$customer_message."</td></tr><tr><td width='312'>Item : </td><td width='276'>".$item."</td></tr><tr><td width='312'>Quantity : </td><td width='276'>".$qty."</td></tr><tr><td width='312'>Options : </td><td width='276'>".$addons."</td></tr><tr><td width='312'>Price: </td><td width='276'> ".$price." ".$currency."</td></tr><tr><td width='312'>Payment Status: </td><td width='276'> ".$_POST['payment_status']."</td></tr></table><br /><br />Regards,<br />yourwebsite.com<br />email: info@yourwebsite.com<br />	skype: yourskype<br />website : http://yourwebsite.com<br />";	//--------------------------
			$subject2 = "We got new order from yourwebsite.com";
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.$email. "\r\n";
			mail($sellerfrom,$subject2,$message_team,$headers);
		    $msg_suc =  'ok';
			//----- email to us end ----
			}
    else if(isset($_POST['customer_name']))
	{
		$type 			= $_POST['customer_choice'];
		$customer_message = $_POST['customer_message'];
		$customer_contact = $_POST['customer_contact'];
		$name 		   = $_POST['customer_name'];
		$email 		   = $_POST['customer_email'];
		$coupon_text   = $_POST['coupon_text'];
		$currency ="$";
		if(isset($_POST['sub_type']))
		{
			$sub_type 			= $_POST['sub_type'];
		}
		$type_title = $type." ".$sub_type; 
		if($type == "Other Services")
		{
		    //----- email to user start ----
			$message="Hello ". $name.", <br /><br />This is the confirmation email from yourwebsite.com to inform you that we have received your request successfully. Soon you will receive a response from one of our technical support expert. We try to keep our response time as fast as possible but sometime it may take upto 24 hours. <br /> <br /><br />
			Regards,<br />yourwebsite.com<br />email: info@yourwebsite.com<br />skype: yourskype<br />Website : http://yourwebsite.com<br />";
			$from ="info@yourwebsite.com";
			$subject= "yourwebsite.com order completed";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.$from. "\r\n";
			mail($email,$subject,$message,$headers);
			//----- email to user end ----
			//----- email to us start ----
			$message_team="Hello Team, <br /><br />We have  new order ".$type_title." successfully received and please analyse this order and send order confirmation mail asap. <br /><br />	<table width='600'  border='1' ><tr><td width='312'>Name : </td><td width='276'>".$name."</td></tr><tr><td width='312'>Email : </td><td width='276'>".$email."</td></tr><tr><td width='312'>Phone : </td><td width='276'>".$customer_contact."</td></tr><tr><td width='312'>Project Description : </td><td width='276'>".$customer_message."</td></tr><tr><td width='312'>Project Type: </td><td width='276'>".$type_title."</td></tr></table><br /><br />Regards,<br />yourwebsite.com<br />email: info@yourwebsite.com<br />	skype: yourskype<br />website : http://yourwebsite.com<br />";	//--------------------------
			$subject2 = "We got new order from yourwebsite.com";
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.$from. "\r\n";
			mail("info@yourwebsite.com",$subject2,$message_team,$headers);
		    $msg_suc =  'ok';
			//----- email to us end ----
		}
		else
		{			
		    $tot_options    = $_POST['tot_options'];
			$eta		   = $_POST['eta'];
			$inner_pages   = $_POST['conversion_inner_pages'];
			$type_cost     = $_POST['type_cost'];
			$total_cost    = $_POST['total_cost'];
			$actual_cost    = $_POST['actual_cost'];
			
			if($_POST['inner_pages_cost']>0)
			{
			   $inner_pages_cost = $currency.$_POST['inner_pages_cost'];
			}
			else
			{
			$inner_pages_cost ="NIL";
			}
			//----- email to user  ----
			$message="Hello ". $name.", <br /><br />This is the confirmation email to inform you that we have received your request successfully. Soon you will receive a response from one of our technical support expert. We try to keep our response time as fast as possible but sometime it may take upto 24 hours. <br /><br /><br />";
			$common_msg="<table width='600' border='1'><tr><td width='312'>Name : </td><td width='276'>".$name."</td></tr><tr><td width='312'>Email : </td><td width='276'>".$email."</td></tr><tr><td width='312'>Phone : </td><td width='276'>".$customer_contact."</td></tr><tr><td width='312'>Project Description : </td><td width='276'>".$customer_message."</td></tr>";
			$common_msg.="<tr><td width='312'>".$type_title."</td><td width='276'>".$currency.$type_cost."</td></tr><tr><td>Additional Options</td><td>".$tot_options."</td></tr><tr><td>".$inner_pages." Inner Pages </td><td>".$inner_pages_cost."</td></tr><tr><td>ETA</td><td>".$eta."</td></tr><tr><td>Coupon code</td><td>".$coupon_text."</td></tr>";
			if($coupon_text!="")
			{
				$common_msg.="<tr><td width='312'>Total</td><td width='276'>".$currency.$actual_cost."</td></tr>";
				$common_msg.="<tr><td>Amount after Discount</td><td>".$currency.$total_cost."</td></tr></table>";
			}
			else
			{
				$common_msg.="<tr><td>Grand Total</td><td>".$currency.$total_cost."</td></tr>";
			}			
			$common_msg.="</table><br /><br />Regards,<br />yourwebsite.com<br />email: info@yourwebsite.com<br />skype: yourskype<br />Website : http://yourwebsite.com<br />";
			$message.=$common_msg;
			$from ="info@yourwebsite.com";
			$subject= "yourwebsite.com order completed";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.$from. "\r\n";
			mail($email,$subject,$message,$headers);
			//----- email to us  ----
			$message_team="Hello Team, <br /><br />We have  new order ".$type_title." successfully received and please analyse this order and send order confirmation mail asap. <br /><br />";
			$message_team.=$common_msg;
			$subject2 = "We got new order from yourwebsite.com";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: '.$from. "\r\n";
			mail("info@yourwebsite.com",$subject2,$message_team,$headers);
			$msg_suc =  'ok';	
	     }
	}
	}
	else
	{
		header('Location: index.html');
	}
	?>
<!-- Success message section start -->
    <section class="order-form order-main">
    	<div class="container text-center">
			<?php if($msg_suc=='ok') {?>
			<h2>Your order placed successfully!</h2>
            <h6>Our team will analyse your order and send you order confirmation mail asap.<br/> Thank you.</h6>
            <?php } ?>    
		 </div>   
</section>
<!-- Success message section end -->
    <!-- Footer Area Start 
    ====================================================== -->
    <footer class="footer-area">
    
        <!-- Start: Footer Top -->
        <div class="footer-top">
        	<div class="container">
            	<div class="row clearfix">
                
                	<!-- Start: Footer Menu -->
                    <div class="col-md-2 footer-menu animated" data-animation="fadeInLeft" data-animation-delay="200">
                    	<nav class="footer-nav">
                        	<ul>
                            	<li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>  
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                	<!-- End: Footer Menu -->
                
                	<!-- Start: Footer About -->
                    <div class="col-md-4 footer-about animated" data-animation="fadeInUp" data-animation-delay="400">
                    	<img class="footer-logo" src="img/logo-footer.png" alt="">
                    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc euismod sed libero at congue. Praesent vulputate dolor velit, in condimentum odio pellentesin ondimentum odio pellentesque</p>
                    </div>
                	<!-- End: Footer About -->
                    
                    <!-- Start: Footer Address -->
                    <div class="col-md-3 footer-address animated" data-animation="fadeInUp" data-animation-delay="600">
                    	<ul>
                        	<li class="email"><a href="#">company@website.com</a></li>
                        	<li class="phone"><a href="#">(00)1800 1234 567</a></li>
                            <li class="address"><b>Lumen</b><br>Street Name, Unknown Place <br>Secret Street, Country, CT99 9899</li>
                        </ul>
                    </div>
                    <!-- End: Footer Address -->
                
                    <!-- Start: Footer Map -->
                    <div class="col-md-3 footer-map animated" data-animation="fadeInRight" data-animation-delay="800">
                    	<img class="map" src="img/map-footer.png" alt="">
                        <ul class="social-footer">
                        	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        	<li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        	<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        	<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                    <!-- End: Footer Map -->
                
                </div>
            </div>
        </div>
        <!-- End: Footer Top -->
        
        <!-- Start: Footer Bottom -->
        <div class="footer-bottom">
        	<div class="container">
                <p>&copy; Lumen - Crafter With <i class="fa fa-heart"></i> ...!  By <a href="www.responsiveexpert.com">Responsive Experts</a></p>
            </div>
        </div>
        <!-- End: Footer Bottom -->
        
    </footer>
    <!-- =================================================
    Footer Area End -->
    
    <!-- JavaScript Files -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script><!-- jquery -->
    <script type="text/javascript" src="js/bootstrap.js"></script><!-- Bootstrap js -->
    <script type="text/javascript" src="js/jquery.particleground.js"></script><!-- Particle Header Js -->
    <script type="text/javascript" src="js/particle.js"></script><!-- Particle Header Js -->
    <script type="text/javascript" src="js/core.js"></script><!-- Core js -->
	<script type="text/javascript">
	$('#order_confirm_id').click(function(e)
	{
	 e.preventDefault();
	 $('#order_frm').submit();
	});
	</script>
    <script type="text/javascript" src="js/responsiveCarousel.js"></script><!-- Appear Js -->
    <script type="text/javascript">
    
		// --------------- Testimonial Carousel -------------------
		// --------------------------------------------------------

		jQuery(document).ready(function($){
			$('.crsl-items').carousel({ visible: 5, itemMinWidth:171, itemMargin: 50 });
		});
    
    </script>
    <script type="text/javascript" src="js/jquery.appear.js"></script><!-- Appear Js -->
    <script type="text/javascript" src="js/settings.js"></script><!-- Settings Js -->
</body>
</html>
