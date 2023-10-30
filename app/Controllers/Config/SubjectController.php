<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\SubjectModel;

class SubjectController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # ASIGNATURAS
    ######################################################################
    # Ver asignaturas
    # --------------------------------------------------------------------
    public function view_subjects()
    {
        echo view($this->header, ['title' => 'Configuración | Asignatura']);
        echo view('admin/config/subject/view_subjects');
        echo view($this->footer);
    }
    # Crear asignatura
    # --------------------------------------------------------------------
    public function create_subject(): object
    {
        $model = new SubjectModel();

        $data = [
            'name'        => $this->request->getVar('subject_name'),
            'description' => $this->request->getVar('subject_description'),
        ];

        $msg = ($model->insert($data))
            ? 'Asignatura creada exitosamente'
            : 'No se pudo crear la asignatura';

        return redirect()->to(base_url('/a/configuracion/asignatura'))->with('msg', $msg);
    }
    # Editar asignatura
    # --------------------------------------------------------------------
    public function edit_subject_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Asignatura']);
        echo view('admin/config/subject/edit_subject_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_subject(): object
    {
        $model = new SubjectModel();

        $id = $this->request->getVar('id');
        $data = [
            'name'        => $this->request->getVar('subject_name'),
            'description' => $this->request->getVar('subject_description'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Asignatura actualizada exitosamente'
            : 'No se pudo actualizar la asignatura';

        return redirect()->to(base_url('/a/configuracion/asignatura'))->with('msg', $msg);
    }
    # Eliminar asignatura
    # --------------------------------------------------------------------
    public function delete_subject(): object
    {
        $model = new SubjectModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Asignatura eliminada exitosamente'
            : 'No se pudo eliminar la asignatura';

        return redirect()->to(base_url('/a/configuracion/asignatura'))->with('msg', $msg);
    }
}
