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
			<h1 class="mt-3 mb-3 text-center">Paginación sin ajax uitlizando Bootstrap 4.5.2 y Codeigniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h1>
			<p class="text-justify">En éste ejemplo les comparto un forma de realizar paginación con ajax, utilizando codeginiter <?= CodeIgniter\CodeIgniter::CI_VERSION ?> y bootstrap 4. El ejemplo incluye obviamente todo el código y también la base de datos que se utiliza para ello.</p>
		</div>
	</div>

	<!-- content ajax load pagination -->
	<div id="div-cnt-ajax" class="row">
		<?php
		foreach($posts as $post){
			echo '<div class="col-md-4 col-sm-6 col-xs-6 mb-2">
						<div class="card mb-2">
								<a href="'.base_url('post/'.$post->slug_post).'">
									<img src="'.base_url('assets/app/images/default_post.png').'" class="card-img-top">
								</a>
								<div class="card-body font-weight-bold ">
									<a class="text-dark" href="'.base_url('post/'.$post->slug_post).'">
										'.$post->nom_post.'
									</a>
									<div>
										<small class="float float-right"><span class="byline-author-label">By</span>
											<a class="byline-author-name-link" href="#" title="LiNuXiToS">LiNuXiToS</a></small>
										<small>'.mesDiaAnio($post->fc_post).'</small>
									</div>
								</div>
							</div>
					</div>';
		}
		?>
	</div>
	<div class="row mt-3">
		<div class="col-md-12 mb-4">
			<div id="pag-temas">
				<?php
				if ($pager) {
					$pagi_path = 'devs/ci4_tutorials/pagenotajax';
					$pager->setPath($pagi_path);
					//echo $pager->links();
					echo $pager->links('bootstrap', 'bootstrap_pagination');
				}
				?>
			</div>
		</div>
	</div>
	<!-- /content ajax load pagination -->
</div>

<?php
include 'common/foot.php';
mostrarMensaje();
?>