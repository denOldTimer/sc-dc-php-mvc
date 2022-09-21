<?php


$routes = include_once('Config/routes.php');


use App\Core\App;


// autoloading classes
spl_autoload_register(function ($class) {
  // Replacing Backward slashes with forward slashes
  $class = str_replace("\\", "/", $class);

  $class = PATH_ROOT . ucfirst($class) . '.php';
  //echo $class;
  if (is_readable($class)) require $class;
});

$app = new app($routes);