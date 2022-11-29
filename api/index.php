<?php

use Core\Controller\Items;
use Core\Database\DB;
use Core\Router;

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    $dir = str_replace('\\', '/', __DIR__);
    $file_path = $dir . '/' . $class_name . '.php';
    require_once $file_path;
});

// Routing Tool(Instance)
// $router = new Router();
// $router->add('GET' , '/items');

// Routing Tool (Static)

//Todo list Items tool
//Routes to perform crud operation
//get all items
Router::get('/', 'front');
Router::get('/items', 'items.index');
// create item
Router::post('/items/create', 'items.create');
// update item
Router::put('/items/update', 'items.update');
//delete item
Router::delete('/items/delete', 'items.delete');
// redirect to function
Router::redirect();
