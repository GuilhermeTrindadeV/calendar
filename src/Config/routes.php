<?php

$router = new CoffeeCode\Router\Router(ROOT);

// Controller
$router->namespace("Src\App");

$router->group(null);
$router->get("/", "Web:home");
$router->get("/inicio", "Web:home");

$router->group('eventos');
$router->get("/", "Events:events", "events.events");
$router->get("/list", "Events:list", "events.list");
$router->post("/salvar", "Events:register", "events.register");
$router->get("/edit", "Events:edit", "events.edit");
$router->post("/edit", "Events:update", "events.update");

$router->group('login');
$router->get("/", "Web:login", "web.login");
$router->post("/", "Web:login", "web.login");

$router->group('logout');
$router->get("/", "Web:logout", "web.logout");

/**
 * ERROR
 */
$router->group("ooops");
$router->get("/{errcode}", "Web:error");

/**
 * PROCESS
 */
$router->dispatch();

if($router->error()) {
    $router->redirect("/ooops/{$router->error()}");
}