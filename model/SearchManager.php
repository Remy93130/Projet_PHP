<?php

require_once 'model/Manager.php';

class SearchManager extends Manager {

	public function getPerio( $data ) {
		$db = $this->dbConnect();
	}

	public function getNonPerio( $data ) {
		$db = $this->dbConnect();
	}

	public function getOuvrage( $data )	{
		$db = $this->dbConnect();
	}

	private function getProduction( $data )	{
		$db = $this->dbConnect();
	}
}