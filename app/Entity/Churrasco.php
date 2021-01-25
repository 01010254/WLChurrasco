<?php

    namespace App\Entity;

    use \App\Db\Database;
    use \PDO;

    class Churrasco{

        // identificador unico da vaga
        // var int
        public $id;

        // nome do funcionario
        // var string
        public $nome;

        //vai ou nao comparecer
        /*@var string(s/n)*/
        public $comparecer;

        //vai ou nao bebe ou nao
        // var string(s/n)
        public $bebida;

        //vai ou nao levar convidado
        // var string(s/n)
        public $convidado;

        //convidado bebe ou nao bebe
        // var string(s/n)
        public $cv_bebida;

        //valor que precisa pagar
        // var string(0/10/20/30/40/50/60)
        public $valor;


        //metodo responsavel por cadastrar nova funcionario no banco boolean
        public function cadastrar(){
            //inserir funcionario no banco
            $obDatabase = new Database('churrascowl');
            $this->id = $obDatabase->insert([
                                    'nome'=> $this->nome,
                                    'comparecer'=> $this->comparecer,
                                    'bebida'=> $this->bebida,
                                    'convidado'=> $this->convidado,
                                    'cv_bebida'=> $this->cv_bebida,
                                    'valor'=> $this->valor
                                ]);

            
            //atribuir id do funcionario na instancia

            //retornar sucesso
            return true;

        }
        //metodo responsavel por excluir o cadastro do banco
        public function excluir(){
            return (new Database('churrascowl'))->delete('id='.$this->id);
        }


        //metodo responsavel por atualizar o funcionario no banco
        public function atualizar(){
            return (new Database('churrascowl'))->update('id='.$this->id,[
                                                'nome'=> $this->nome,
                                                'comparecer'=> $this->comparecer,
                                                'bebida'=> $this->bebida,
                                                'convidado'=> $this->convidado,
                                                'cv_bebida'=> $this->cv_bebida,
                                                'valor'=> $this->valor
                                            ]);

        }


        //metodo respobnsavel por obter os funcionarios do banco de dados
        public static function getChurrascos($where= null, $order = null, $limit = null){
            return (new Database('churrascowl'))->select($where,$order,$limit)
                                              ->fetchAll(PDO::FETCH_CLASS,self::class);
        }




        public static function getTotal($where= null, $order = null, $limit = null){
            return (new Database('churrascowl'))->selectSum()
                                              ->fetchAll(PDO::FETCH_CLASS,self::class);
        }

        //metodo responsavel por buscar vaga pelo id
        public static function getChurrasco($id){
            return (new Database('churrascowl'))->select('id = '.$id)
                                              ->fetchObject(self::class);
        }


    }