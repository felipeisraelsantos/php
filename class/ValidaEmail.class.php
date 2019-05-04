<?php

class ValidaEmail{

    public function setValidaEmail($email){

        $ext = array('.com','.br','.net','.gov');


        if (empty($email))
            return 'Informe E-mail';
        else
            // expressão regular para validar formato de e-mail
            /* a função PREG_MATCH trabalaha com duas funções , o que será validado e onde sera validado.
                neste caso se o e-mail passar ele precisa estar no formato e extensão desejado*/
            if (!preg_match('/^[0-9a-z\_\.\-]+\@[0-9a-z\_\.\-]*[0-9a-z\_\-]+\.[a-z]{2,3}$/i',$email))
                return 'E-mail inválido';
            else
                /* a função IN_ARRAY verifica se o que está sendo passado está de acordo com a estensão pedida,
                   ou seja, o e-mail tem os formatos de '$ext' definidos nele.
                   juntamente com a função 'STRRCHR' -> Encontra a ultima ocorrência de um caractere em uma string
                   STR -> STRING R->RIGHT CHAR->CARACTER, ele conta da direita para esquerda um ponto depois da string*/
                if (!in_array(strrchr($email,'.'),$ext))
                    return 'extensao nao reconhecida';
                else
                    return $email;

    }
}