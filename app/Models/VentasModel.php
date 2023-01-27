<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class VentasModel extends Model {
    
	protected $table = 'ventas';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_producto', 'cantidad'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert = ["callBeforeInsert"];
	protected $afterInsert = ["callAfterInsert"];

	protected function callBeforeInsert(array $data)
	{
		log_message("info", "Running method before insert");

		return $data;
	}

	protected function callAfterInsert(array $data)
	{
		// $data -> It contains a model object with values

		//log_message("info", "After create running " . json_encode($data));
		
		//log_message("info", "Running method after insert " . $data["data"]["email"]);
	  
		log_message("info", "Running method after insert");

		return $data;
	}
}