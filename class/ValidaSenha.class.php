<?php

class ValidaSenha
{

    public function setValidaSenha($pass)
    {
        if (strlen($pass) < 1)
            return 'informe Senha';
        else if (!preg_match('/^[0-9a-z\.\-]{8,12}$/i', $pass))
            return 'Senha InvĂˇlida';
        else
            return $pass;
    }
}