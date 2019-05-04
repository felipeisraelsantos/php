<?php
include_once "ConDB.class.php";
	class CRUD extends ConDB
    {

        private $query;

        private function prepExec($prep,$exec){//preparar a execução
            $this->query = $this->getConn()->prepare($prep); // prepara o comando ex: insert ou update ou delete
            $this->query->execute($exec);                    // executa a preparação do comando com os parametros
        }                                                    // que foram passados.


        /* parametros passados:
           $table -> tabela onde os dados serão afetados
           $cond ->  parametro dos registros  a serem alterados
           $exec ->  chama o execute da função prepExec e executa o codigo sql criado
        */

        public function insert($table,$cond,$exec){
            $this->prepExec('INSERT INTO '.$table.' SET '.$cond.' ',$exec);
            return $this->getConn()->lastInsertId();
        }

        public function select($fields,$table,$cond,$exec){
            $this->prepExec('SELECT '.$fields.' FROM '.$table.' '.$cond.' ',$exec);
            return $this->query;
        }

        public function update($table,$cond,$exec){
            $this->prepExec('UPDATE '.$table.' SET '.$cond.' ',$exec);
            return $this->query;
        }

        public function delete($table,$cond,$exec){
            $this->prepExec('DELETE FROM '.$table.' '.$cond.' ',$exec);
        }
    }
  //$c = new CRUD();
  //$c->insert(' usuario',' nivel=?,usuario=?,senha=?,FK_CODFUN=?,FK_CODCLI=?',array('1','felipe','1','1','1'));
