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
						Paginación en tablas y búsquedas sin utilizar ajax
					</h1>
				</div>
			</div>
		</div>
	</div>

	<form method="get" enctype="multipart/form-data" accept-charset="utf-8" id="form-search" name="form-search" action="<?=base_url('ptablesnjx');?>">
		<div class="form-row mt-2 mb-1">
			<div class="col-md-1 col-sm-1 col-2">
				<select class="form-control custom-select" name="limit">
					<option selected="" value="5" <?=($limit&&$limit==10?'selected=""':'');?>>10</option>
					<option value="10" <?=($limit&&$limit==20?'selected=""':'');?>>20</option>
					<option value="20" <?=($limit&&$limit==30?'selected=""':'');?>>30</option>
					<option value="30" <?=($limit&&$limit==40?'selected=""':'');?>>40</option>
				</select>
			</div>						
			<div class="col-md-9 col-sm-11 col-10">
				<div class="input-group">
					<div class="input-group-prepend">
						<select class="form-control custom-select" name="edo">
							<option value="2" <?=($edo==1?'selected=""':'');?>>Activos</option>
							<option value="1" <?=($edo==0?'selected=""':'');?>>Inactivos</option>
						</select>
					</div>
					<input type="text" class="form-control txt-search-nv" name="search" id="txt-search" placeholder="Buscar..." value="<?=($search?$search:'');?>">
					<div class="input-group-append">
						<button type="submit" class="btn btn-search-nav">
							<i class="fal fa-search"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-2">
				<button type="button" class="btn btn-block btn-success" title="Agregar Sección" data-toggle="modal" data-target="#mdl-add-reg">
					<i class="fa fa-plus-circle"></i> Agregar Registro
				</button>
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-md-12 text-right">
			<h5 id="h5-cnt-total"></h5>
		</div>
	</div>
	<div class="row">
		<div id="div-cnt-load" class="col-md-12">
			<div class="table-responsive">
				<table  class="table table-hover">
					<thead>
						<tr class="row-link">
							<th class="text-left w-10">
								<div class="align-middle checkbox checkbox-danger" style="display: inline;">
									<input id="chk-all-regs" type="checkbox">
									<label for="chk-all-regs" style="padding-bottom: 6px;"></label>
								</div>
								<button class="btn btn-sm quick-btn btn-link text-danger mdl-del-regs" id="btn-del-list" title="Eliminar seleccionados" data-toggle="modal" data-target="#mdl-del-regs" disabled="disabled">
									<i class="fas fa-trash-alt"></i>
									<i id="spn-del" class="spn-total"></i>
								</button>
							</th>
							<th data-field="id_post" class="th-link text-left"> <i class="fas fa-sort"></i> # </th>
							<th data-field="nom_post" class="th-link"><i class="fas fa-sort"></i> Nombre</th>
							<th class="text-center w-10">Acciones</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if ($posts) {
						foreach ($posts as $post) {
							echo '<tr id="row-id-'.$post->id_post.'">
								<td class="text-left">
									<div class="checkbox checkbox-primary">
										<input type="checkbox" class="chks-regs" name="chk-reg-'.$post->id_post.'" id="chk-reg-'.$post->id_post.'" data-iddel="'.$post->id_post.'">
										<label for="chk-reg-'.$post->id_post.'">  </label>
									</div>
								</td>
								<td class="text-left">
									'.$post->id_post.'
								</td>
								<td>
									<a href="'.base_url('post/'.$post->slug_post).'">'.$post->nom_post.'</a>
								</td>
								<td class="text-center">
									<a href="'.base_url('edit/'.$post->id_post).'" class="btn btn-primary btn-sm"><i class="fal fa-edit"></i> </a> 
									<button type="button" class="btn btn-danger mdl-del-reg btn-sm" title="Eliminar" data-toggle="modal" data-target="#mdl-del-reg" data-idreg="'.$post->id_post.'" data-nomreg="'.$post->nom_post.'">
										<i class="fal fa-trash-alt"></i>
									</button>
								</td>
							</tr>';
						}
					}else{
						echo '<tr id="nones-32">
									<td colspan="4">
										<div class="alert alert-info text-center" role="alert">
											<i class="fas fa-search"></i> Búsqueda sin resultados...
										</div>
									</td>
								</tr>';
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-12">
			<?php
			if ($pager) {
				$pagi_path = 'devs/ci4_tutorials/ptablenotajax';
				$pager->setPath($pagi_path);
				echo $pager->links('bootstrap', 'bootstrap_pagination');
			}
			?>
		</div>
	</div>
</div>

<script src="<?=base_url('assets/app/ajax/ajxnottablepage.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		//load(1);
	});
</script>

<?php
include 'common/foot.php';
mostrarMensaje();
?>