<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Posts;

class Pagenotajax extends BaseController{
	protected $helpers = [];
	protected $db;

	public function __construct(){
		helper(['url', 'session', 'emai', 'upload', 'system_helper', 'database']);
		$this->db = $db = \Config\Database::connect();
	}

	public function index($page = 1){
		$model = new Posts();
		$pager = \Config\Services::pager();
		$data = [
			'posts' => $model->orderBy('id_post')
						->paginate(6, 'bootstrap'),
			'pager' => $model->pager,
			'title' => 'Codeigniter 4 & Bootstrap 4.5.0 | LiNuXiToS',
			'tab' => 'pagenotajax',
		];
		return view('pagenotajax', $data);
	}
}
