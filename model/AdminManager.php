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

	public function getAvailableUser() {
		$db = $this->dbConnect();
		$sql  = 'SELECT numero, login FROM adherent 
				 WHERE interdit IS NULL AND nombreEmprunt IS NULL ORDER BY login ASC';
		$req = $db->query( $sql );
		return $req;
	}

	public function getUserWithBook() {
		$db = $this->dbConnect();
		$sql  = 'SELECT numero, login FROM adherent 
				 WHERE nombreEmprunt IS NOT NULL ORDER BY login ASC';
		$req = $db->query( $sql );
		return $req;	
	}

	public function getAvailableBook() {
		$db = $this->dbConnect();
		$sql = 'SELECT idProduit, Titre FROM production
				WHERE dispo = 1 ORDER BY Titre ASC';
		$req = $db->query( $sql );
		return $req;
	}

	public function addBook( $data ) {
		$db = $this->dbConnect();
		$sql = 'INSERT INTO production (dispo, rangement, Titre, Theme, abrege, Nuedit)
				VALUES (1, :pos, :title, :theme, :abr, :editor)';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':pos'    => $data['pos'],
			':title'  => $data['title'],
			':theme'  => $data['theme'],
			':abr'    => $data['abr'],
			':editor' => $data['editor']));

		if ( $data['type'] == 'nonperio' ) {
			$sql = 'INSERT INTO non_periodique
					VALUES (:nvol, :nbvol, :year, :isbn, 
						(SELECT idProduit FROM production ORDER BY idProduit DESC LIMIT 1 ))';
			$req = $db->prepare( $sql );
			$req->execute(array(
				':nvol'  => $data['nvol'],
				':nbvol' => $data['nbvol'],
				':year'  => $data['year'],
				':isbn'  => $data['isbn']));
		} elseif ( $data['type'] == 'perio' ) {
			if ( empty( $data['pend'] ) ) {
				$sql = 'INSERT INTO periodique
						VALUES (:start, NULL, :timep, 
							(SELECT idProduit FROM production ORDER BY idProduit DESC LIMIT 1 ))';
				$req = $db->prepare( $sql );
				$req->execute(array(
					':start' => $data['start'],
					':timep' => $data['timep']));
			} else {
				$sql = 'INSERT INTO periodique
						VALUES (:start, :pend, :timep, 
							(SELECT idProduit FROM production ORDER BY idProduit DESC LIMIT 1 ))';
				$req = $db->prepare( $sql );
				$req->execute(array(
					':start' => $data['start'],
					':pend'  => $data['pend'],
					':timep' => $data['timep']));
			}
		} elseif ( $data['type'] == 'ouvrage') {
			$sql = 'INSERT INTO ouvrage
					VALUES (:aut, 
						(SELECT idProduit FROM production ORDER BY idProduit DESC LIMIT 1 ))';
			$req = $db->prepare( $sql );
			$req->execute(array(
				':aut' => $data['aut']));
		}
	}

	public function addStudent( $data )	{
		$db = $this->dbConnect();
		$this->addUser( $data );
		$sql = 'INSERT INTO etudiant VALUES (:city, :name, :cursus, :cp, :surname, :rue, 
					(SELECT numero FROM adherent ORDER BY numero DESC LIMIT 1))';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':city'    => $data['city'],
			':name'    => $data['name'],
			':cursus'  => $data['cursus'],
			':cp'      => $data['cp'],
			':surname' => $data['prenom'],
			':rue'     => $data['rue']));
	}

	public function addTeacher( $data )	{
		$db = $this->dbConnect();
		$this->addUser( $data );
		$sql = 'INSERT INTO enseignant VALUES (:city, :name, :cp, :surname, :rue, :phone,
					(SELECT numero FROM adherent ORDER BY numero DESC LIMIT 1))';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':city'    => $data['city'],
			':name'    => $data['name'],
			':cp'      => $data['cp'],
			':surname' => $data['prenom'],
			':rue'     => $data['rue'],
			':phone'   => $data['tel']));
	}

	private function addUser( $data ) {
		$pwd = sha1( $data['pwd'] );
		$db = $this->dbConnect();
		$sql = 'INSERT INTO adherent (annInscrip, login, pwd)
				VALUES (YEAR(CURRENT_DATE), :login, :pwd)';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':login' => $data['login'],
			':pwd'   => $pwd ));
	}

	public function lentBook( $data ) {
		$db = $this->dbConnect();
		$sql = 'UPDATE production
				SET dispo = 0, numero = :numero
				WHERE idProduit = :book';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':numero' => $data['user'],
			':book'   => $data['book']));
		$sql = 'UPDATE adherent 
				SET nombreEmprunt = 1, datPret = CURRENT_DATE()
				WHERE numero = :numero';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':numero' => $data['user']));
	}

	public function bringBook( $data ) {
		$db = $this->dbConnect();
		$sql = 'UPDATE adherent
				SET nombreEmprunt = NULL
				WHERE numero = :user';
		$req = $db->prepare( $sql );
		$req->execute(array(
			':user' => $data['user']));
		$sql = 'UPDATE production 
				SET dispo = 1, numero = NULL 
				WHERE idProduit = 
					(SELECT idProduit FROM 
						(SELECT * FROM production) AS baguette 
					WHERE numero = :user)';
		echo "$sql";
		$req = $db->prepare( $sql );
		$req->execute(array(
			':user' => $data['user']));
	}
}