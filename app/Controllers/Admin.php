<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    public function main()
    {
        echo view($this->header, ['title' => 'Inicio']);
        echo view('admin/main');
        echo view($this->footer);
    }

    public function view_news($id_new)
    {
        echo view($this->header, ['title' => 'Noticia']);
        echo view('admin/news/main');
        echo view($this->footer);
    }

    public function view_student($id_student)
    {
        echo view($this->header, ['title' => 'Ficha Estudiante']);
        echo view('admin/profile/student');
        echo view($this->footer);
    }
}
