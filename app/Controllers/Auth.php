<?php

namespace App\Controllers;

use App\Models\Users\Administrator;
use App\Models\Users\Parents;
use App\Models\Users\Student;
use App\Models\Users\Teacher;

class Auth extends BaseController
{
    public $header = 'templates/header';
    public $footer = 'templates/footer';

    public function index()
    {
        echo view($this->header, ['title' => 'Inicio de Sesión']);
        echo view('login', ['msg' => session('msg')]);
        echo view($this->footer);
    }

    public function recover()
    {
        echo view($this->header, ['title' => 'Recuperar Contraseña']);
        echo view('recover');
        echo view($this->footer);
    }

    public function login()
    {
        helper('encrypt');
        $db = db_connect();
        $model = null;
        $role = null;
        // Usuario y contraseña enviados desde el formulario
        $username = (string) $this->request->getPost('user');
        $password = (string) $this->request->getPost('pass');
        $hashed_pass = encrypt($password);

        $query = $db->query("SELECT * FROM `users` WHERE username = '$username' AND pass_hash = '$hashed_pass';");

        // ! Si los datos no coinciden con ningún registro se redirecciona al login con un mensaje de error
        if (empty($query->getResultArray())) {
            return redirect()->to(base_url('/'))->with('msg', 'Usuario o contraseña incorrectos');
        }

        $type_user = $query->getResultArray()[0]['role'];

        switch ($type_user) {
            case 1:
                $model = new Administrator();
                $role = 'a';
                break;
            case 2:
                $model = new Parents();
                $role = 'p';
                break;
            case 3:
                $model = new Student();
                $role = 's';
                break;
            case 4:
                $model = new Teacher();
                $role = 't';
                break;
            default:
                return redirect()->to(base_url('/'))->with('msg', 'Ocurrió un error al iniciar sesión');
        }

        $user_data = $model->where('id', $query->getResultArray()[0]['id'])->findAll();
        $session = session();

        $session_data = [
            'id'         => $user_data[0]['id'],
            'username'   => $user_data[0]['username'],
            'name'       => $user_data[0]['name'],
            'lastname'   => $user_data[0]['lastname'],
            'email'      => $user_data[0]['email'],
            'picture'    => $user_data[0]['picture'],
            'role'       => $role,
            'logged_in' => true,
        ];
        $session->set($session_data);

        return redirect()->to(base_url($role . '/inicio'));
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('/'))->with('msg', 'Sesión Cerrada');
    }
}
