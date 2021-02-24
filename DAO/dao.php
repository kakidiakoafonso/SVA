<?php
include_once('conexao.php');
$pdo = Conexao();


function listarCarro()
{   
    global $pdo;    
    $query = "select * from carros";
    $resultado = $pdo->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_OBJ);
}
function listarMoto()
{   
    global $pdo;    
    $query = "select * from motos";
    $resultado = $pdo->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_OBJ);
}
function relatorio()
{   
    global $pdo;    
    $query = "SELECT DISTINCT venda.*, carros.marca  FROM venda, carros 
    WHERE venda.automovel = carros.modelo";
    $resultado = $pdo->prepare($query);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_OBJ);
}



///// INSERT 
function cadastrarCarro($carro)
{   
    
    global $pdo;    
    $query = "INSERT INTO `carros` (`id`, `codigo`, `marca`, `modelo`, `ano`, `preco`, `qtdade`,`capacidade`, `tipo`, `combustivel`, `potencia`) 
    VALUES (NULL, :codigo, :marca,:modelo,:ano,:preco,:qtdade,:capacidade,:tipo,:energia,:potencia);";
    $resultado = $pdo->prepare($query);
    $resultado ->bindValue(":codigo",$carro['codigo']);
    $resultado ->bindValue(":marca",$carro['marca']);
    $resultado ->bindValue(":modelo",$carro['modelo']);
    $resultado ->bindValue(":ano",$carro['ano']);
    $resultado ->bindValue(":preco",$carro['preco']);
    $resultado ->bindValue(":qtdade",$carro['quantidade']);
    $resultado ->bindValue(":capacidade",$carro['capacidade']);
    $resultado ->bindValue(":tipo",$carro['tipo']);
    $resultado ->bindValue(":energia",$carro['energia']);
    $resultado ->bindValue(":potencia",$carro['potencia']);
    $resultado->execute();
    return $resultado->fetch(PDO::FETCH_OBJ);
}
function cadastrarMoto($moto)
{   
    global $pdo; 
    $query = "INSERT INTO `motos` (`id`, `codigo`, `marca`, `modelo`, `ano`, `preco`, `tipo`, `cilindro`, `qtdade`) 
    VALUES (NULL, :codigo,:marca,:modelo,:ano,:preco,:tipo,:cilindro,:qtdade);";
    $resultado = $pdo->prepare($query);
    $resultado ->bindValue(":codigo",$moto['codigo']);
    $resultado ->bindValue(":marca",$moto['marca']);
    $resultado ->bindValue(":modelo",$moto['modelo']);
    $resultado ->bindValue(":ano",$moto['ano']);
    $resultado ->bindValue(":preco",$moto['preco']);
    $resultado ->bindValue(":tipo",$moto['tipo']);
    $resultado ->bindValue(":cilindro",$moto['cilindro']);
    $resultado ->bindValue(":qtdade",$moto['qtdade']);
    $resultado->execute();
    return $resultado->fetchAll(PDO::FETCH_OBJ);

}


///// UPDATE

function updateCarro($carro)
{   
    global $pdo;    
    $query = "UPDATE `carros` SET `preco`=:preco ,`qtdade`=:qtdade WHERE `codigo` = :codigo and `marca` = :marca and `modelo`=:modelo";
    $resultado = $pdo->prepare($query);
    $resultado ->bindValue(":codigo",$carro['codigo']);
    $resultado ->bindValue(":marca",$carro['marca']);
    $resultado ->bindValue(":modelo",$carro['modelo']);
    $resultado ->bindValue(":preco",$carro['preco']);
    $resultado ->bindValue(":qtdade",$carro['qtdade']);
    $resultado->execute();
}
function updateMoto($carro)
{  
    global $pdo;    
    $query = "UPDATE `motos` SET `preco` =:preco ,`qtdade`=:qtdade WHERE `marca`= :marca and`modelo`=:modelo and `codigo`=:codigo";
    $resultado = $pdo->prepare($query);
    $resultado ->bindValue(":codigo",$carro['codigo']);
    $resultado ->bindValue(":marca",$carro['marca']);
    $resultado ->bindValue(":modelo",$carro['modelo']);
    $resultado ->bindValue(":preco",$carro['preco']);
    $resultado ->bindValue(":qtdade",$carro['qtdade']);
    $resultado->execute();
}


function vender($dados)
{
    $dia = date("d/m/y");
    global $pdo;    
    $query = "INSERT INTO `venda`(`id`, `nome`, `sobrenome`, `numero`, `morada`, `automovel`, `data`) 
    VALUES (Null,:nome,:sobrenome,:numero,:morada,:automovel,:dia)";
    $resultado = $pdo->prepare($query);
    $resultado ->bindValue(":nome",$dados['nome']);
    $resultado ->bindValue(":sobrenome",$dados['sobrenome']);
    $resultado ->bindValue(":numero",$dados['telefone']);
    $resultado ->bindValue(":morada",$dados['morada']);
    $resultado ->bindValue(":automovel",$dados['modelo']);
    $resultado ->bindValue(":dia",$dia);
    $resultado->execute();
}



?>