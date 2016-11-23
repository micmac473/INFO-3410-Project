<?php
require 'vendor/autoload.php';
include 'lib.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;
use \Slim\Container as Container;
use Slim\Views\PhpRenderer as PhpRenderer;
use Slim\Views\Twig as Twig;



$configuration = [
		'settings' => [
				'displayErrorDetails' => true,
		],
		'renderer' => new Twig("./templates")
];
$container = new Container($configuration);
$app = new App($container);

// Uses a PHP templating system to display HTML when requested
$app->get('/', function (Request $request, Response $response) {
	return $this->renderer->render($response, "/profile.php");//this should be index.phtml as opped to base
});

$app->get('/templates/login.phtml', function (Request $request, Response $response) {
	return $this->renderer->render($response, "/base.phtml");//this should be index.phtml as opped to base
});
$app->get('/templates/registration.phtml', function (Request $request, Response $response) {
	return $this->renderer->render($response, "/registration.phtml");//this should be index.phtml as opped to base
});

$app->get("/users", function(Request $request, Response $response){
	$countries = getAllUsers();
	
	$response = $response->withJson($countries);
	return $response;
});

$app->post("/users", function(Request $request, Response $response){
	$post = $request->getParsedBody();
	//var_dump($post);
	$email = $post['email'];
	$password = $post['password'];
	//print_r($post);
	// print "Name: $name, Price:$price, Country: $countryId";
	$res = checkLogin($email, $password);
	//print_r ($res);
	if ($res){
		$response = $response->withStatus(201);
		//$response = $response->withJson(array( "id" => $res));
	} else {
		$response = $response->withStatus(400);
	}
	return $response;
});

$app->post("/register", function(Request $request, Response $response){
	$post = $request->getParsedBody();
	$username = $post['username'];
	$firstname = $post['firstname'];
	$lastname = $post['lastname'];
	$email = $post['email'];
	$contact = $post['contact'];
	$address = $post['address'];
	$password = $post['password'];
	//print_r($post);
	// print "Name: $name, Price:$price, Country: $countryId";
	$res = saveUser($username, $firstname, $lastname, $email, $contact, $address, $password);
	//print_r ($res);
	if ($res){
		$response = $response->withStatus(201);
		//$response = $response->withJson(array( "id" => $res));
	} else {
		$response = $response->withStatus(400);
	}
	return $response;
	//return $this->renderer->render($response, "/login.html");
});


$app->run();
