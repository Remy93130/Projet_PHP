<?php

require_once 'model/Manager.php';
require_once 'model/ConnexionManager.php';

function connect( $user, $pwd, $type ) {
	$manager = new ConnexionManager();
	if ( isset( $user ) && isset( $pwd ) ) {
		$connect = $manager->tryConnect( $user, $pwd, $type );
	}
	if ( $connect ) {
		$manager->createSession( $connect, $type );
		require 'view/profileView.php';
	} else {
		$_GET['error'] = 'wronglogin';
		require 'view/indexView.php';
	}
}

function profile() {
	$manager = new Manager();
	if ( $manager->validUser( $_SESSION ) ) {
		require 'view/profileView.php';
	} else {
		$_GET['error'] = 'nolog';
		require 'view/indexView.php';
	}
}

function disconnect() {
	$manager = new ConnexionManager();
	$manager->disconnect();
	header('Location: index.php');
}

function update($idUser)
{
	$manager = new ConnexionManager();
	if ( $manager->validUser( $_SESSION ) && empty($_POST)) {
		require 'view/updatelogView.php';
	} elseif ( $manager->validUser( $_SESSION ) && isset( $_POST['login'] ) && isset( $_POST['pwd']) ) {
		$result = $manager->updateLog( $_POST['login'],  $_POST['pwd'], $idUser );
		if ( $result ) {
			disconnect();
		} else {
			$_GET['error'] = 'notupdated';
			require 'view/indexView.php';
		}
	}
}