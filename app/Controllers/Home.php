<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use App\Models\ProductosModel;
use App\Models\VentasModel;

class Home extends BaseController
{
    protected $ventasModel;
	protected $productosModel;
    protected $categoriasModel;

	public function __construct()
	{
		$this->ventasModel = new VentasModel();
		$this->productosModel = new ProductosModel();
        $this->categoriasModel = new CategoriasModel();
	}

    public function index()
    {
        $data = [
			'controller'    	=> 'home',
			'title'     		=> 'Home'
		];

        $data['countProductos'] = $this->productosModel->get()->getNumRows();
        $data['countVentas'] = $this->ventasModel->get()->getNumRows();
        $data['countCategorias'] = $this->categoriasModel->get()->getNumRows();

		return view('home', $data);
    }
}
