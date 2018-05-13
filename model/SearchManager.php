<?php

require_once 'model/Manager.php';

class SearchManager extends Manager {

	public function getPerio( $data ) {
		$db = $this->dbConnect();
		$sql  = 'SELECT PR.Titre, PR.Theme, PR.dispo, PR.rangement, E.Nomedit, PE.Periodebut, PE.Periodfin, PE.Periodicite ';
		$sql .= 'FROM production PR, editeur E, periodique PE ';
		$sql .= 'WHERE PR.idProduit = PE.idProduit AND PR.Nuedit = E.Nuedit ';
		if ( !empty( $data['title'] ) ) {
			$sql .= ' AND PR.Titre LIKE "%' . htmlspecialchars( $data['title'] ) . '%" ';
		}
		if ( !empty( $data['theme'] ) ) {
			$sql .= ' AND PR.Theme LIKE "%' . htmlspecialchars( $data['theme'] ) . '%" ';
		}
		if ( !empty( $data['editor'] ) ) {
			$sql .= ' AND E.Nomedit LIKE "%' . htmlspecialchars( $data['editor'] ) . '%" ';
		}
		if ( !empty( $data['perio'] ) ) {
			$sql .= ' AND PE.Periodicite LIKE "%' . htmlspecialchars( $data['perio'] ) . '%" ';
		}
		if ( !empty( $data['dispo'] ) ) {
			$sql .= ' AND PR.dispo = ' . htmlspecialchars( $data['dispo'] );
		}
		$req = $db->query( $sql );
		return $req;
	}

	public function getNonPerio( $data ) {
		$db = $this->dbConnect();
		$sql  = 'SELECT PR.Titre, PR.Theme, PR.dispo, PR.rangement, E.Nomedit, N.Nuvol, N.Nombrevol, N.Annedit, N.ISBN ';
		$sql .= 'FROM production PR, editeur E, non_periodique N ';
		$sql .= 'WHERE PR.idProduit = N.idProduit AND E.Nuedit = PR.Nuedit ';
		if ( !empty( $data['title'] ) ) {
			$sql .= ' AND PR.Titre LIKE "%' . htmlspecialchars( $data['title'] ) . '%" ';
		}
		if ( !empty( $data['theme'] ) ) {
			$sql .= ' AND PR.Theme LIKE "%' . htmlspecialchars( $data['theme'] ) . '%" ';
		}
		if ( !empty( $data['editor'] ) ) {
			$sql .= ' AND E.Nomedit LIKE "%' . htmlspecialchars( $data['editor'] ) . '%" ';
		}
		if ( !empty( $data['vol'] ) ) {
			$sql .= ' AND N.Nombrevol = ' . htmlspecialchars( $data['vol'] );
		}
		if ( !empty( $data['edit'] ) ) {
			$sql .= ' AND N.Annedit = ' . htmlspecialchars( $data['edit'] );
		}
		if ( !empty( $data['isbn'] ) ) {
			$sql .= ' AND N.ISBN = ' . htmlspecialchars( $data['isbn'] );
		}
		if ( !empty( $data['dispo'] ) ) {
			$sql .= ' AND PR.dispo = ' . htmlspecialchars( $data['dispo'] );
		}
		$req = $db->query( $sql );
		return $req;
	}

	public function getOuvrage( $data )	{
		$db = $this->dbConnect();
		$sql = 'SELECT P.Titre, P.Theme, P.dispo, P.rangement, E.Nomedit, O.Auteur ';
		$sql .= 'FROM production P, editeur E, ouvrage O ';
		$sql .= 'WHERE P.idProduit = O.idProduit AND P.Nuedit = E.Nuedit ';
		if ( !empty( $data['title'] ) ) {
			$sql .= ' AND PR.Titre LIKE "%' . htmlspecialchars( $data['title'] ) . '%" ';
		}
		if ( !empty( $data['theme'] ) ) {
			$sql .= ' AND PR.Theme LIKE "%' . htmlspecialchars( $data['theme'] ) . '%" ';
		}
		if ( !empty( $data['editor'] ) ) {
			$sql .= ' AND E.Nomedit LIKE "%' . htmlspecialchars( $data['editor'] ) . '%" ';
		}
		if ( !empty( $data['author'] ) ) {
			$sql .= ' AND E.Nomedit LIKE "%' . htmlspecialchars( $data['author'] ) . '%" ';
		}
		if ( !empty( $data['dispo'] ) ) {
			$sql .= ' AND P.dispo = ' . htmlspecialchars( $data['dispo'] );
		}
		$req = $db->query( $sql );	
		return $req;
	}
}