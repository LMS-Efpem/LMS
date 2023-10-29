<?php

namespace App\Controllers\Config;

use App\Controllers\BaseController;
use App\Models\Config\ActivityModel;

class ActivityController extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    ######################################################################
    # ACTIVIDADES
    ######################################################################
    # Ver actividades
    # --------------------------------------------------------------------
    public function view_activities()
    {
        echo view($this->header, ['title' => 'Configuración | Actividad']);
        echo view('admin/config/activity/view_activities');
        echo view($this->footer);
    }
    # Crear actividad
    # --------------------------------------------------------------------
    public function create_activity(): object
    {
        $model = new ActivityModel();

        $data = [
            'title' => $this->request->getVar('activity_name'),
            'description' => $this->request->getVar('activity_description'),
            'id_activity_type' => $this->request->getVar('activity_num'),
            'id_subject_grade' => $this->request->getVar('activity_asig'),
            'id_unit' => $this->request->getVar('activity_unia'),
        ];

        $msg = ($model->insert($data))
            ? 'Actividad creada exitosamente'
            : 'No se pudo crear la actividad';

        return redirect()->to(base_url('/a/configuracion/actividades'))->with('msg', $msg);
    }
    # Editar actividad
    # --------------------------------------------------------------------
    public function edit_activity_form($id)
    {
        echo view($this->header, ['title' => 'Configuración | Actividad']);
        echo view('admin/config/activity/edit_activity_form', ['id' => $id]);
        echo view($this->footer);
    }

    public function edit_activity(): object
    {
        $model = new ActivityModel();

        $id = $this->request->getVar('id');
        $data = [
            'title' => $this->request->getVar('activity_name'),
            'description' => $this->request->getVar('activity_description'),
            'id_activity_type' => $this->request->getVar('activity_num'),
            'id_subject_grade' => $this->request->getVar('activity_asig'),
            'id_unit' => $this->request->getVar('activity_unia'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Actividad actualizada exitosamente'
            : 'No se pudo actualizar la actividad';

        return redirect()->to(base_url('/a/configuracion/actividades'))->with('msg', $msg);
    }
    # Eliminar actividad
    # --------------------------------------------------------------------
    public function delete_activity(): object
    {
        $model = new ActivityModel();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Actividad eliminada exitosamente'
            : 'No se pudo eliminar la actividad';

        return redirect()->to(base_url('/a/configuracion/actividades'))->with('msg', $msg);
    }
}
