<?php

require_once 'model/Manager.php';
require_once 'model/SearchManager.php';

function searchBook() {
	require_once 'view/searchBookView.php';
}

function resultBook( $data, $choice ) {
	if ( !( isset( $data['validForm'] ) && isset( $choice['choice'] ) ) ) {
		header('Location: index.php?action=searchBook');
	}
	$manager = new SearchManager();
	if ( $choice['choice'] == 'perio' ) {
		$dataBook = $manager->getPerio( $data );
	} elseif ( $choice['choice'] == 'nonperio' ) {
		$dataBook = $manager->getNonPerio( $data );
	} elseif ( $choice['choice'] == 'ouvrage' ) {
		$dataBook = $manager->getOuvrage( $data );
	}
	require_once 'view/resultBookView.php';
}