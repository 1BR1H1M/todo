<?php
namespace App\Controllers;
use App\Models\Posts;

class Home extends BaseController{
	protected $helpers = [];
	protected $db;

	public function __construct(){
		helper(['url', 'session', 'emai', 'upload', 'system_helper', 'database']);
		$this->db = $db = \Config\Database::connect();
	}

	public function index(){
		$data['title'] 	= 'Codeigniter 4 | LiNuXiToS';
		$data['tab'] 	= 'ptable';
		return view('main', $data);
	}

	public function main(){
		$data['title'] 	= 'Codeigniter 4 | LiNuXiToS';
		$data['tab'] 	= 'ptable';
		return view('main', $data);
	}

	public function loadPosts($page = 1){
		$model = new Posts();

		$get['search'] 	= ($this->request->getVar('search')) ? $this->request->getVar('search'): "";
		$get['limit'] 	= ($this->request->getVar('limit')) ? $this->request->getVar('limit'): 10;
		$get['edo'] 	= ($this->request->getVar('edo')) ? $this->request->getVar('edo')-1: 1;

		$data = [
			'posts' => $model->orderBy('id_post', 'nom_post', 'desc_post', 'slug_post')
						->like('nom_post', $get['search'], 'both')
						->where('act_post', $get['edo'])
						->orderBy('nom_post', 'asc')
		];

		$data['order'] 		= ($this->request->getVar('order')) 	? $this->request->getVar('order') 	: "desc";
		$data['order_by'] 	= ($this->request->getVar('order_by')) 	? $this->request->getVar('order_by'): "id_post";
		$data['search'] 	= ($this->request->getVar('search')) 	? $this->request->getVar('search')	: "";
		$data['page'] 		= ($this->request->getVar('page')) 		? $this->request->getVar('page')	: 1;
		$data['per_page'] 	= ($this->request->getVar('limite')) 	? $this->request->getVar('limite')	: 10;
		$data['filter'] 	= ($this->request->getVar('filter')) 	? $this->request->getVar('filter')-1: 1;

		$bus_sep 			= explode(' ', $data['search']);
		$words 				= splitArraySearch($bus_sep);
		$data['offset'] 	= ($data['page'] - 1) * $data['per_page'];
		$data['adyacentes'] = 2;
		
		
		$total 				= $this->count($data, $words);
		$total_pages 		= ceil($total/$data['per_page']);
		$reload 			= base_url('home/loadPosts');
		$response['total']  = "Total de resultados: ".$total;
		$posts 				= $this->search($data, $words);
		
		$response['data'] 	= "";
		if ($posts) {
			$response['data'] = '<div class="table-responsive">
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
						<tbody>';
			foreach ($posts as $post) {
				$response['data'] .= '<tr id="row-id-'.$post->id_post.'">
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
			$response['data'] .= '</tbody></table></div>';
			$response['data'] .= '<span class="pull-right">'.paginate($reload, $data['page'], $total_pages, $data['adyacentes'], 'load').'</span>';
		}else{
			$response['data'] = '<div class="alert alert-info text-center" role="alert">
				  <i class="fas fa-search"></i> Búsqueda sin resultados...
				</div>';
		}
		return $this->response->setJSON($response);
	}

	public function count($data, $words){
		$db      = \Config\Database::connect();
		$builder = $db->table('ajx_posts');
		$builder->select("count(*) as total");
		$builder->where("act_post", $data['filter']);
		$builder->groupStart();
		$i=0;
		if ($words) {
			foreach ($words as $word) {
				if ($i==0) {
					$builder->like('nom_post', $word);
					$builder->orLike('desc_post', $word);
				}else{
					$builder->orLike('nom_post', $word);
					$builder->orLike('desc_post', $word);
				}
				$i++;
			}
		}else{
			$builder->like('nom_post', "");
			$builder->orLike('desc_post', "");
		}
		$builder->groupEnd();
		$query 	= $builder->get();
		$result = $query->getRow();
		return $result->total;
	}

	public function search($data, $words){
		$db      = \Config\Database::connect();
		$builder = $db->table('ajx_posts as sec');
		$builder->select("sec.*");
		$builder->where("sec.act_post", $data['filter']);

		$builder->groupStart();
		$i=0;
		if ($words) {
			foreach ($words as $word) {
				if ($i==0) {
					$builder->like('nom_post', $word);
					$builder->orLike('desc_post', $word);
				}else{
					$builder->orLike('nom_post', $word);
					$builder->orLike('desc_post', $word);
				}
				$i++;
			}
		}else{
			$builder->like('nom_post', "");
			$builder->orLike('desc_post', "");
		}
		$builder->groupEnd();

		$builder->orderBy($data['order_by'], $data['order']);
		$builder->limit($data['per_page'], $data['offset']);
		$query 	= $builder->get();
		return $query->getResult();
	}

	public function edit($id_post){
		$data['title'] 		= 'Edición | LiNuXiToS';
		$data['tab'] 		= 'edit';
		$data['id_post'] 	= ($id_post) ? $id_post : 0;

		$model_post 		= new Posts();
		$data['info_post'] 	= $model_post->get_postById($data);
		return view('edit', $data);
	}

	public function view($slug){
		$data['title'] 		= 'Vista | LiNuXiToS';
		$data['tab'] 		= 'view';
		$data['slug_post'] 	= ($slug) ? $slug : 0;

		$model_post 		= new Posts();
		$data['info_post'] 	= $model_post->get_postBySlug($data);
		return view('view', $data);
	}

	public function add(){
		$model 		= new Posts();
		$validated 	= $this->validate([
			'file' 	=> [
				'uploaded[file]',
				'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
				'max_size[file,4096]',
			],
		]);

		if ($validated) {
			$file = $this->request->getFile('file');
			$nom_img = fraseAleatoria(4).'-'.fraseAleatoria(4).'.'.$file->getClientExtension();

			$add = [
				'nom_post' 	=> $this->request->getVar('txt-nom-add') ? trim($this->request->getVar('txt-nom-add')):'',
				'desc_post' => $this->request->getVar('txt-desc-add') ? trim($this->request->getVar('txt-desc-add')):'',
				'slug_post' => $slug_post = slugify(get_words($this->request->getVar('txt-nom-add'), 5)),
				'img_post' 	=> 'files/posts/'.$nom_img,
			];

			if ($model->insert($add)) {
				$file->move('public/files/posts/', $nom_img);
				$msg = array("tipo" => 'success',
							"icon" 	=> 'fa fa-check',
							"msg" 	=> 'Registro agregado correctamente.');
			}else{
				$msg = array("tipo" => 'danger',
							"icon" 	=> 'fa fa-exclamation-circle',
							"msg" 	=> 'Error con la base de datos.');
			}
		}else{
			$msg = array("tipo" => 'danger',
						"icon" 	=> 'fa fa-exclamation-circle',
						"msg" 	=> 'Tipo de archivo no válido.');
		}
		return $this->response->setJSON($msg);
	}

	public function update(){
		$model 	= new Posts();
		$id 	= $this->request->getVar('txt-id');

		$validated 	= $this->validate([
			'file' 	=> [
				'uploaded[file]',
				'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
				'max_size[file,4096]',
			],
		]);
		
		if ($validated) {
			$file = $this->request->getFile('file');
			$nom_img = fraseAleatoria(4).'-'.fraseAleatoria(4).'.'.$file->getClientExtension();
			$data = [
				'nom_post' => $this->request->getVar('txt-nom') ? trim($this->request->getVar('txt-nom')) : '',
				'desc_post'  => $this->request->getVar('txt-desc') ? trim($this->request->getVar('txt-desc')) : '',
				'slug_post'  => slugify(get_words($this->request->getVar('txt-nom'), 5)),
				'img_post' 	=> 'files/posts/'.$nom_img,
			];
			if (($save = $model->update($id, $data))) {
				$file->move('public/files/posts/', $nom_img);
				$msg = array("tipo" => 'success',
							"icon" 	=> 'fa fa-check',
							"msg" 	=> 'Registro actualizado.');
			}else{
				$msg = array("tipo" => 'danger',
							"icon" 	=> 'fa fa-exclamation-circle',
							"msg" 	=> 'Error con la base de datos.');
			}
		}else{
			$msg = array("tipo" => 'danger',
						"icon" 	=> 'fa fa-exclamation-circle',
						"msg" 	=> 'Error con la base de datos.');
		}
		return $this->response->setJSON($msg);
	}
 
	public function delete($id_post = 0){
		$model = new Posts();
		if ($model->where('id_post', $id_post)->delete()) {
			$msg = array("tipo" => 'success',
						"icon" 	=> 'fa fa-check',
						"msg" 	=> 'Registro eliminado.');
		}else{
			$msg = array("tipo" => 'danger',
						"icon" 	=> 'fa fa-exclamation-circle',
						"msg" 	=> 'Error con la base de datos.');
		}
		return $this->response->setJSON($msg);
	}

	public function dellist(){
		$list_ids = ($this->request->getVar('list_ids'))? trim($this->request->getVar('list_ids')) : null;
		if (!empty($list_ids)) {
			$model = new Posts();

			$bus_sep = explode(',', $list_ids);
			foreach ($bus_sep as $id) {
				$model->where("id_post", $id)->delete();
			}
			$msg = array("tipo" => 'success',
						"icon" 	=> 'fa fa-check',
						"msg" 	=> 'Registros eliminados.');
		}else{
			$msg = array("tipo" => 'danger',
						"icon" 	=> 'fa fa-exclamation-circle',
						"msg" 	=> 'Error con la base de datos.');
		}
		return $this->response->setJSON($msg);
	}
}
