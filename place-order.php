<?php
// if customer name not exist then return to homepage
if(!isset($_POST['customer_name']))
{
	header('Location: index.html');
}
else
{
$type 				= $_POST['customer_choice'];
	$customer_message 	= $_POST['customer_message'];
	$customer_contact 	= $_POST['customer_contact'];
	$name 		  		= $_POST['customer_name'];
	$email 		   		= $_POST['customer_email'];
	$message 	   		= $_POST['customer_message'];
	$coupon_text   		= $_POST['coupon_text'];
	$inner_page_cost 	= $_POST['innerpage_cost'];
	$custom 	= "name=".$_POST['customer_name']."&customer_contact=".$customer_contact."&email=".$_POST['customer_email']."&customer_message=".$_POST['customer_message'];
	$upres ="";
	$sub_type ="";
	$pay_options ="";
	$currency="$";
	if(isset($_POST['customer_sub_choice']))
	{
		$sub_type 		= $_POST['customer_sub_choice'];
	}
	$type_title = $type." ".$sub_type; 
	$html_options ="";
	$tot_options = "";
	// select additional option values
	if(isset($_POST['html_options']))
	{
	if(!empty($_POST['html_options']))
	{
		$html_options 	= $_POST['html_options'];
		foreach ($html_options as $options){
			$tot_options.=$options."<br />";
			$pay_options.=$options.",";
     	 }
		 }
	} 
	$eta		   = $_POST['etaDropDown'];
	$inner_pages   = $_POST['conversion_inner_pages'];
	$type_cost     = $_POST['type_cost'];
	$actual_cost   = $_POST['actual_amt'];
	$dis_per       = $_POST['dis_per'];
	$total_cost    = $_POST['order_total_amt'];	
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
    
    
	<section class="order-form order-main">
        <div class="container text-center">
            <div class="col-md-12">
                <!-- Revise order contents start-->
                <div class="addi-opts">
                    <h2 align="center">Please revise your order</h2>
                    <hr>
                    <ul class="list-opt clearfix">
                        <li><strong>Name :</strong> <?php echo $name; ?>  </li>
                        <li><strong>Email :</strong> <?php echo $email; ?> </li>
                        <li><strong>Contact :</strong> <?php echo $customer_contact; ?></li>
                        <li><strong>Project Description :</strong> <?php echo $customer_message; ?> </li>
                        <li><strong><?php echo $type_title; ?> :</strong><?php echo  $currency.$type_cost; ?></li>
                        <?php if($inner_pages>0){ ?>
                        <li><strong>Inner Pages [<?php echo $inner_pages; ?>] :</strong> <?php echo $currency.$inner_page_cost; ?> </li>
                        <?php }
                        else {?> 
                        <li><strong>No Innerpages </strong></li>
                        <?php } ?>
                        <?php if($tot_options!=""){?>
                        <li><strong>Additional Options :</strong> <br/>
                        <?php echo $tot_options;?></li>
                        <?php } ?>
                        <li><strong>ETA :</strong> <?php echo $eta;?></li>				
                    </ul>
                    <hr>
                    <div class="price-final">
                    	<!-- Start: Final Price -->
						<?php if($coupon_text!=""){
                        ?>
                        <h3>Grand Total : <?php echo $currency.$actual_cost; ?></h3> 
                        <h4>Amount after discount : <?php echo $currency.$total_cost; ?></h4>
                        <?php
                        } 
                        else
                        {
                        ?>
                        <h3>Grand Total : <?php echo $currency.$total_cost; ?></h3>
                        <?php
                        }
                        ?>
                    	<!-- End: Final Price -->
                    </div>
                </div>
                <!-- Revise order contents end-->
                <!-- Button area start-->
                <div class="order-btn-cont pay-page">
                    <!-- Mail sending button area start-->
                    <form action="thankyou.php" method="post">
                     <input type="hidden" name="customer_name" value="<?php echo $name; ?>">
                    <input type="hidden" name="customer_email" value="<?php echo $email; ?>">
                    <input type="hidden" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    <input type="hidden" name="customer_message" value="<?php echo $customer_message; ?>">
                    <input type="hidden" name="type_cost" value="<?php echo $type_cost; ?>">
                    <input type="hidden" name="tot_options" value="<?php echo $tot_options; ?>">
                    <input type="hidden" name="customer_choice" value="<?php echo $type; ?>">
                    <input type="hidden" name="sub_type" value="<?php echo $sub_type; ?>">
                    <input type="hidden" name="inner_pages" value="<?php echo $inner_pages; ?>">
                    <input type="hidden" name="inner_pages_cost" value="<?php echo $inner_page_cost; ?>">
                    <input type="hidden" name="eta" value="<?php echo $eta; ?>">
                    <input type="hidden" name="coupon_text" value="<?php echo $coupon_text; ?>">
                    <input type="hidden" name="actual_cost" value="<?php echo $actual_cost; ?>">
                    <input type="hidden" name="total_cost" value="<?php echo $total_cost; ?>">
                    <input type="submit" class="button" name="mailus" value="Mail Me !" id="order-mail-id">
                    </form>
                    <!-- Mail sending button area end-->
                    <!-- Pay now button area start-->
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="develo_1353663309_per@gmail.com">
                     <input type="hidden" name="lc" value="IN">
                    <input type="hidden" name="item_name" value="<?php echo $type_title; ?>">
                    <input type="hidden" name="item_number" value="1">                 
                    <?php 
						if($actual_cost!="")
						{
						echo '<input type="hidden" name="amount" value="'.$actual_cost.'">';
						echo '<input type="text" name="discount_rate" value="'.$dis_per.'" style="display: none;">';
						}
						else
						{
						echo '<input type="hidden" name="amount" value="'.$total_cost.'">';	
						}
					?>
                    <input type="hidden" name="Name" value="<?php echo $name; ?>">
                    <input type="text" name="on0" value="Addons"  style="display:none">
                    <input type="hidden" name="custom" id="custom" value="<?php echo $custom; ?>">
                    <input type="text" name="os0" value="<?php echo $pay_options;?>" style="display:none">
               		<!--    Please change return url -->
                    <input type="hidden" name="return" value="http://www.responsiveexpert.com/themes/orderform/thankyou.php">
                    <input type='hidden' name='rm' value='2'>
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="button_subtype" value="services">
                    <input type="hidden" name="no_note" value="0">
                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHostedGuest">
                    <input type="submit" class="button" name="submit" value="Pay Now !" alt="PayPal – The safer, easier way to pay online.">
                    </form>	
                    <!-- Pay now button area end-->
                </div>
                <!-- Button area end-->
            </div>
        </div>
	</section>
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
