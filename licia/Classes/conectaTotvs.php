<?php


/**  
    * @classe    class-conteudo.php  
    * @descrição Classe de acesso ao banco de dados SQLServer  
    * @autor     Thiago Avelino 
    * @email     thiago_avelino@msn.com
    * @data      21/03/2007 
    * @copyright (c) 2007 by Thiago Avelino
    */ 
     
    class SQLServer { 
        //parâmetros de conexão 
        var $db; 
        var $host; 
        var $usuario; 
        var $senha; 
         
        //handle da conexão 
        var $conn; 
         
        //resultado das Queries 
        var $result; 
        var $numReg; 
         
        /** 
        * Construtor 
        * @param $db nome da base de dados 
        * @param $host nome do host da base de dados 
        * @param $usuario usuário da base de dados 
        $ @param $senha senha da base de dados 
        */ 
        function SQLServer() { 
            $varDb = ""; 
            $varHost = ""; 
            $varUsuario = "moodle_user"; 
            $varSenha = "MoodleDesenv#"; 
            $this->db = $varDb; 
            $this->host = $varHost; 
            $this->usuario = $varUsuario; 
            $this->senha = $varSenha;  
        } 
                 
        /** 
        * Conecta ao mssql e caso retorne true ela automaticamente seleciona a base 
         */ 
        function conectar() { 
            $this->conn = mssql_connect($this->host, $this->usuario, $this->senha) or die("Erro ao conectar a base"."<br>".mssql_get_last_message()); 
           
                mssql_select_db($this->db, $this->conn); 
            
        } 
                                 
        /** 
        * Retorno de uma query 
        * @param $srt string válida mssql 
        * @return true query executada com êxito, false erro na query 
        */ 
        function executarQuery($str) { 
            $result = mssql_query($str, $this->conectar()) or die("Erro ao executar a Query"."<br>".mssql_get_last_message()); 
           
            if ($result) { 
                $this->result = $result; 
                $this->numReg = mssql_num_rows($this->result); 
                return  true; 
            } 
        } 
         
         
        /** 
        * Retorna o índice de uma linha da query executada 
        * @result índice de uma linha da query executada 
        */ 
        function fetchRow() { 
            return mssql_fetch_row($this->result); 
        } 
         
        /** 
        * Retorna o índice de uma linha da query executada 
        * @result índice de uma linha da query executada 
        * @param $linha índice de uma linha da query executada 
        * @param $campo string do campo do índice de uma linha da query executada 
        */ 
        function result($linha, $campo) { 
            return mssql_result($this->result, $linha, $campo); 
        } 
         
        /** 
        * Retorna um array de índices e nomes de uma linha da query executada 
        * @result array de índices e nomes de uma linha da query executada 
        */ 
        function fetchArray() { 
            return mssql_fetch_array($this->result); 
        } 
         
        /** 
        * Retorna o número de linhas afetadas 
        * @result número de linhas afetadas 
        */ 
        function affectedRows() { 
            return mssql_rows_affected($this->result); 
        } 
         
        /** 
        * Retorna o número de linhas 
        * @result número de linhas 
        */ 
        function numRows() { 
            return mssql_num_rows($this->result); 
        } 
         
        /** 
        * Limpa o ponteiro de resultados 
        * @result ponteiro de resultados limpos 
        */ 
        function freeResult() { 
            return mssql_free_result($this->result); 
        } 
        
        /**
         *MARCOS 
         */
        function retorna(){
            $sql= "select NOME,MATRICULA, EMAIL,CURSO FROM corporerm.dbo.ZINTEGRACAOEAD_LISTA_ALUNOS WHERE CURSO  = 'FILOSOFIA'";
          $rsql = mssql_fetch_array($sql);  
          return  $rsql;  
        }




        /** 
        * Disconecta da base 
        * @result base disconectada 
        */ 
        function disconnect() { 
             return mssql_close($this->conn); 
        } 
    } 
?>









   
