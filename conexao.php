<?php

// Definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Dados conexão bd local
$servidor = 'biblioteca-acervo.mysql.database.azure.com';
$banco = 'biblioteca-acervo';
$usuario = 'raphael';
$senha = '@cervoSJC';



// Tentar conectar ao banco de dados
try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", $usuario, $senha);
} catch (PDOException $e) {
	die('Erro ao conectar ao banco de dados!<br>' . $e->getMessage());
}

// Variáveis globais
$nome_sistema = 'Gerenciador de Acervo Tecnico';
$email_sistema = 'contato@hugocursos.com.br';
$telefone_sistema = '(31)97527-5084';
$url_sistema = 'biblioteca-acervo.mysql.database.azure.com';

// Consultar a tabela config
$query = $pdo->prepare("SELECT * from config");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($res);

// Se a tabela estiver vazia, insira um registro padrão
if ($linhas == 0) {
	$sql = "INSERT INTO config (nome, email, telefone, logo, logo_rel, icone, marca_dagua, dias_entrega) VALUES (?, ?, ?, 'logo.png', 'logo.jpg', 'icone.png', 'Sim', '5')";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$nome_sistema, $email_sistema, $telefone_sistema]);
} else {
	// Atualize as variáveis globais com os valores do registro retornado
	$nome_sistema = $res[0]['nome'];
	$email_sistema = $res[0]['email'];
	$telefone_sistema = $res[0]['telefone'];
	//... e assim por diante para outras variáveis
}

?>