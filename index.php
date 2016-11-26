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
	return $this->renderer->render($response, "/index.phtml");//this should be index.phtml as opped to base
});

$app->get('/templates/login.phtml', function (Request $request, Response $response) {
	return $this->renderer->render($response, "/base.phtml");//this should be index.phtml as opped to base
});
$app->get('/templates/registration.phtml', function (Request $request, Response $response) {
	return $this->renderer->render($response, "/registration.phtml");//this should be index.phtml as opped to base
});

$app->get("/users", function(Request $request, Response $response){
	$users = getAllUsers();
	
	$response = $response->withJson($users);
	return $response;
});

$app->get("/items/{id}", function(Request $request, Response $response){
	$userID = $request->getAttribute('id');
	$items = getUserItems($userID);
	
	$response = $response->withJson($items);
	return $response;
});

$app->get("/requests", function(Request $request, Response $response){
	$requests = getRequests();
	
	$response = $response->withJson($requests);
	return $response;
});

$app->get("/homepage", function(Request $request, Response $response){
	$items = getAllItems();
	
	$response = $response->withJson($items);
	return $response;
});

$app->get("/profile", function(Request $request, Response $response){
	$items = getUserItems();
	
	$response = $response->withJson($items);
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
		//$name = $_SESSION["name"];
		$response = $response->withJson($res);
		//$response = $response->withJson(array( "user" => $name));
	} else {
		$response = $response->withJson($res);
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
		//$response = $response->withJson(array( "user" => $res));
	} else {
		$response = $response->withStatus(400);
	}
	return $response;
	//return $this->renderer->render($response, "/login.html");
});

$app->post("/additem", function(Request $request, Response $response){
	$post = $request->getParsedBody();
	//var_dump($post);

	/*$filetmp = $_FILES["image"]["tmp_name"];
	$filename = $_FILES["image"]["name"];
	$filetype = $_FILES["image"]["type"];
	$filepath = "img/".$filename;
	
	move_uploaded_file($filetmp,$filepath);
	print_r($filetmp); */


	$imagePath = "../img/".$post['image'];
	$itemDescription = $post['itemdescription'];
	//print_r($post);
	// print "Name: $name, Price:$price, Country: $countryId";
	$res = saveItem($imagePath, $itemDescription);
	//print_r ($res);
	if ($res > 0){
		$response = $response->withStatus(201);
		$response = $response->withJson(array( "id" => $res));
	} else {
		$response = $response->withStatus(400);
	}
	return $response;
});

$app->run();
