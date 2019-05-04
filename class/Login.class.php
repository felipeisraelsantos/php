<?php

class Login{
    private $vEmail, $vSenha, $cripto, $crud, $email, $senha, $log, $dds;

    /**
     * @param $email
     * @param $senha
     * @return string
     */
    public function setLogin($email, $senha){
        $this->vEmail = new ValidaEmail;
        $this->vSenha = new ValidaSenha;
        $this->cripto = new Cripto;
        $this->crud = new CRUD;

        $this->email = $this->vEmail->setValidaEmail($email);
        $this->senha = $this->vSenha->setValidaSenha($senha);

        $this->log = $this->senha == $senha ?
            $this->crud->select(' usuario, senha','usuario','WHERE usuario=? && senha=?',array($this->email,$this->cripto->setCripto($this->senha))):
            FALSE;

        if ($this->email <> $email){return $this->email;}
        else if ($this->senha <> $senha){return$this->senha;}
        else {
            if ($this->log && $this->log->rowCount()>0) {
                //  return $this->log;
                foreach ($this->log as $this->dds) {
                    $_SESSION['Logado'] = $this->dds;
                }
            } else {return 'Acesso Negado';}
        }
    }
}