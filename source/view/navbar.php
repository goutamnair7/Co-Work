
<header class="navbar" id="header-navbar">
	<div class="container">
		<a href="../index.php" id="logo" class="navbar-brand">
			<img src="../asset/img/logo.png" alt="" class="normal-logo logo-white"/>
			<div style='padding-top:5px;'>
				<span style='font-size: 1.7em; margin-left: 12px; margin-: 20px; letter-spacing: 1.1px;'>Co Work</span>
			</div>
		</a>
		<div class="clearfix">
			<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="fa fa-bars"></span>
			</button>
			<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
				<ul class="nav navbar-nav pull-left">
					<li>
					<a class="btn" id="make-small-nav">
						<i class="fa fa-bars"></i>
					</a>
					</li>
				</ul>
			</div>
			<div class="nav-no-collapse pull-right" id="header-nav">
				<ul class="nav navbar-nav pull-right">					
					<li class="dropdown profile-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"
						<span style='font-size:1.2em;' class="hidden-xs">Welcome <?php session_start(); echo $_SESSION['name']; ?></span>
					</a>
					</li>
					<li class="hidden-xxs">
					<a class="btn" href="../controller/logout.php">
						<i class="fa fa-power-off"></i>
					</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
