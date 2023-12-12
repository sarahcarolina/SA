<?php

    class Usuario {
        private $id;
        private $nome;
        private $mail;
        private $cpf;
        private $senha;

        function getID(){
            return $this->id;
        }
        
        function getNome(){
            return $this->nome;
        }

        function getEmail(){
            return $this->email;
        }
        
        function getCPF(){
            return $this->cpf;
        }

        function getSenha(){
            return $this->senha;
        }




        function setID($id){
            return $this->id = $id;
        }
        
        function setNome($nome){
            return $this->nome = $nome;
        }

        function setEmail($email){
            return $this->email = $email;
        }
        
        function setCPF($cpf){
            return $this->cpf = $cpf;
        }

        function setSenha($senha){
            return $this->senha = $senha;
        }


    }
    
?>