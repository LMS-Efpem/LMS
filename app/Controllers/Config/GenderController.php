<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\GenderModel;

class GenderController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # Genero
    ######################################################################
    # Ver Genero
    # --------------------------------------------------------------------
    public function view_genders()
    {
        echo view($this->header, ['title' => 'Configuración | Generos']);
        echo view('admin/config/gender/view_genders');
        echo view($this->footer);
    }
    # Crear generos
    # --------------------------------------------------------------------
    public function create_gender(): object
    {
        $model = new GenderModel();

        $data = [
            'description' => $this->request->getVar('gender_name'),
        ];

        $msg = ($model->insert($data))
            ? 'Genero creado exitosamente'
            : 'No se pudo crear genero';

        return redirect()->to(base_url('/a/configuracion/genero'))->with('msg', $msg);
    }
    # Editar genero
    # --------------------------------------------------------------------
    public function edit_gender_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Generos']);
        echo view('admin/config/gender/edit_gender_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_gender(): object
    {
        $model = new GenderModel();

        $id = $this->request->getVar('id');
        $data = [
            'description' => $this->request->getVar('gender_name'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Genero actualizada exitosamente'
            : 'No se pudo actualizar el Genero';

        return redirect()->to(base_url('/a/configuracion/genero'))->with('msg', $msg);
    }
    # Eliminar Genero
    # --------------------------------------------------------------------
    public function delete_gender(): object
    {
        $model = new GenderModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
        ? 'Genero actualizada exitosamente'
        : 'No se pudo actualizar el Genero';

        return redirect()->to(base_url('/a/configuracion/genero'))->with('msg', $msg);
    }
}
