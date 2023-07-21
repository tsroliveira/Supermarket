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

#Taxes
$router->add('/taxeList',  'WebTaxeController@list');
$router->add('/taxesread', 'WebTaxeController@read');
$router->add('/taxesadd',  'WebTaxeController@create');
$router->add('/taxesupd',  'WebTaxeController@update');
$router->add('/taxesdel',  'WebTaxeController@delete');

#ProductType
$router->add('/typelist',   'WebCategorieController@list');
$router->add('/typeread',   'WebCategorieController@read');
$router->add('/typeadd',    'WebCategorieController@create');
$router->add('/typeupd',    'WebCategorieController@update');
$router->add('/typedel',    'WebCategorieController@delete');

#Product
$router->add('/productlist',   'WebProductController@list');
$router->add('/productread',   'WebProductController@read');
$router->add('/productadd',    'WebProductController@create');
$router->add('/productupd',    'WebProductController@update');
$router->add('/productdel',    'WebProductController@delete');



#WebApplication Routes
$router->add('/home',     'WebAppController@home');
$router->add('/login',    'WebAppController@login');
$router->add('/logout',   'WebAppController@logout');

$router->add('/userlist',       'WebUserController@list');
$router->add('/userview',       'WebUserController@read');
$router->add('/useradd',        'WebUserController@create');
$router->add('/userupd',        'WebUserController@update');
$router->add('/userdel',        'WebUserController@delete');

$router->add('/cartlist',       'WebCartController@list');
$router->add('/cartchk',        'WebCartController@checkoutCart');
$router->add('/cartcls',        'WebCartController@clearCart');
$router->add('/cartadd',        'WebCartController@create');
$router->add('/reports',        'WebCartController@getReport');


// Execução da rota correspondente à requisição atual
$router->dispatch();
