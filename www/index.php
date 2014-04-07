<?php
 chdir('../application');
 include 'model/database.php';
 foreach (glob('controller/*.php') as $controller)
 include $controller;
 $query = $_SERVER['QUERY_STRING'];
 $routes = array
 (
 '/^$/' => function($m) { control_new(); },
 '/^edit\/(\d+)$/' => function($m) { control_edit($m[1]); },
 '/^(\d+)$/' => function($m) { control_test($m[1]); },
 '/.*/' => function($m) { control_error('Hittade inte sidan.'); }
 );
 foreach ($routes as $regex => $function)
 {
 if (preg_match($regex, $query, $matches))
 {
 $function($matches);
 break;
 }
 }
?>