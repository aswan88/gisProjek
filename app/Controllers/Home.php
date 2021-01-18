<?php

namespace App\Controllers;

use App\Models\DesaModel;
use App\Models\InfoDesaModel;

class Home extends BaseController
{
	protected $DesaModel;
	protected $InfoDesaModel;

	public function __construct()
	{
		$this->DesaModel = new DesaModel();
		$this->InfoDesaModel = new InfoDesaModel();
	}
	public function index()
	{
		$data = [
			'dataDesa' => json_encode($this->DesaModel->getDesa()),
		];
		return view('userView/index', $data);
	}

	public function viewDesa($id)
	{
		$idDesa = $id;
		$data = [
			'dataDesa' => json_encode($this->DesaModel->getDesa($id)),
			'infoDesa' => $this->InfoDesaModel->where(['id_desa' => $idDesa])->first()
		];

		return view('userView/viewDesa', $data);
	}



	//--------------------------------------------------------------------

};
