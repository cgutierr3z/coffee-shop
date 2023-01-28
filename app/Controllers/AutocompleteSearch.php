<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;

class AutocompleteSearch extends BaseController
{
    public function index()
    {
        return view('Productos::index');
    }

    public function ajaxCatSearch()
    {
        helper(['form', 'url']);
        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('categorias');
        if($this->request->getVar('q')=="")
        {
            $search = "";
        } else {
            $search = $this->request->getVar('q');
        } 
        $query = $builder->like('nombre', $search)
                    ->select('id')
                    ->select("CONCAT(id , ' - ', nombre) AS text", FALSE)
                    ->limit(10)->get();
        
        $data = $query->getResult();
        
		echo json_encode($data);
    }

    public function ajaxProdSearch()
    {
        helper(['form', 'url']);
        $data = [];
        $db      = \Config\Database::connect();
        $builder = $db->table('productos');
        if($this->request->getVar('q')=="")
        {
            $search = "";
        } else {
            $search = $this->request->getVar('q');
        }
        $query = $builder->like('nombre', $search)
                    ->select('id')
                    ->select("CONCAT(id , ' - ', nombre, ' - stock: ', stock) AS text", FALSE)
                    ->limit(10)->get();
        $data = $query->getResult();
        
		echo json_encode($data);
    }
}
