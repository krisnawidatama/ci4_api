<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

    $routes->get('authors', 'AuthorsController::index');
    $routes->get('authors/(:segment)', 'AuthorsController::show/$1');
    $routes->post('authors', 'AuthorsController::create');
    $routes->put('authors/(:segment)', 'AuthorsController::update/$1');
    $routes->delete('authors/(:segment)', 'AuthorsController::delete/$1');
    $routes->get('authors/(:segment)/books', 'AuthorsController::getBooks/$1');

    $routes->get('books', 'BooksController::index');
    $routes->get('books/(:segment)', 'BooksController::show/$1');
    $routes->post('books', 'BooksController::create');
    $routes->put('books/(:segment)', 'BooksController::update/$1');
    $routes->delete('books/(:segment)', 'BooksController::delete/$1');


