<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function main()
    {
        echo view('templates/header', ['title' => 'Inicio']);
        echo view('admin/main');
        echo view('templates/footer');
    }
}
