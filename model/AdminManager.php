<?php

require_once 'Manager.php';

class AdminManager extends Manager {

	/**
	 * Check if an admin is connect and create the session
	 */
	public function connect( $login, $pwd ) {
		$db = $this->dbConnect();
		$login = htmlspecialchars( $login );
		$pwd = sha1( $pwd );
		$sql = 'SELECT id FROM admin WHERE login = :login AND pwd = :pwd';
		$req = $db->prepare( $sql );
		$req->execute(array(
			'login'	=> $login,
			'pwd' 	=> $pwd));
		$account = $req->fetch();
		if ( !$account ) {
			return false;
		} else {
			$_SESSION['admin'] = $account['0'];
			return true;
		}
	}

	public function checkSession( $user )  {
		if ( isset( $user['admin'] ) ) {
			return true;
		} else {
			return false;
		}
	}

	public function getLate() {
		$db = $this->dbConnect();
		$sql = 'SELECT * FROM retardretourproduction';
		$req = $db->query($sql);
		return $req;
	}

	public function addEditeur( $name, $phone, $rue, $cp, $city ) {
		$db = $this->dbConnect();
		$sql = 'INSERT INTO editeur (Nomedit, Teledit, Ruedit, Postedit, Villedit)
				VALUES (:name, :phone, :rue, :cp, :city)';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':name'  => $name,
			':phone' => $phone,
			':rue'   => $rue,
			':cp'    => $cp,
			':city'  => $city));
	}

	public function addMotMat( $abr, $mat )	{
		$abr = strtoupper( $abr );
		$db = $this->dbConnect();
		$sql = 'INSERT INTO matiere VALUES (:abr, :mat)';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':abr' => $abr,
			':mat' => $mat));
	}

	public function getMotMat()	{
		$db = $this->dbConnect();
		$sql = 'SELECT * FROM matiere';
		$req = $db->query( $sql );
		return $req;
	}

	public function getEditor()	{
		$db = $this->dbConnect();
		$sql = 'SELECT Nuedit, NOMedit FROM editeur';
		$req = $db->query( $sql );
		return $req;
	}
}