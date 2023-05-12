<?php
require_once '../autoloader.php';

Router::get(   '/',       ['ShoppingControllers', 'index' ]);
Router::post(  '/insert', ['ShoppingControllers', 'insert']);
Router::put(   '/update', ['ShoppingControllers', 'update']);
Router::delete('/delete', ['ShoppingControllers', 'delete']);

echo Router::run(['ErrorController', 'error']);