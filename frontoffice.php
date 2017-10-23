<?php

// Routage et actions
require_once "agvoymodel.php";
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
)->bind('contacts'); //bind() offers a naming convention for get method

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
$circuitlist_action = function () use ($app)
{
	$circuitslist = get_all_circuits (FALSE);

	return $app ['twig']->render ( 'front-office/circuitslist.html.twig', [
			'circuitslist' => $circuitslist
	] );
};
$app->get ( '/circuit', $circuitlist_action )
    ->bind ( 'circuitlist' );


// circuitshow : affiche les détails d'un circuit
$app->get ( '/circuit/{id}',
	function ($id) use ($app)
	{
		$circuit = get_circuit_by_id ( $id );
		// print_r($circuit);
		$programmations = get_programmation_by_circuit_id ( $id );
		$circuit ['programmations'] = $programmations;

		return $app ['twig']->render ( 'front-office/circuitshow.html.twig', [
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

?>
