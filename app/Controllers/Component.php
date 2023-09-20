<?php

namespace App\Controllers;

class Component extends BaseController
{
    public function static($component)
    {
        echo view('templates/header', ['title' => $component]);
        echo view('components/' . $component, ['group_grade' => 'Básicos']);
        echo view('templates/footer');
    }
}
