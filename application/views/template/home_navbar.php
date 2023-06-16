<!-- Start Navbar Area -->
<div class="navbar-area">
			<!-- Menu For Mobile Device untuk menambahkan logo pada header navbar website -->
			<div class="mobile-nav">
				<a href="index.html" class="logo">
					<img src="<?= base_url('front-end/'); ?>assets/img/sepada.png" alt="Logo">
				</a>
			</div>

			<!-- Menu For Desktop Device untuk menambahkan logo pada header navbar website -->
			<div class="main-nav">
				<div class="container-fluid">
					<nav class="navbar navbar-expand-md">
						<a class="navbar-brand" href="<?= base_url('home/index'); ?>">
							<img src="<?= base_url('front-end/'); ?>assets/img/sepada.png" style="width: 147px; height: 35px;" alt="Logo">
						</a>
						
						<div class="collapse navbar-collapse mean-menu">
							<ul class="navbar-nav m-auto">

								<li class="nav-item">
									<a href="<?= base_url('home/index'); ?>" class="nav-link active">
										Dashboard
									</a>
								</li>

								<li class="nav-item">
									<a href="<?= base_url('home/about'); ?>" class="nav-link">About</a>
								</li>

								<li class="nav-item">
									<a href="<?= base_url('home/contact'); ?>" class="nav-link">Contact</a>
								</li>

								<li class="nav-item">
									<a href="<?= base_url('Login/index'); ?>" class="nav-link">Login</a>
								</li>

								<li class="nav-item">
									<a href="#" class="nav-link">
										Pages
										<i class="bx bx-chevron-down"></i>
									</a>

									<ul class="dropdown-menu">

										<li class="nav-item">
											<a href="<?= base_url('home/portfolio'); ?>" class="nav-link">
												Tambah Tamu
											</a>
										</li>

										<li class="nav-item">
											<a href="<?= base_url('home/team'); ?>" class="nav-link">Agenda</a>
										</li>

										
									</ul>
								</li>

							</ul>
							
							<!-- Start Other Option -->
							<div class="others-option">
								<div class="menu-icon">
									<a href="#" class="burger-menu">
										<i class="flaticon-menu-button"></i>
									</a>
								</div>	
							</div>
							<!-- End Other Option -->
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!-- End Navbar Area -->