<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\InvoicesModel;

class InvoiceController extends ResourceController {
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return ResponseInterface
	 */
	public function index() {
		//
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return ResponseInterface
	 */
	public function show($id = null) {
		//
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return ResponseInterface
	 */
	public function new() {
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return ResponseInterface
	 */
	public function create() {
		//
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return ResponseInterface
	 */
	public function edit($id = null) {
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return ResponseInterface
	 */
	public function update($id = null) {
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return ResponseInterface
	 */
	public function delete($id = null) {
		//
	}

	public function getAllInvoice() {
		$invoicesModel = new InvoicesModel();
		$invoices = $invoicesModel->getAllInvoice();
		return $this->respondCreated([
			"status" => true,
			"message"=> "All invoices records",
			"data" => [
				"invoices" => $invoices
			] 
		]);
	}

	public function getInvoiceByID(int $id) {
		if (isset($id)) {
			$invoicesModel = new InvoicesModel();
			$invoiceData = $invoicesModel->getInvoiceByID($id);

			if ($invoiceData) {
				return $this->respondCreated([
					"status" => true,
					"message" => "Invoice information",
					"data" => [
						"user" => $invoiceData
					]
				]);
			} else {
				return $this->respondCreated([
					"status" => true,
					"message" => "Invoice information not found"
				]);
			}
		} else {
			return [];
		}
	}
}
