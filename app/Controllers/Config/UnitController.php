<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\UnitModel;

class UnitController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # UNIDADES
    ######################################################################
    # Ver unidades
    # --------------------------------------------------------------------
    public function view_units()
    {
        echo view($this->header, ['title' => 'Configuración | Unidades']);
        echo view('admin/config/unit/view_units');
        echo view($this->footer);
    }
    # Crear unidad
    # --------------------------------------------------------------------
    public function create_unit(): object
    {
        $model = new UnitModel();

        $data = [
            'description' => $this->request->getVar('unit_name'),
        ];

        $msg = ($model->insert($data))
            ? 'Unidad creada exitosamente'
            : 'No se pudo crear la unidad';

        return redirect()->to(base_url('/a/configuracion/unidades'))->with('msg', $msg);
    }
    # Editar unidad
    # --------------------------------------------------------------------
    public function edit_unit_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Unidades']);
        echo view('admin/config/unit/edit_unit_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_unit(): object
    {
        $model = new UnitModel();

        $id = $this->request->getVar('id');
        $data = [
            'description' => $this->request->getVar('unit_name'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Unidad actualizada exitosamente'
            : 'No se pudo actualizar la unidad';

        return redirect()->to(base_url('/a/configuracion/unidades'))->with('msg', $msg);
    }
    # Eliminar unidad
    # --------------------------------------------------------------------
    public function delete_unit(): object
    {
        $model = new UnitModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Unidad eliminada exitosamente'
            : 'No se pudo eliminar la unidad';

        return redirect()->to(base_url('/a/configuracion/unidades'))->with('msg', $msg);
    }
}
