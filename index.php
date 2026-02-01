<?php
require_once ("app/Config/connDB.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Profile &mdash; احمد عسکرینیا</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="public/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="public/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="public/css/bootstrap.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="public/css/style.css">

	<!-- Modernizr JS -->
	<script src="public/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
        <script src="public/js/respond.min.js"></script>
        <![endif]-->

	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">	
	<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image:url(public/images/cover_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
							<div class="profile-thumb" style="background: url(<?php echo file_get_contents("app/Storage/imageProfile.txt")?>);"></div>
							<h1><span><?php echo file_get_contents("app/Storage/name.txt"); ?></span></h1>
							<h3><span><?php echo file_get_contents("app/Storage/summerSkill.txt"); ?></span></h3>
							<p>
								<ul class="fh5co-social-icons">
									<li><a href="<?php echo file_get_contents("app/Storage/instagram.txt"); ?>"><i class="icon-instagram"></i></a></li>
									<li><a href="<?php echo file_get_contents("app/Storage/telegram.txt"); ?>"><i class="icon-telegram"></i></a></li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-about" class="animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>درباره من</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4" dir="ltr">
					<ul class="info">
						<li><span class="second-block">تلفن تماس:</span><span class="first-block"><?php echo file_get_contents("app/Storage/phoneNumber.txt");?></span></li>
						<li><span class="second-block">ایمیل:</span><span class="first-block"><?php echo file_get_contents("app/Storage/email.txt"); ?></span></li>
						<li><span class="second-block">آدرس:</span><span class="first-block"><?php echo file_get_contents("app/Storage/address.txt"); ?></span></li>
					</ul>
				</div>
				<div class="col-md-8"  >
					<h2 class="w-100 rigt"><?php echo file_get_contents("app/Storage/titleAboutMe.txt") ?></h2>
                    <p><?php echo file_get_contents("app/Storage/descriptionAboutMe.txt"); ?></p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="<?php echo file_get_contents("app/Storage/telegram.txt"); ?>"><i class="icon-telegram"></i></a></li>
							<li><a href="<?php echo file_get_contents("app/Storage/instagram.txt"); ?>"><i class="icon-instagram"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-resume" class="fh5co-bg-color">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>رزومه من</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<ul class="timeline">
						<li class="timeline-heading text-center animate-box">
							<div><h3>تجربه کاری من</h3></div>
						</li>
                        <?php
                        $getWrokExperience =$conn->query("SELECT * FROM `work_experience`");
                        $timeline="timeline-inverted";
                        while($row = $getWrokExperience->fetch_row()){
                            echo "<li class ='animate-box $timeline'>";
                            echo "<div class='timeline-badge'><i class='icon-suitcase'></i></div>";
                            echo "<div class='timeline-panel'>";
                            echo "<div class='timeline-heading'>";
                            echo "<h3 class='timeline-title'>$row[1]</h3>";
                            echo "<span class='company'>$row[2]</span>";
                            echo "</div>";
                            echo "<div class='timeline-body'>";
                            echo "<p>$row[3]</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</li>";
                            if ($timeline=="timeline-inverted"){
                                $timeline="timeline-unverted";
                            }else{
                                $timeline="timeline-inverted";
                            }
                        }
                        ?>



						<br>
						<li class="timeline-heading text-center animate-box">
							<div><h3>تحصیلات</h3></div>
						</li>
                        <?php
                        $getEducation=$conn->query("SELECT * FROM `education`");
                        $timelineEducation="timeline-inverted";
                        while($row = $getEducation->fetch_row()){
                            echo "<li class ='animate-box $timelineEducation'>";
                            echo "<div class='timeline-badge'><i class='icon-graduation-cap'></i></div>";
                            echo "<div class='timeline-panel'>";
                            echo "<div class='timeline-heading'>";
                            echo "<h3 class='timeline-title'>$row[1]</h3>";
                            echo "<span class='company'>$row[2]</span>";
                            echo "</div>";
                            echo "<div class='timeline-body'>";
                            echo  "<p>$row[3]</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</li>";
                            if ($timelineEducation=="timeline-unverted"){
                                $timelineEducation="timeline-inverted";
                            }else{
                                $timelineEducation="timeline-unverted";
                            }
                        }
                        ?>

			    	</ul>
				</div>
			</div>
		</div>
	</div>
	

	<div id="fh5co-features" class="animate-box">
		<div class="container">
			<div class="services-padding">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>سرویس های من</h2>
					</div>
				</div>
				<div class="row">
                    <?php
                    $getMyServices=$conn->query("SELECT * FROM `services`");
                    while ($row = $getMyServices->fetch_row()) {
                        echo "<div class='col-md-4 text-center'>";
                        echo "<div class='feature-left'>";
                        echo "<span class='icon'>$row[1]</span>";
                        echo "<div class='feature-copy'>";
                        echo "<h3>$row[2]</h3>";
                        echo "<p>$row[3]</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>

				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-skills" class="animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>مهارت های من</h2>
				</div>
			</div>
			<div class="row row-pb-md">
                <?php
                $getAllSkills=$conn->query("SELECT * FROM `skills` ORDER BY `id` DESC");
                while($row = $getAllSkills->fetch_row()) {
                    echo "<div class='col-md-3 col-sm-6 col-xs-12 text-center'>";
                    echo "<div class='chart' data-percent='$row[2]'><span><strong>$row[1]</strong><strong>$row[2]%</strong></span></div>";
                    echo "</div>";
                }
                ?>
			</div>

		</div>
	</div>

	<div id="fh5co-work" class="fh5co-bg-dark">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>نمونه کار های من</h2>
				</div>
			</div>
			<div class="row flex-nowrap overflow-x-auto horizontal-scroll">
                <?php
                $getAllWorks=$conn->query("SELECT * FROM `works` ORDER BY `id` DESC");
                while ($row = $getAllWorks->fetch_row()) {

                    echo "<div class='col-md-3 text-center col-padding animate-box'>";
                    echo "<a href='#' class='work' style='background-image: url(".$row[1].")'>";
                    echo "<div class='desc'>";
                    echo "<h3>$row[2]</h3>";
                    echo "<span>$row[3]</span>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
                ?>

			</div>
		</div>
	</div>

	<div id="fh5co-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>وبلاگ</h2>
					<p>اینجا وبلاگ شخصی منه که پست های روزانمو میزارم</p>
				</div>
			</div>
			<div class="row flex-nowrap overflow-x-auto horizontal-scroll">
                <?php 
                $getAllBlog=$conn->query("SELECT * FROM `blog` ORDER BY `id` DESC");
                while ($row = $getAllBlog->fetch_row()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='fh5co-blog animated-box'>";
                    echo "<a href='#' class='blog-bg' style='background-image: url($row[1])'></a>";
                    echo "<div class='blog-text'>";
                    echo "<span class='posted_on'>$row[2]</span>";
                    echo "<h3><a href='#'>$row[3]</a></h3>";
                    echo "<p>$row[4]</p>";
                    echo "<ul class='stuff'>";
                    echo "<li><i class='icon-heart2'></i>$row[5]</li>";
                    echo "<li><i class='icon-eye2'></i>$row[6]</li>";
                    echo "<li><a href='blog.php?id=$row[0]'>Read More<i class='icon-arrow-right2'></i></a></li>";
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>

	</div>
	
	<div id="fh5co-started" class="fh5co-bg-dark">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>ارتباط با من</h2>
					<p>برای ارتباط با من میتونید از طریق فرم زیر اقدام کنید. در کمترین زمان باهاتون تماس میگیرم</p>
					<p><a href="#send" class="btn btn-default btn-lg">ارتباط با من</a></p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-consult">
		<div class="video fh5co-video" style="background-image: url(public/images/cover_bg_1.jpg);">
			<div class="overlay"></div>
		</div>
		<div class="choose animate-box" id="send">
			<h2>فرم تماس</h2>
			<form action="#">
				<div class="row form-group">
					<div class="col-md-6">
						<input type="text" id="fname" class="form-control" placeholder="نام">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<input type="text" id="lname" class="form-control" placeholder="نام خانوادگی">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<input type="text" id="email" class="form-control" placeholder="تلفن تماس">
					</div>
				</div>


				<div class="row form-group">
					<div class="col-md-12">
						<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="متن پیام شما . . ."></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="ارسال پیام" class="btn btn-primary">
				</div>

			</form>	
		</div>
	</div>


	
	<div id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p> All rights reserved to <a href="https://t.me/iranire" target="_blank"> Mostafa Hafezipour &copy;</a></p>
				</div>
			</div>
		</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
	</div>
	<!-- jQuery -->
	<script src="public/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="public/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="public/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="public/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="public/js/jquery.stellar.min.js"></script>
	<!-- Easy PieChart -->
	<script src="public/js/jquery.easypiechart.min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="public/js/google_map.js"></script>
	
	<!-- Main -->
	<script src="public/js/main.js"></script>
            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

