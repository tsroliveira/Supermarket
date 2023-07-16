<?php

// Autoloader para carregar as classes
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

// Criação da instância da classe Database para conexão com o banco de dados
$database = new Database();

// Criação da instância da classe Router para gerenciamento das rotas
$router = new Router();

// Definição das rotas
$router->add('/', 'HomeController@index');

#Users
$router->add('/users',      'UserController@list');
$router->add('/users/{id}', 'UserController@read');
$router->add('/users/add',  'UserController@create');
$router->add('/users/upd',  'UserController@update');
$router->add('/users/del',  'UserController@delete');

#Taxes
$router->add('/taxes',      'TaxeController@list');
$router->add('/taxes/{id}', 'TaxeController@read');
$router->add('/taxes/add',  'TaxeController@create');
$router->add('/taxes/upd',  'TaxeController@update');
$router->add('/taxes/del',  'TaxeController@delete');

#ProductType
$router->add('/productType',      'ProductTypeController@list');
$router->add('/productType/{id}', 'ProductTypeController@read');
$router->add('/productType/add',  'ProductTypeController@create');
$router->add('/productType/upd',  'ProductTypeController@update');
$router->add('/productType/del',  'ProductTypeController@delete');

#Product
$router->add('/products',      'ProductController@list');
$router->add('/products/{id}', 'ProductController@read');
$router->add('/products/add',  'ProductController@create');
$router->add('/products/upd',  'ProductController@update');
$router->add('/products/del',  'ProductController@delete');

// Execução da rota correspondente à requisição atual
$router->dispatch();
