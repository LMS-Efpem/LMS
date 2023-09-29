<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rutas de Componentes
$routes->get('/static/(:segment)', 'Component::static/$1');

// Rutas de Autenticación
$routes->get('/',       'Auth::index');
$routes->post('/',      'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Rutas de Administrador
$routes->get('/a/inicio', 'Admin::main');

// Rutas de Encargado
$routes->get('/p/inicio', 'Parents::main');

// Rutas de Estudiante
$routes->get('/s/inicio', 'Student::main');

// Rutas de Docente
$routes->get('/t/inicio', 'Teacher::main');
