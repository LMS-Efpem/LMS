<?php

namespace App\Controllers;

class Config extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    public function index()
    {
        echo view($this->header, ['title' => 'Configuración']);
        echo view('admin/config/index');
        echo view($this->footer);
    }

    public function view_credits()
    {
        echo view($this->header, ['title' => 'Créditos']);
        echo view('admin/config/view_credits');
        echo view($this->footer);
    }
}
