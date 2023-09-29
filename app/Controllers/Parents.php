<?php

namespace App\Controllers;

class Parents extends BaseController
{
    public function main()
    {
        echo view('templates/header', ['title' => 'Inicio']);
        echo view('parent/main');
        echo view('templates/footer');
    }
}
