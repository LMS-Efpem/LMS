<?php

namespace App\Controllers;

class Teacher extends BaseController
{
    public function main()
    {
        echo view('templates/header', ['title' => 'Inicio']);
        echo view('teacher/main');
        echo view('templates/footer');
    }
}
