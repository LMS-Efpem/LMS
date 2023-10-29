<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas de Componentes
$routes->get('/static/(:segment)', 'Component::static/$1');

###############################################################################################
# RUTAS DE AUTENTICACIÓN
###############################################################################################
$routes->get('/',          'Auth::index');
$routes->post('/',         'Auth::login');
$routes->get('/logout',    'Auth::logout');
$routes->get('/recuperar', 'Auth::recover');

###############################################################################################
# RUTAS DE ADMINISTRADOR
###############################################################################################
$routes->get('/a/inicio', 'Admin::main');
// Rutas de Noticias
$routes->get('/a/noticia/nuevo',                                     'Admin::create_new_form');
$routes->post('/a/noticia/nuevo',                                    'Admin::create_new');
$routes->get('/a/noticia/(:num)',                                    'Admin::view_new/$1');
$routes->get('/a/noticia/editar/(:num)',                             'Admin::edit_new_form/$1');
$routes->post('/a/noticia/editar',                                   'Admin::edit_new');
$routes->post('/a/noticia/eliminar',                                 'Admin::delete_new');
// Rutas de Perfiles
$routes->get('/a/perfiles/',                                         'Admin::profiles/');
$routes->get('/a/perfiles/encargados/',                              'Admin::parents/');
$routes->get('/a/perfiles/docentes/',                                'Admin::teachers/');
// Rutas de Perfil de estudiante
$routes->get('/a/perfil/estudia nte/nuevo',                          'Admin::create_student_form');
$routes->post('/a/perfil/estudiante/nuevo',                          'Admin::create_student');
$routes->get('/a/perfil/estudiante/(:segment)',                      'Admin::view_student/$1');
$routes->get('/a/perfil/estudiante/(:segment)/editar',               'Admin::edit_student_form/$1');
$routes->post('/a/perfil/estudiante/editar',                         'Admin::edit_student');
$routes->post('/a/perfil/estudiante/eliminar',                       'Admin::delete_student');
// Rutas de Perfil de encargado
$routes->get('/a/perfil/encargado/nuevo',                            'Admin::create_parent_form');
$routes->post('/a/perfil/encargado/nuevo',                           'Admin::create_parent');
$routes->get('/a/perfil/encargado/(:segment)',                       'Admin::view_parent/$1');
$routes->get('/a/perfil/encargado/(:segment)/editar',                'Admin::edit_parent_form/$1');
$routes->post('/a/perfil/encargado/editar',                          'Admin::edit_parent');
$routes->post('/a/perfil/encargado/eliminar',                        'Admin::delete_parent');
// Rutas de Perfil de docente
$routes->get('/a/perfil/docente/nuevo',                              'Admin::create_teacher_form');
$routes->post('/a/perfil/docente/nuevo',                             'Admin::create_teacher');
$routes->get('/a/perfil/docente/(:segment)',                         'Admin::view_teacher/$1');
$routes->get('/a/perfil/docente/(:segment)/editar',                  'Admin::edit_teacher_form/$1');
$routes->post('/a/perfil/docente/editar',                            'Admin::edit_teacher');
$routes->post('/a/perfil/docente/eliminar',                          'Admin::delete_teacher');
// Rutas de Perfil de administrador
$routes->get('/a/perfil/administrador/nuevo',                        'Admin::create_admin_form');
$routes->post('/a/perfil/administrador/nuevo',                       'Admin::create_admin');
$routes->get('/a/perfil/administrador/(:segment)',                   'Admin::view_admin/$1');
$routes->get('/a/perfil/administrador/(:segment)/editar',            'Admin::edit_admin_form/$1');
$routes->post('/a/perfil/administrador/editar',                      'Admin::edit_admin');
$routes->post('/a/perfil/administrador/eliminar',                    'Admin::delete_admin');
// Rutas para notas
$routes->get('/a/notas/',                                            'Admin::notes_panel/');
$routes->get('/a/notas/(:segment)/(:segment)/(:segment)',            'Admin::signatures/$1/$2/$3');
$routes->get('/a/notas/(:segment)/(:segment)/(:segment)/(:segment)', 'Admin::notes/$1/$2/$3/$4');
// Rutas para carga académica
$routes->get('/a/carga-academica/',                                  'Admin::academic/');
$routes->get('/a/carga-academica/(:segment)/(:segment)',             'Admin::students/$1/$2/$3');

###############################################################################################
# RUTAS DE ENCARGADO
###############################################################################################
$routes->get('/p/inicio', 'Parents::main');

###############################################################################################
# RUTAS DE ESTUDIANTE
###############################################################################################
$routes->get('/s/inicio', 'Student::main');

###############################################################################################
# RUTAS DE DOCENTE
###############################################################################################
$routes->get('/t/inicio', 'Teacher::main');

