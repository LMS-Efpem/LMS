<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\KinshipModel;

class KinshipController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # Parentesco
    ######################################################################
    # Ver Parentesco
    # --------------------------------------------------------------------
    public function view_kinships()
    {
        echo view($this->header, ['title' => 'Configuración | Parentesco']);
        echo view('admin/config/kinship/view_kinships');
        echo view($this->footer);
    }
    # Crear parentesco
    # --------------------------------------------------------------------
    public function create_kinship(): object
    {
        $model = new KinshipModel();

        $data = [
            'description' => $this->request->getVar('kinship_name'),
        ];

        $msg = ($model->insert($data))
            ? 'Parentesco creado exitosamente'
            : 'No se pudo crear parentesco';

        return redirect()->to(base_url('/a/configuracion/parentesco'))->with('msg', $msg);
    }
    # Editar parentesco
    # --------------------------------------------------------------------
    public function edit_kinship_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Parentesco']);
        echo view('admin/config/Kinship/edit_kinship_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_kinship(): object
    {
        $model = new KinshipModel();

        $id = $this->request->getVar('id');
        $data = [
            'description' => $this->request->getVar('kinship_name'),
        ];

        $msg = ($model->update($id, $data))
        ? 'Parentesco creado exitosamente'
        : 'No se pudo crear parentesco';

        return redirect()->to(base_url('/a/configuracion/parentesco'))->with('msg', $msg);
    }
    # Eliminar Parentesco
    # --------------------------------------------------------------------
    public function delete_kinship(): object
    {
        $model = new KinshipModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
        ? 'Parentesco creado exitosamente'
        : 'No se pudo crear parentesco';

        return redirect()->to(base_url('/a/configuracion/parentesco'))->with('msg', $msg);
    }
}
