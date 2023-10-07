<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rutas de Componentes
$routes->get('/static/(:segment)', 'Component::static/$1');

// Rutas de Autenticación
$routes->get('/',          'Auth::index');
$routes->post('/',         'Auth::login');
$routes->get('/logout',    'Auth::logout');
$routes->get('/recuperar', 'Auth::recover');

// Rutas de Administrador
$routes->get('/a/inicio', 'Admin::main');

$routes->get('/a/noticia/(:segment)',   'Admin::view_news/$1');
$routes->get('/a/noticia/(:segment)/e', 'Admin::edit_news/$1');
$routes->get('/a/noticia/(:segment)/c', 'Admin::create_news/$1');

$routes->get('/a/perfiles/',            'Admin::profiles/');
$routes->get('/a/perfiles/encargados/', 'Admin::parents/');
$routes->get('/a/perfiles/docentes/',   'Admin::teachers/');

$routes->get('/a/perfil/estudiante/(:segment)',      'Admin::view_student/$1');
$routes->get('/a/perfil/estudiante/(:segment)/e',    'Admin::edit_student/$1');
$routes->get('/a/perfil/estudiante/(:segment)/c',    'Admin::create_student/$1');
$routes->get('/a/perfil/encargado/(:segment)',       'Admin::view_parent/$1');
$routes->get('/a/perfil/encargado/(:segment)/e',     'Admin::edit_parent/$1');
$routes->get('/a/perfil/encargado/(:segment)/c',     'Admin::create_parent/$1');
$routes->get('/a/perfil/docente/(:segment)',         'Admin::view_teacher/$1');
$routes->get('/a/perfil/docente/(:segment)/e',       'Admin::edit_teacher/$1');
$routes->get('/a/perfil/docente/(:segment)/c',       'Admin::create_teacher/$1');
$routes->get('/a/perfil/administrador/(:segment)',   'Admin::view_admin/$1');
$routes->get('/a/perfil/administrador/(:segment)/e', 'Admin::edit_admin/$1');
$routes->get('/a/perfil/administrador/(:segment)/c', 'Admin::create_admin/$1');

$routes->get('/a/notas/',                                  'Admin::notes_panel/');
$routes->get('/a/notas/(:segment)/(:segment)/',            'Admin::signatures/$1$2');
$routes->get('/a/notas/(:segment)/(:segment)/(:segment)/', 'Admin::notes/$1$2$3');

$routes->get('/a/carga-academica/',                      'Admin::academic/');
$routes->get('/a/carga-academica/(:segment)/(:segment)', 'Admin::students/$1$2');

// Rutas de Encargado
$routes->get('/p/inicio', 'Parents::main');

// Rutas de Estudiante
$routes->get('/s/inicio', 'Student::main');

// Rutas de Docente
$routes->get('/t/inicio', 'Teacher::main');
