<?php

/**
 * Application d'exemple Agence de voyages Silex
 */

// require_once __DIR__.'/vendor/autoload.php';
$vendor_directory = getenv ( 'COMPOSER_VENDOR_DIR' );
if ($vendor_directory === false) {
	$vendor_directory = __DIR__ . '/vendor';
}
require_once $vendor_directory . '/autoload.php';

// Initialisations
$app = require_once 'initapp.php';

require_once 'agvoymodel.php';

// Routage et actions

//homepage of the website
$app->get ( '/',
    function () use ($app)
    {
    return $app ['twig']-> render ( 'front-office/welcome.html.twig' );
    }
)->bind('homepage');

$app->get ( '/contacts',
    function () use ($app)
    {
    return $app ['twig']-> render ( 'front-office/contacts.html.twig' );
    }
)->bind('contacts');

$app->get ( '/legal',
    function () use ($app)
    {
    return $app ['twig']-> render ( 'front-office/legal.html.twig' );
    }
)->bind('legal');

$app->get ( '/sign-in',
    function () use ($app)
    {
    return $app ['twig']-> render ( 'front-office/sign-in.html.twig' );
    }
)->bind('sign-in');

$app->get ( '/sign-up',
    function () use ($app)
    {
    return $app ['twig']-> render ( 'front-office/sign-up.html.twig' );
    }
)->bind('sign-up');

// circuitlist : Liste tous les circuits
$app->get ( '/circuit',
    function () use ($app)
    {
    	$circuitslist = get_all_circuits ();
    	// print_r($circuitslist);

    	return $app ['twig']->render ( 'front-office/circuitslist.html.twig', [
    			'circuitslist' => $circuitslist
    	] );
    }
)->bind ( 'circuitlist' );

// circuitshow : affiche les détails d'un circuit
$app->get ( '/circuit/{id}',
	function ($id) use ($app)
	{
		$circuit = get_circuit_by_id ( $id );
		// print_r($circuit);
		$programmations = get_programmations_by_circuit_id ( $id );
		//$circuit ['programmations'] = $programmations;

		return $app ['twig']->render ( 'circuitshow.html.twig', [
				'id' => $id,
				'circuit' => $circuit
			] );
	}
)->bind ( 'circuitshow' );

// programmationlist : liste tous les circuits programmés
$app->get ( '/programmation',
	function () use ($app)
	{
		$programmationslist = get_all_programmations ();
		// print_r($programmationslist);

		return $app ['twig']->render ( 'front-office/programmationslist.html.twig', [
				'programmationslist' => $programmationslist
			] );
	}
)->bind ( 'programmationlist' );

$app->run ();
