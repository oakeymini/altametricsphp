<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoicesModel extends Model {
	protected $db;
	protected $table = 'Invoice';
	protected $allowedFields = ['id', 'amount', 'due_date', 'description', 'user_id'];

	public function __construct() {
		$this->db = db_connect();
		$this->builder = $this->db->table($this->table);
	}

	public function getAllInvoice(): Array {
		$query = $this->builder->get();
		return $query->getResult();
	}

	public function getInvoiceByID(int $id): Array {
		if (isset($id)) {
			$query = $this->builder->getWhere(['id' => $id]);
			return $query->getResult();
		} else {
			return [];
		}
	}
} 