###############################################################################################
# RUTAS DE CONFIGURACIÓN
###############################################################################################
$routes->get('/a/configuracion',                                  'Config::index');
$routes->get('/a/configuracion/creditos',                         'Config::view_credits');
// Rutas de Nacionalidad
$routes->get('/a/configuracion/nacionalidad',                     'Config\NationalityController::view_nationalities');
$routes->post('/a/configuracion/nacionalidad/nuevo',              'Config\NationalityController::create_nationality');
$routes->get('/a/configuracion/nacionalidad/editar/(:num)',       'Config\NationalityController::edit_nationality_form/$1');
$routes->post('/a/configuracion/nacionalidad/editar',             'Config\NationalityController::edit_nationality');
$routes->post('/a/configuracion/nacionalidad/eliminar',           'Config\NationalityController::delete_nationality');
// Rutas de Estado Civil
$routes->get('/a/configuracion/estado-civil',                     'Config\CivilStatusController::view_civil_statuses');
$routes->post('/a/configuracion/estado-civil/nuevo',              'Config\CivilStatusController::create_civil_status');
$routes->get('/a/configuracion/estado-civil/editar/(:num)',       'Config\CivilStatusController::edit_civil_status_form/$1');
$routes->post('/a/configuracion/estado-civil/editar',             'Config\CivilStatusController::edit_civil_status');
$routes->post('/a/configuracion/estado-civil/eliminar',           'Config\CivilStatusController::delete_civil_status');
// Rutas de Género
$routes->get('/a/configuracion/genero',                           'Config\GenderController::view_genders');
$routes->post('/a/configuracion/genero/nuevo',                    'Config\GenderController::create_gender');
$routes->get('/a/configuracion/genero/editar/(:num)',             'Config\GenderController::edit_gender_form/$1');
$routes->post('/a/configuracion/genero/editar',                   'Config\GenderController::edit_gender');
$routes->post('/a/configuracion/genero/eliminar',                 'Config\GenderController::delete_gender');
// Rutas de Parentesco
$routes->get('/a/configuracion/parentesco',                       'Config\KinshipController::view_kinships');
$routes->post('/a/configuracion/parentesco/nuevo',                'Config\KinshipController::create_kinship');
$routes->get('/a/configuracion/parentesco/editar/(:num)',         'Config\KinshipController::edit_kinship_form/$1');
$routes->post('/a/configuracion/parentesco/editar',               'Config\KinshipController::edit_kinship');
$routes->post('/a/configuracion/parentesco/eliminar',             'Config\KinshipController::delete_kinship');
// Rutas de Asignaturas
$routes->get('/a/configuracion/asignatura',                       'Config\SubjectController::view_subjects');
$routes->post('/a/configuracion/asignatura/nuevo',                'Config\SubjectController::create_subject');
$routes->get('/a/configuracion/asignatura/editar/(:num)',         'Config\SubjectController::edit_subject_form/$1');
$routes->post('/a/configuracion/asignatura/editar',               'Config\SubjectController::edit_subject');
$routes->post('/a/configuracion/asignatura/eliminar',             'Config\SubjectController::delete_subject');
// Rutas de Niveles Académicos
$routes->get('/a/configuracion/niveles-academicos',               'Config\LevelsController::view_academic_levels');
$routes->post('/a/configuracion/niveles-academicos/nuevo',        'Config\LevelsController::create_academic_level');
$routes->get('/a/configuracion/niveles-academicos/editar/(:num)', 'Config\LevelsController::edit_academic_level_form/$1');
$routes->post('/a/configuracion/niveles-academicos/editar',       'Config\LevelsController::edit_academic_level');
$routes->post('/a/configuracion/niveles-academicos/eliminar',     'Config\LevelsController::delete_academic_level');
// Rutas de Grados
$routes->get('/a/configuracion/grados',                           'Config\GradeController::view_grades');
$routes->post('/a/configuracion/grados/nuevo',                    'Config\GradeController::create_grade');
$routes->get('/a/configuracion/grados/editar/(:num)',             'Config\GradeController::edit_grade_form/$1');
$routes->post('/a/configuracion/grados/editar',                   'Config\GradeController::edit_grade');
$routes->post('/a/configuracion/grados/eliminar',                 'Config\GradeController::delete_grade');
// Rutas de Unidades académicas
$routes->get('/a/configuracion/unidades',                         'Config\UnitController::view_units');        # Read V
$routes->post('/a/configuracion/unidades/nuevo',                  'Config\UnitController::create_unit');       # Crear
$routes->get('/a/configuracion/unidades/editar/(:num)',           'Config\UnitController::edit_unit_form/$1'); # Edit V
$routes->post('/a/configuracion/unidades/editar',                 'Config\UnitController::edit_unit');         # Edit
$routes->post('/a/configuracion/unidades/eliminar',               'Config\UnitController::delete_unit');       # Delete
// Rutas de Actividades
$routes->get('/a/configuracion/actividades',                      'Config\ActivityController::view_activities');
$routes->post('/a/configuracion/actividades/nuevo',               'Config\ActivityController::create_activity');
$routes->get('/a/configuracion/actividades/editar/(:num)',        'Config\ActivityController::edit_activity_form/$1');
$routes->post('/a/configuracion/actividades/editar',              'Config\ActivityController::edit_activity');
$routes->post('/a/configuracion/actividades/eliminar',            'Config\ActivityController::delete_activity');
// Rutas de Tipos de Actividades
$routes->get('/a/configuracion/tipos-actividades',                'Config\TypeController::view_activity_types');
$routes->post('/a/configuracion/tipos-actividades/nuevo',         'Config\TypeController::create_activity_type');
$routes->get('/a/configuracion/tipos-actividades/editar/(:num)',  'Config\TypeController::edit_activity_type_form/$1');
$routes->post('/a/configuracion/tipos-actividades/editar',        'Config\TypeController::edit_activity_type');
$routes->post('/a/configuracion/tipos-actividades/eliminar',      'Config\TypeController::delete_activity_type');
