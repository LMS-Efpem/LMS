<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\GradeModel;

class GradeController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # GRADOS
    ######################################################################
    # Ver Grados
    # --------------------------------------------------------------------
    public function view_grades()
    {
        echo view($this->header, ['title' => 'Configuración | Unidades']);
        echo view('admin/config/grade/view_grades');
        echo view($this->footer);
    }
    # Crear grado
    # --------------------------------------------------------------------
    public function create_grade(): object
    {
        $model = new GradeModel();

        $data = [
            'description' => $this->request->getVar('grade_name'),
        ];

        $msg = ($model->insert($data))
            ? 'Grado creado exitosamente'
            : 'No se pudo crear el grado';

        return redirect()->to(base_url('/a/configuracion/grados'))->with('msg', $msg);
    }
    # Editar grado
    # --------------------------------------------------------------------
    public function edit_grade_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Grados']);
        echo view('admin/config/grade/edit_grade_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_grade(): object
    {
        $model = new GradeModel();

        $id = $this->request->getVar('id');
        $data = [
            'description' => $this->request->getVar('grade_name'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Grado actualizado exitosamente'
            : 'No se pudo actualizar el grado';

        return redirect()->to(base_url('/a/configuracion/grados'))->with('msg', $msg);
    }
    # Eliminar grado
    # --------------------------------------------------------------------
    public function delete_grade(): object
    {
        $model = new GradeModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Grado eliminado exitosamente'
            : 'No se pudo eliminar el grado';

        return redirect()->to(base_url('/a/configuracion/grados'))->with('msg', $msg);
    }
}
