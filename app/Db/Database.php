<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

    const HOST = 'localhost';

    //nome do db

    const NAME = 'churrascowl';

    const USER = 'root';

    const PASS = '';

    //nome da tabela que vou manipular
    private $table;

    private $connection;

    
    //define tabela e instancia e conexao
    public function __construct($table = null){
        $this->table= $table;
        $this->setConnection();
    }

    //metodo responsavel por criar uma conexao com banco de dados
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }


    //metodo responsavel por executar queries dentro do banco de dados
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;

        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());

    }
}
    //metodo responsavel por inserir valores no banco
    public function insert($values){
            //DADOS DA QUERY
            $fields = array_keys($values);
            $binds = array_pad([],count($fields),'?');

            // echo "<pre>"; print_r($binds); echo "</prev>"; exit;

            //MONTA QUERY
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

            //executa insert
            $this->execute($query,array_values($values));
            // echo $query; 
            // exit;

            //retorna id inserido
            return $this->connection->lastInsertId();
    }

    //metodo para efetuar uma consulta no banco
    public function select($where = null, $order = null, $limit = null, $fields = '*'){

        //dados da query
        $where = strlen($where) ? 'WHERE '.$where: '';
        $order = strlen($order) ? 'ORDER BY '.$order: '';
        $limit = strlen($limit) ? 'LIMIT '.$limit: '';

        //monta a query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;      
        
     

        return $this->execute($query);
        

    }

    //faz a soma da coluna valores para saber os totais
    public function selectSum($where = null, $order = null, $limit = null, $fields = ' (SELECT (SUM(CAST(valor AS DECIMAL(10,2))) - count(id)) * 10  FROM `churrascowl`)AS total1,
    (SELECT count(cv_bebida)*20 FROM `churrascowl` where cv_bebida = \'s\')+(SELECT count(bebida)*10 FROM `churrascowl` where bebida = \'s\') AS totalbebidas,
    (SELECT count(convidado)*20 FROM `churrascowl` where convidado = \'s\')+(SELECT count(comparecer)*10 FROM `churrascowl` where comparecer = \'s\') AS totalcomidas '){

        //dados da query
        $where = strlen($where) ? 'WHERE '.$where: '';
        $order = strlen($order) ? 'ORDER BY '.$order: '';
        $limit = strlen($limit) ? 'LIMIT '.$limit: '';

        //monta a query
        $query = 'SELECT '.$fields. 'FROM '.$this->table.' group by total1'.$where.' '.$order.' '.$limit;      
        
     

        return $this->execute($query);
        

    }

    //metodo responsavel por fazer o atualizacoes no banco de dados
   public function update($where, $values){
    //dados da query
    $fields = array_keys($values);

    //monta query
       $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE ' .$where;

    
       $this->execute($query,array_values($values));

       return true;

   }
    
    //metodo responsavel por excluir dados do banco
   public function delete($where){
       $query = ' DELETE  FROM '.$this->table.' WHERE '.$where;


       $this->execute($query);

       return true;

   }


    


}