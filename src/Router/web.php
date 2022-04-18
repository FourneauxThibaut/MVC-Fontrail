<?php

use Src\Router\Router;

$route = new Router($_SERVER['REQUEST_URI']);
$route->add('/', 'HomeController@index',);
// $route->middleware('HomeController',['create','delete','update'],'admin');

$route->add('/comparator', 'ComparatorController@index',);

$route->add('/fonts', 'FontController@index',);
$route->add('/font/{font_name}', 'FontController@show',);

$route->load();
