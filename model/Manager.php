<?php

class Manager {

	protected function dbConnect() {
		$db = new PDO('mysql:host=localhost;dbname=bibli;charset=utf8', 'root', '');
		$db->exec('SET NAMES UTF8');
		return $db;
	}

	public function validUser( $user ) {
		if ( isset( $user['id'] ) ) {
			return true;
		} else {
			return false;
		}
	}
}