<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function main()
    {
        echo view('templates/header', ['title' => 'Inicio']);
        echo view('student/main');
        echo view('templates/footer');
    }
}
