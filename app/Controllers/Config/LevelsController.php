<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\LevelsModel;

class LevelsController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # NIVELES
    ######################################################################
    # Ver niveles
    # --------------------------------------------------------------------
    public function view_academic_levels()
    {
        echo view($this->header, ['title' => 'Configuración | Nivel']);
        echo view('admin/config/levels/view_academic_levels');
        echo view($this->footer);
    }
    # Crear nivel
    # --------------------------------------------------------------------
    public function create_academic_level(): object
    {
        $model = new LevelsModel();

        $data = [
            'description' => $this->request->getVar('levels_name'),
        ];

        $msg = ($model->insert($data))
            ? 'Nivel creado exitosamente'
            : 'No se pudo crear el nivel';

        return redirect()->to(base_url('/a/configuracion/niveles-academicos'))->with('msg', $msg);
    }
    # Editar nivel
    # --------------------------------------------------------------------
    public function edit_academic_level_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Niveles']);
        echo view('admin/config/levels/edit_academic_level_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_academic_level(): object
    {
        $model = new LevelsModel();

        $id = $this->request->getVar('id');
        $data = [
            'description' => $this->request->getVar('levels_name'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Nivel actualizado exitosamente'
            : 'No se pudo actualizar el nivel';

        return redirect()->to(base_url('/a/configuracion/niveles-academicos'))->with('msg', $msg);
    }
    # Eliminar nivel
    # --------------------------------------------------------------------
    public function delete_academic_level(): object
    {
        $model = new LevelsModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Nivel eliminado exitosamente'
            : 'No se pudo eliminar el nivel';

        return redirect()->to(base_url('/a/configuracion/niveles-academicos'))->with('msg', $msg);
    }
}
