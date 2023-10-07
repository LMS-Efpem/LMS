<?php

namespace App\Controllers;

class Parents extends BaseController
{
    public function main()
    {
        echo view('templates/header', ['title' => 'Inicio']);
        echo view('parents/main');
        echo view('templates/footer');
    }
}
