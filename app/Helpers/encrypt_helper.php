<?php

if (!function_exists('encrypt')) {
    /**
     * Función que encripta una cadena de texto utilizando el algoritmo sha256 y un _salt_ fijo.
     *
     * @param string $password La cadena de texto a encriptar.
     *
     * @return string La cadena de texto encriptada.
     */
    function encrypt(string $password): string
    {
        $salt = '';

        return hash('sha256', $password . $salt);
    }
}
