		<div id="nav-col">
			<section id="col-left" class="col-left-nano">
				<div id="col-left-inner" class="col-left-nano-content">
					<div id="user-left-box" class="clearfix hidden-sm hidden-xs">
						<div class="user-box">
							<span class="name" style='margin-left:-8px;'>
								Welcome <?php require '../controller/ensure_login.php'; echo $_SESSION['name']; ?>
							</span>
						</div>
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
						<ul class="nav nav-pills nav-stacked">
							<li id="dashboard">
							<a href="dashboard.php">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
							</a>
							</li>
							<li id='register_startup'>
							<a href="register_startup.php">
								<i class="fa fa-building-o"></i>
								<span>Register Startup</span>
							</a>
							</li>
							<li id='register_admin'>
							<a href="register_admin.php">
								<i class="fa fa-user"></i>
								<span>Register Admin</span>
							</a>
							</li>
							<li id='spaces'>
							<a href="spaces.php">
								<i class="fa fa-tree"></i>
								<span>Spaces</span>
							</a>
							</li>
							<li id='newspace'>
							<a href="add_new_space.php">
								<i class="fa fa-sitemap"></i>
								<span>Add Space</span>
							</a>
							</li>
							<li id='invoice'>
							<a href="invoice.php">
								<i class="fa fa-file-text-o"></i>
								<span>Invoice</span>
							</a>
							</li>
							<li id='startup_page'>
							<a href="startup_page.php">
								<i class="fa fa-columns"></i>
								<span>Startup Page</span>
							</a>
							</li>
							<li id='chpasswd'>
							<a href="change_password.php">
								<i class="fa fa-unlock-alt"></i>
								<span>Reset Password</span>
							</a>
							</li>
							<li id='logoutsession'>
							<a href="../controller/logout.php">
								<i class="fa fa-sign-out"></i>
								<span>Logout</span>
							</a>
							</li>
						</ul>
					</div>
				</div>
			</section>
		</div>
