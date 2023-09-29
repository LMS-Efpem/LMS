<?php

namespace App\Filters\Session;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
    /**
     * Este método se utiliza como filtro para verificar si el usuario es un administrador y ha iniciado sesión.
     *
     * Si no se ha iniciado sesión, se redirige al login con un mensaje de error.
     * Si se ha iniciado sesión pero no es un administrador,
     * se redirigirá a la página de inicio correspondiente del rol.
     *
     * @param RequestInterface $request   El objeto de solicitud.
     * @param mixed            $arguments Los argumentos pasados al filtro.
     *
     * @return mixed El objeto de respuesta o nulo.
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('logged_in')) {
            return redirect()->to(base_url('/'))->with('msg', 'No ha iniciado sesión');
        } else {
            $user = session()->get();

            if ($user['role'] != 'a') {
                return redirect()->to(base_url($user['role'] . '/inicio'));
            }
        }
    }

    /**
     * Método que se ejecuta después de la acción del controlador.
     * En este caso ninguno es necesario.
     *
     * @param RequestInterface  $request   La solicitud HTTP entrante.
     * @param ResponseInterface $response  La respuesta HTTP saliente.
     * @param mixed             $arguments Argumentos opcionales pasados
     *                           a la acción del controlador.
     * @return void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
