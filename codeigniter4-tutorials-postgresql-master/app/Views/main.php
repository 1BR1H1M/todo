<?php
include 'common/head.php';
include 'common/navbar.php';
include("mdls/mdl_posts.php");
?>

<script type='text/javascript'>
var base_url = '<?=base_url();?>';
</script>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12 mt-3 mb-2">
			<div class="bg-info rounded p-3">
				<div class="card-body">
					<h1>
						Codeigniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?> & Bootstrap 4.5.2 & PostgreSQL 12
					</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- https://ilmucoding.com/codeigniter-4-authentication/ -->
	<div class="form-row mt-2 mb-1">
		<div class="col-md-1 col-sm-1 col-2">
			<div class="dropdown-limit input-group">
				<button type="button" class="btn btn-primary dropdown-toggle btn-block" data-toggle="dropdown">
					<span class="d-none d-md-inline-block fa fa-list-ol"></span> <span id="spn-show-list">10</span>
				</button>
				<div id="select-list" class="dropdown-menu">
					<a class="dropdown-item" href="#" data-total="10">10</a>
					<a class="dropdown-item" href="#" data-total="20">20</a>
					<a class="dropdown-item" href="#" data-total="30">30</a>
					<a class="dropdown-item" href="#" data-total="40">40</a>
					<a class="dropdown-item" href="#" data-total="50">50</a>
				</div>
			</div>
		</div>						

		<div class="col-md-9 col-sm-11 col-10">
			<form method="post" enctype="multipart/form-data" accept-charset="utf-8" id="form-search" name="form-search">
				<div class="input-group">
					<div class="dropdown-edo input-group-prepend">
						<button id="btn-search-on" type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
							<i id="i-icon-act" class="fas fa-check"></i> <span id="spn-desc-act" class="d-none d-md-inline-block">Activos</span>
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#" data-desc="Todos" data-icon="fas fa-list-ol" data-edo="3">
								<i class="fas fa-list-ol"></i> Todos
							</a>
							<a class="dropdown-item" href="#" data-desc="Activos" data-icon="fas fa-check" data-edo="2">
								<i class="fas fa-check"></i> Activos
							</a>
							<a class="dropdown-item" href="#" data-desc="Inactivos" data-icon="fas fa-times" data-edo="1">
								<i class="fas fa-times"></i> Inactivos
							</a>
						</div>
					</div>
					<input type="text" class="form-control txt-search-nv" name="txt-search" id="txt-search" placeholder="Buscar...">
					<div class="input-group-append">
						<button type="submit" class="btn btn-search-nav" name="btn-search" id="btn-search">
							<i class="fal fa-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-2 col-sm-2 col-2">
			<button class="btn btn-block btn-success mdl-add-reg" title="Agregar Sección" data-toggle="modal" data-target="#mdl-add-reg">
				<i class="fa fa-plus-circle"></i> Agregar Registro
			</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-right">
			<h5 id="h5-cnt-total"></h5>
		</div>
	</div>
	<div class="row">
		<div id="div-cnt-load" class="col-md-12"></div>
	</div>
</div>

<script src="<?=base_url('assets/app/ajax/ajxtablepage.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		load(1);
	});
</script>

<?php
include 'common/foot.php';
mostrarMensaje();
?>