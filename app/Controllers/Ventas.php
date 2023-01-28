<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\VentasModel;
use App\Models\ProductosModel;

class Ventas extends BaseController
{

	protected $ventasModel;
	protected $productosModel;
	protected $validation;
	protected $db;

	public function __construct()
	{
		$this->ventasModel = new VentasModel();
		$this->productosModel = new ProductosModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> 'ventas',
			'title'     		=> 'Ventas'
		];

		return view('ventas', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->ventasModel->select()->findAll();

		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save(' . $value->id . ')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			// $ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove(' . $value->id . ')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$rs = $this->productosModel->select("id,nombre")->where('id', $value->id_producto)->first();

			$data['data'][$key] = array(
				$value->id,
				$rs->id." - ".$rs->nombre,
				$value->cantidad,

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

			$data = $this->ventasModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['id_producto'] = $this->request->getPost('id_producto');
		$fields['cantidad'] = $this->request->getPost('cantidad');

		$rs = $this->productosModel->where('id', $fields['id_producto'])->first();

		$this->validation->setRules([
			'id_producto' => ['label' => 'Id producto', 'rules' => 'required|min_length[0]'],
			'cantidad' => ['label' => 'Cantidad', 'rules' => 'required|numeric|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {
			if ($rs->stock < $fields['cantidad']) {
				//echo "debug4 menos menor meno\n";
				$response['success'] = false;
				$response['messages'] = lang("App.stock-error");
			} else {
				if ($this->ventasModel->insert($fields)) {
					$fields['stock'] = $rs->stock - $fields['cantidad'];

					$this->productosModel->update($fields['id_producto'], $fields);

					$response['success'] = true;
					$response['messages'] = lang("App.insert-success");
				} else {

					$response['success'] = false;
					$response['messages'] = lang("App.insert-error");
				}
			}
		}

		return $this->response->setJSON($response);
	}

	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['id_producto'] = $this->request->getPost('id_producto');
		$fields['cantidad'] = $this->request->getPost('cantidad');


		$this->validation->setRules([
			'id_producto' => ['label' => 'Id producto', 'rules' => 'required|min_length[0]'],
			'cantidad' => ['label' => 'Cantidad', 'rules' => 'required|numeric|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->ventasModel->update($fields['id'], $fields)) {

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

			if ($this->ventasModel->where('id', $id)->delete()) {

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
