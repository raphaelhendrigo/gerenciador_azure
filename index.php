<?php
// Definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

// Dados conexão bd local
$servidor = 'biblioteca-acervo.mysql.database.azure.com';
$banco = 'biblioteca_acervo';
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
	//... as outras variáveis que você mencionou anteriormente
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>
		<?php echo $nome_sistema; ?>
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="img/icone.png">
</head>

<body>
	<div class="login">
		<div class="form">
			<img src="img/logo.png" class="imagem">
			<p class="titulo">
				<?php echo $nome_sistema; ?>
			</p>
			<form method="post" action="autenticar.php">
				<input type="email" name="usuario" placeholder="Seu Email" required>
				<input type="password" name="senha" placeholder="Senha" required>
				<button>Login</button>
			</form>
		</div>
	</div>
</body>

</html>