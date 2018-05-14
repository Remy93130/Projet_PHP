<?php

require_once 'model/Manager.php';
require_once 'model/AdminManager.php';

function loginAdmin() {
	if ( isset($_SESSION['admin'] ) ) {
		$manager = new AdminManager();
		$dataLate = $manager->getLate();
		$dataMotMat = $manager->getMotMat();
		$dataEditor = $manager->getEditor();
		$dataUser = $manager->getAvailableUser();
		$dataBook = $manager->getAvailableBook();
		$dataUserBook = $manager->getUserWithBook();
		require_once 'view/adminPanelView.php';
	} else {
		require_once 'view/logAdminView.php';
	}
}

function login($login, $pwd) {
	$manager = new AdminManager();
	if ( isset( $login ) && isset( $pwd ) ) {
		$connect = $manager->connect( $login, $pwd );
		if ( $connect ) {
			header('Location: index.php?action=loginAdmin');
		} else {
			require_once 'view/logAdminView.php';
		}
	} else {
		require_once 'view/indexView.php';
	}
}

function addEditeur( $data ) {
	$manager = new AdminManager();
	if ( isset( $data['name'] ) && isset( $data['phone'] ) 
	&& isset( $data['rue'] ) && isset( $data['cp'] ) 
	&& isset( $data['city'] ) ) {
		$manager->addEditeur( $data['name'], $data['phone'], $data['rue'], $data['cp'], $data['city'] );
	}
	header('Location: index.php?action=loginAdmin');
}

function addMotMat( $data ) {
	$manager = new AdminManager();
	if ( isset( $data['abr'] ) && isset( $data['mat'] ) ) {
		$manager->addMotMat( $data['abr'], $data['mat'] );
	}
	header('Location: index.php?action=loginAdmin');
}

function insertBook( $data ) {
	if (!isset( $data['title'] )) {
		header('Location: index.php?action=loginAdmin');
	} else {
		require_once 'view/insertBookView.php';
	}
}

function addBook( $data ) {
	if (!isset( $data['title'] ) && !isset( $data['type'] ) ) {
		header('Location: index.php?action=loginAdmin');
	} else {
		$manager = new AdminManager();
		$manager->addBook( $data );
		header('Location: index.php?action=loginAdmin');
	}
}

function addStudent( $data ) {
	if ( isset( $data['cursus'] ) && isset( $data['login'] ) ) {
		$manager = new AdminManager();
		$manager->addStudent( $data );
	}
	header('Location: index.php?action=loginAdmin');
}

 function addTeacher( $data ) {
 	if ( isset( $data['tel'] ) && isset( $data['login'] ) ) {
 		$manager = new AdminManager();
 		$manager->addTeacher( $data );
 	}
 	header('Location: index.php?action=loginAdmin');
 }

 function lentBook( $data ) {
 	if ( isset( $data['user'] ) && isset( $data['book'] ) ) {
 		$manager = new AdminManager();
 		$manager->lentBook( $data );
 	}
 	header('Location: index.php?action=loginAdmin');
 }

 function bringBook( $data ) {
 	if ( isset( $data['user'] ) ) {
 		$manager = new AdminManager();
 		$manager->bringBook( $data );
 	}
 	header('Location: index.php?action=loginAdmin');
 }