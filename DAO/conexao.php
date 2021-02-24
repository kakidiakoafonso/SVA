<?php
    function Conexao ()
    {
        try 
        {
            $connection = new PDO('mysql:host=localhost;port=3306;dbname=automovelbd','root','');
        } 
        catch (Exception $e) 
        {
            echo "Erro: {$e->getMessage()}";
        }
        return $connection;
    }
    
?>