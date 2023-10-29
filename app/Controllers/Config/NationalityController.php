<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\NationalityModel;

class NationalityController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # NACIONALIDADES
    ######################################################################
    # Ver nacionalidad
    # --------------------------------------------------------------------
    public function view_nationalities()
    {
        echo view($this->header, ['title' => 'Configuración | Nacionalidades']);
        echo view('admin/config/nationality/view_nationalities');
        echo view($this->footer);
    }
    # Crear nacionalidad
    # --------------------------------------------------------------------
    public function create_nationality(): object
    {
        $model = new NationalityModel();

        $data = [
            'alpha2' => $this->request->getVar('nationality_cod1'),
            'alpha3' => $this->request->getVar('nationality_cod2'),
            'name' => $this->request->getVar('nationality_name'),
        ];

        $msg = ($model->insert($data))
            ? 'Nacionalidad creada exitosamente'
            : 'No se pudo crear la nacionalidad';

        return redirect()->to(base_url('/a/configuracion/nacionalidad'))->with('msg', $msg);
    }
    # Editar nacionalidad
    # --------------------------------------------------------------------
    public function edit_nationality_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Nacionalidades']);
        echo view('admin/config/nationality/edit_nationality_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_nationality(): object
    {
        $model = new NationalityModel();

        $id = $this->request->getVar('id');
        $data = [
            'alpha2' => $this->request->getVar('nationality_cod1'),
            'alpha3' => $this->request->getVar('nationality_cod2'),
            'name' => $this->request->getVar('nationality_name'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Nacionalidad actualizada exitosamente'
            : 'No se pudo actualizar la nacionalidad';

        return redirect()->to(base_url('/a/configuracion/nacionalidad'))->with('msg', $msg);
    }
    # Eliminar nacionalidad
    # --------------------------------------------------------------------
    public function delete_nationality(): object
    {
        $model = new NationalityModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Nacionalidad eliminada exitosamente'
            : 'No se pudo eliminar la nacionalidad';

        return redirect()->to(base_url('/a/configuracion/nacionalidad'))->with('msg', $msg);
    }
}
