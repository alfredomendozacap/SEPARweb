<?php


/*==================================================
=            LIMPIAR Y VALIDAR UN CAMPO            =
==================================================*/

function ValidarCampo($campo)
{
        // borrar espacios y caracteres
        $campo = trim($campo);

        // elimina barra invertidas
        $campo = stripcslashes($campo);

        // convertit htmls a string
        $campo = htmlspecialchars($campo);

        return $campo;
}

/*==============================================
=            FUNCION PARA ENCRIPTAR            =
==============================================*/
function encriptar($input, $rounds = 10)
{
    $crypt_options = [
      'cost' => $rounds
    ];
    return password_hash($input, PASSWORD_BCRYPT, $crypt_options);
}

/*==============================================
=          FUNCION PARA LIMITAR TEXTO          =
==============================================*/
function limitarTexto($texto, $limite){
    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
    return $texto;
}