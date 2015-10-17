<?php

// define routes

$routes = array(
    array(
        "pattern" => "home",
        "controller" => "home",
        "action" => "index"
    ),
    array(
        "pattern" => "contact",
        "controller" => "home",
        "action" => "contact"
    ),
    array(
        "pattern" => "about",
        "controller" => "home",
        "action" => "about"
    ),
    array(
        "pattern" => "gallery",
        "controller" => "home",
        "action" => "gallery"
    ),
	array(
        "pattern" => "login",
        "controller" => "admin",
        "action" => "login"
    ),
    array(
        "pattern" => "usersignup",
        "controller" => "home",
        "action" => "usersignup"
    ),
    array(
        "pattern" => "services",
        "controller" => "home",
        "action" => "services"
    ),
    array(
        "pattern" => "blog",
        "controller" => "home",
        "action" => "blog"
    ),
    array(
        "pattern" => "search",
        "controller" => "home",
        "action" => "search"
    ),
    array(
        "pattern" => "package",
        "controller" => "home",
        "action" => "package"
    )
);

// add defined routes
foreach ($routes as $route) {
    $router->addRoute(new Framework\Router\Route\Simple($route));
}

// unset globals
unset($routes);
