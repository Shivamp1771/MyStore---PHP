<?php include 'inc/header.php'; ?>
<style>
	.team-bg {
	background-color: #f8f9fa;
	overflow: hidden;
}
.team .section-title {
	padding-bottom: 40px;
}
.team .section-title .main-team-subheading {
	font-size: 14px;
	font-weight: 500;
	padding: 0;
	line-height: 1px;
	margin: 0 0 5px 0;
	letter-spacing: 2px;
	text-transform: uppercase;
	color: #aaaaaa;
}
.team .section-title .main-team-subheading::after {
	content: "";
	width: 120px;
	height: 1px;
	display: inline-block;
	background: #556270;
	margin: 4px 10px;
}
.team .main-team-heading {
	margin: 0;
	font-size: 36px;
	font-weight: 700;
	text-transform: uppercase;
	color: #556270;
}
.team .member {
	position: relative;
	box-shadow: 0px 2px 15px rgba(85, 98, 112, 0.08);
	padding: 30px;
	border-radius: 4px;
	background: #fff;
}
.team .member .pic {
	overflow: hidden;
	width: 140px;
	border-radius: 4px;
}
.team .member .pic img {
	transition: ease-in-out 0.3s;
}
.team .member:hover img {
transform: scale(1.1);
}
.team .member .member-info {
	padding-left: 30px;
}
.team .member .member-heading {
	font-weight: 700;
	margin-bottom: 5px;
	font-size: 20px;
	color: #556270;
	line-height: 1.2;
}
.team .member span {
	display: block;
	font-size: 15px;
	padding-bottom: 10px;
	position: relative;
	font-weight: 500;
}
.team .member span::after {
	content: '';
	position: absolute;
	display: block;
	width: 50px;
	height: 1px;
	background: #dee2e6;
	bottom: 0;
	left: 0;
}
.team .member .member-para {
	margin: 10px 0 0 0;
	font-size: 14px;
}
.team .member .social {
	margin-top: 12px;
	display: flex;
	align-items: center;
	justify-content: flex-start;
}
.team .member .social a {
	transition: ease-in-out 0.3s;
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 4px;
	width: 32px;
	height: 32px;
	background: #8795a4;
}
.team .member .social a + a {
margin-left: 8px;
}
.team .member .social a:hover {
	background: #41A1FD;
}
.team .member .social a .team-icon {
	color: #fff;
	font-size: 16px;
	margin: 0 2px;
}
</style>
 <div class="main">
    <div class="content">
    	<section id="team" class="team team-bg py-5">
	  <div class="container">

		<div class="section-title">
		  <p class="main-team-subheading">Team</p>
		  <p class="main-team-heading">Our Hardworking Team</p>
		</div>

		<div class="row">

		  <div class="grid_1_of_4">
			<div class="member d-flex align-items-start">
			  <div class="pic"><img src="https://image.flaticon.com/icons/png/512/56/56745.png" class="img-fluid" alt=""></div>
			  <div class="member-info">
				<p class="member-heading">John Doe</p>
				<span>Chief Executive Officer</span>
				<p class="member-para">Explicabo voluptatem mollitia et repellat</p>
				<div class="social">
				  <a href=""><i class="fa fa-twitter team-icon"></i></a>
				  <a href=""><i class="fa fa-facebook-f team-icon"></i></a>
				  <a href=""><i class="fa fa-instagram team-icon"></i></a>
				  <a href=""> <i class="fa fa-linkedin-in team-icon"></i> </a>
				</div>
			  </div>
			</div>
		  </div>

		  <div class="grid_1_of_4 mt-4 mt-lg-0">
			<div class="member d-flex align-items-start">
			  <div class="pic"><img src="https://image.flaticon.com/icons/png/512/56/56863.png" class="img-fluid" alt=""></div>
			  <div class="member-info">
				<p class="member-heading">Jane Doe</p>
				<span>Product Manager</span>
				<p class="member-para">Aut maiores voluptates amet et quis</p>
				<div class="social">
				  <a href=""><i class="fa fa-twitter team-icon"></i></a>
				  <a href=""><i class="fa fa-facebook-f team-icon"></i></a>
				  <a href=""><i class="fa fa-instagram team-icon"></i></a>
				  <a href=""> <i class="fa fa-linkedin-in team-icon"></i> </a>
				</div>
			  </div>
			</div>
		  </div>

		  <div class="grid_1_of_4 mt-4">
			<div class="member d-flex align-items-start">
			  <div class="pic"><img src="https://image.flaticon.com/icons/png/512/56/56745.png" class="img-fluid" alt=""></div>
			  <div class="member-info">
				<p class="member-heading">John Doe</p>
				<span>CTO</span>
				<p class="member-para">Quisquam facilis cum velit laborum corrupti</p>
				<div class="social">
				  <a href=""><i class="fa fa-twitter team-icon"></i></a>
				  <a href=""><i class="fa fa-facebook-f team-icon"></i></a>
				  <a href=""><i class="fa fa-instagram team-icon"></i></a>
				  <a href=""> <i class="fa fa-linkedin-in team-icon"></i> </a>
				</div>
			  </div>
			</div>
		  </div>

		  <div class="grid_1_of_4 mt-4">
			<div class="member d-flex align-items-start">
			  <div class="pic"><img src="https://image.flaticon.com/icons/png/512/56/56863.png" class="img-fluid" alt=""></div>
			  <div class="member-info">
				<p class="member-heading">Jane Doe</p>
				<span>Accountant</span>
				<p class="member-para">Dolorum tempora officiis odit laborum officiis</p>
				<div class="social">
				  <a href=""><i class="fab fa-twitter team-icon"></i></a>
				  <a href=""><i class="fab fa-facebook-f team-icon"></i></a>
				  <a href=""><i class="fab fa-instagram team-icon"></i></a>
				  <a href=""> <i class="fab fa-linkedin-in team-icon"></i> </a>
				</div>
			  </div>
			</div>
		  </div>

		</div>

	  </div>
	</section> 	
	<div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>
