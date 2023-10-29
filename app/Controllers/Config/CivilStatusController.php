<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\CivilStatusModel;

class CivilStatusController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # ESTADOS CIVILES
    ######################################################################
    # Ver estados civiles
    # --------------------------------------------------------------------
    public function view_civil_statuses()
    {
        echo view($this->header, ['title' => 'Configuración | Estados Civiles']);
        echo view('admin/config/civil_status/view_civil_statuses');
        echo view($this->footer);
    }
    # Crear estado civil
    # --------------------------------------------------------------------
    public function create_civil_status(): object
    {
        $model = new CivilStatusModel();

        $data = [
            'description' => $this->request->getVar('civil_status'),
        ];

        $msg = ($model->insert($data))
            ? 'Estado civil creado exitosamente'
            : 'No se pudo crear el estdo civil';

        return redirect()->to(base_url('/a/configuracion/estado-civil'))->with('msg', $msg);
    }
    # Editar estado civil
    # --------------------------------------------------------------------
    public function edit_civil_status_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Estados Civiles']);
        echo view('admin/config/civil_status/edit_civil_status_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_civil_status(): object
    {
        $model = new CivilStatusModel();

        $id = $this->request->getVar('id');
        $data = [
            'description' => $this->request->getVar('civil_status'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Estado civil actualizado exitosamente'
            : 'No se pudo actualizar el estado civil';

        return redirect()->to(base_url('/a/configuracion/estado-civil'))->with('msg', $msg);
    }
    # Eliminar estado civil
    # --------------------------------------------------------------------
    public function delete_civil_status(): object
    {
        $model = new CivilStatusModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Estado civil eliminado exitosamente'
            : 'No se pudo eliminar el estado civil';

        return redirect()->to(base_url('/a/configuracion/estado-civil'))->with('msg', $msg);
    }
}
