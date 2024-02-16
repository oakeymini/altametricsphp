<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

// API Routes
$routes->group("auth", ["namespace" => "App\Controllers"], function ($routes) {

	$routes->get("invalid-access", "AuthController::accessDenied");

	// Post
	$routes->post("signup", "AuthController::register");

	// Post
	$routes->post("login", "AuthController::login");

	// Get
	$routes->get("profile", "AuthController::profile", ["filter" => "apiauth"]);

	// Get
	$routes->get("logout", "AuthController::logout", ["filter" => "apiauth"]);
});

$routes->group("invoice", ["namespace" => "App\Controllers"], function ($routes) {

	// Get
	$routes->get("/", "InvoiceController::getAllInvoice", ["filter" => "apiauth"]);

	// Get
	$routes->get('(:num)', 'InvoiceController::getInvoiceByID/$1', ["filter" => "apiauth"]);
});
