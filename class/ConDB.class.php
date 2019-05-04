<?php

function __autoload($class){

    // REQUIRE: Tenta incluir uma página. Caso falhe, o script retorna um fatal error (erro fatal) e aborta a
    // execução do script. Não aceita passagem de variáveis (GET) na string. Não é recomendável que se utilize em
    // estruturas condicionais, a menos que se deseje o seu efeito, de ser executada apenas uma vez.
   
   // por estarem dentro do mesmo diretório 'require_once"{$class}' carregara todos os arquivos com extensão ' Login.class.php '
   // sem se precise fazer um requirimento especifico por classe.
   
       require_once"{$class}.class.php";
   }
   
    abstract class ConDB{
   
       private  $conexao;
       private function setConn(){
           return
           is_null($this->conexao)?
               $this->conexao=new PDO("mysql:host=localhost;dbname=sgseb","root",""):
               $this->conexao;
       }
   // conexão
   
       public function getConn(){
           return $this->setConn();
       }
   }