<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProductosModel;

class Productos extends BaseController
{

	protected $productosModel;
	protected $validation;
	protected $db;

	public function __construct()
	{
		$this->productosModel = new ProductosModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> 'productos',
			'title'     		=> 'Productos'
		];

		return view('productos', $data);
	}

	public function getdata(){	

		$this->db->select('*');
		$this->db->from('productos'); // this is first table name
		$this->db->join('categorias', 'categorias.id = productos.id_categoria','left'); // this is second table name with both table ids
		$query = $this->db->get();
		return $query->result();
	
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->productosModel->select()->findAll();

		//$result = $this->getdata();

		foreach ($result as $key => $value) {

			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save(' . $value->id . ')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove(' . $value->id . ')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id,
				$value->nombre,
				$value->referencia,
				$value->precio,
				$value->peso,
				$value->id_categoria,
				$value->stock,

				$ops
			);
		}

		return $this->response->setJSON($data);
	}

	public function getOne()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if ($this->validation->check($id, 'required|numeric')) {

			$data = $this->productosModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nombre'] = $this->request->getPost('nombre');
		$fields['referencia'] = $this->request->getPost('referencia');
		$fields['precio'] = $this->request->getPost('precio');
		$fields['peso'] = $this->request->getPost('peso');
		$fields['id_categoria'] = $this->request->getPost('id_categoria');
		$fields['stock'] = $this->request->getPost('stock');


		$this->validation->setRules([
			'nombre' => ['label' => 'Nombre', 'rules' => 'required|min_length[0]|max_length[100]'],
			'referencia' => ['label' => 'Referencia', 'rules' => 'required|min_length[0]|max_length[100]|is_unique[productos.referencia,id,{id}]'],
			'precio' => ['label' => 'Precio', 'rules' => 'required|numeric|min_length[0]'],
			'peso' => ['label' => 'Peso', 'rules' => 'required|numeric|min_length[0]'],
			'id_categoria' => ['label' => 'Id categoria', 'rules' => 'required|min_length[0]'],
			'stock' => ['label' => 'Stock', 'rules' => 'required|numeric|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->productosModel->insert($fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.insert-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.insert-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nombre'] = $this->request->getPost('nombre');
		$fields['referencia'] = $this->request->getPost('referencia');
		$fields['precio'] = $this->request->getPost('precio');
		$fields['peso'] = $this->request->getPost('peso');
		$fields['id_categoria'] = $this->request->getPost('id_categoria');
		$fields['stock'] = $this->request->getPost('stock');


		$this->validation->setRules([
			'nombre' => ['label' => 'Nombre', 'rules' => 'required|min_length[0]|max_length[100]'],
			'referencia' => ['label' => 'Referencia', 'rules' => 'required|min_length[0]|max_length[100]|is_unique[productos.referencia,id,{id}]'],
			'precio' => ['label' => 'Precio', 'rules' => 'required|numeric|min_length[0]'],
			'peso' => ['label' => 'Peso', 'rules' => 'required|numeric|min_length[0]'],
			'id_categoria' => ['label' => 'Id categoria', 'rules' => 'required|min_length[0]'],
			'stock' => ['label' => 'Stock', 'rules' => 'required|numeric|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->productosModel->update($fields['id'], $fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.update-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.update-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function remove()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {

			if ($this->productosModel->where('id', $id)->delete()) {

				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
			}
		}

		return $this->response->setJSON($response);
	}
}
