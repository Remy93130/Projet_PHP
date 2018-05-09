<?php

require_once 'Manager.php';

class ConnexionManager extends Manager {

	public function tryConnect( $user, $pwd, $type ) {
		$db = $this->dbConnect();
		$sql = 'SELECT * FROM adherent A, '. $type .' T
				WHERE A.numero = T.numero AND A.login = :user AND A.pwd = :pwd';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':user' 	=> $user,
			':pwd'		=> sha1( $pwd )));
		$data = $req->fetch();
		if ( !$data ) {
			return false;
		} else {
			return $data;
		}
	}

	public function createSession( $data, $type ) {
		$_SESSION['id'] = $data['0'];
		$_SESSION['typeUser'] = $type;
		$_SESSION['derPret'] = $data['2'];
		$_SESSION['interdit'] = $data['3'];
		$_SESSION['nbEmprunt'] = $data['4'];
		if ( $type == 'etudiant' ) {
			$_SESSION['ville'] = $data['7'];
			$_SESSION['rue'] = $data['12'];
			$_SESSION['nom'] = $data['8'];
			$_SESSION['prenom'] = $data['11'];
			$_SESSION['etud'] = $data['9'];
		} else {
			$_SESSION['ville'] = $data['7'];
			$_SESSION['rue'] = $data['11'];
			$_SESSION['nom'] = $data['8'];
			$_SESSION['prenom'] = $data['10'];
			$_SESSION['tel'] = '0'.$data['12'];
		}

		$sql = 'SELECT Titre FROM production WHERE numero_Adherent ='. $_SESSION["id"];
		$db = $this->dbConnect();
		$req = $db->query( $sql );
		$book = $req->fetch();
		if ( !empty( $book ) ) {
			$_SESSION['book'] = $book['0'];
		}
	}

	public function updateLog( $login, $pwd, $id ) {
		$db = $this->dbConnect();
		if ( empty( $login ) || empty( $pwd ) ) {
			return false;
		}
		$sql = 'UPDATE adherent
				SET login 	= :login,
					pwd 	= :pwd
				WHERE numero = :id';
		$req = $db->prepare($sql);
		$result = $req->execute(array(
			':login'	=> htmlspecialchars( $login ),
			':pwd'		=> sha1( $pwd ),
			':id'	 	=> $id ));
		return $result;
	}

	public function disconnect() {
		session_destroy();
	}
}