<?php

namespace App\Controllers;

use App\Models\News\Post;

class Admin extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';
    public $alert  = 'components/util/alert';
    ######################################################################
    # INICIO
    ######################################################################
    public function main()
    {
        echo view($this->header, ['title' => 'Inicio']);
        echo view('admin/main');
        echo view($this->alert);
        echo view($this->footer);
    }

    ######################################################################
    # NOTICIAS
    ######################################################################
    # Ver noticia
    # --------------------------------------------------------------------
    public function view_new($id_new)
    {
        echo view($this->header, ['title' => 'Noticias']);
        echo view('admin/news/main', ['id_new' => $id_new]);
        echo view($this->alert);
        echo view($this->footer);
    }
    # Crear noticia
    # --------------------------------------------------------------------
    public function create_new_form()
    {
        echo view($this->header, ['title' => 'Noticia | Nueva']);
        echo view('admin/news/create');
        echo view($this->footer);
    }
    public function create_new(): object
    {
        $model = new Post();

        $data = [
            'title'       => $this->request->getVar('txt_title'),
            'description' => $this->request->getVar('txt_description'),
        ];

        $msg = ($model->insert($data))
            ? 'Noticia creada exitosamente'
            : 'No se pudo crear la noticia';

        $db = db_connect();
        $last_code = $db->query('SELECT MAX(id) AS `id` FROM post;')->getResult()[0]->id;

        return redirect()->to(base_url('/a/noticia/' . $last_code))->with('msg', $msg);
    }
    # Editar noticia
    # --------------------------------------------------------------------
    public function edit_new_form($id_new)
    {
        echo view($this->header, ['title' => 'Noticia | Editar']);
        echo view('admin/news/edit', ['id_new' => $id_new]);
        echo view($this->footer);
    }

    public function edit_new(): object
    {
        $model = new Post();

        $id = $this->request->getVar('id');
        $data = [
            'title'            => $this->request->getVar('txt_title'),
            'description'      => $this->request->getVar('txt_description'),
            'last_edited_date' => date('Y-m-d H:i:s'),
        ];

        $msg = ($model->update($id, $data))
            ? 'Noticia actualizada exitosamente'
            : 'No se pudo actualizar la noticia';

        return redirect()->to(base_url('/a/noticia/' . $id))->with('msg', $msg);
    }
    # Eliminar noticia
    # --------------------------------------------------------------------
    public function delete_new(): object
    {
        $model = new Post();

        $id = $this->request->getVar('id');

        $msg = ($model->delete($id))
            ? 'Noticia eliminada exitosamente'
            : 'No se pudo eliminar la noticia';

        return redirect()->to(base_url('/a/inicio'))->with('msg', $msg);
    }

    ######################################################################
    # PERFIL ESTUDIANTE
    ######################################################################
    # Ver estudiante
    # --------------------------------------------------------------------
    public function view_student($username)
    {
        echo view($this->header, ['title' => 'Ficha Estudiante']);
        echo view('admin/profile/student/main', ['username' => $username]);
        echo view($this->alert);
        echo view($this->footer);
    }
}
