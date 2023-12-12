<?php
include 'common/head.php';
include 'common/navbar.php';
include("mdls/mdl_posts.php");
?>

<script type='text/javascript'>
var base_url = '<?=base_url();?>';
</script>

<div id="container" class="container mt-5">
	<div class="row">
		<div class="col-md-12 mt-2">
			<h3 class="mt-3 mb-3 text-center">Paginación con AJAX uitlizando Bootstrap 4.5.2 y Codeigniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?> & PostgreSQL</h3>
			<p class="text-justify">En éste ejemplo les comparto un forma de realizar paginación con ajax, utilizando Codeginiter <?= CodeIgniter\CodeIgniter::CI_VERSION ?> y bootstrap 4. El ejemplo incluye obviamente todo el código y también la base de datos que se utiliza para ello.</p>
		</div>
	</div>

	<!-- content ajax load pagination -->
	<div id="div-cnt-ajax" class="form-row"></div>
	<div class="row mt-3">
		<div class="col-md-12 mb-4">
			<div id="pag-temas"></div>
		</div>
	</div>
	<!-- /content ajax load pagination -->
</div>

<script src="<?=base_url('assets/app/ajax/ajxfuctloadexmp.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		load(0);
	});
</script>

<?php
include 'common/foot.php';
mostrarMensaje();
?>