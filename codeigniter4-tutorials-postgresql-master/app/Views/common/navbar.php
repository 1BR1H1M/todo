<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="<?=base_url();?>">
			<img class="img-fluid d-none" src="<?=base_url();?>/assets/app/images/logo_navbar.svg" id="logo_custom"  alt="logo"> Tools
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="https://linuxitos.com/blog/about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="https://linuxitos.com/blog/servicios">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="https://linuxitos.com/blog/contacto">Contact</a>
				</li>
				<li class="nav-item dropdown desplegable">
					<a class="nav-link dropdown-toggle" href="#" id="menu-options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tutorials
					</a>
					<div class="dropdown-menu dropdown-menu-right desplegable-menu border-dark" aria-labelledby="menu-options">
						<a class="dropdown-item <?=($tab == 'pageajax'?'active': '');?>" href="<?=base_url('pageajax');?>">Paginación con ajax</a>
						<a class="dropdown-item <?=($tab == 'pagenotajax'?'active': '');?>" href="<?=base_url('pagenotajax');?>">Paginación sin ajax</a>
						<a class="dropdown-item <?=($tab == 'ptable'?'active': '');?>" href="<?=base_url('ptables');?>">Paginación en tablas con ajax</a>
						<a class="dropdown-item <?=($tab == 'ptablenotajax'?'active': '');?>" href="<?=base_url('ptablesnjx');?>">Paginación en tablas sin ajax</a>
						<a class="dropdown-item <?=($tab == 'images'?'active': '');?>" href="<?=base_url('upimages');?>">Subir imágenes</a>
						<!--a class="dropdown-item" href="<?=base_url();?>/pcheckbox">Checkbox en tablas</a>
						<a class="dropdown-item" href="<?=base_url();?>/scroll">Cargar elementos con scroll</a>
						<a class="dropdown-item" href="<?=base_url();?>/recaptcha">Recaptcha v2</a>
						<a class="dropdown-item" href="<?=base_url();?>/recaptchav3">Recaptcha v3</a -->
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>