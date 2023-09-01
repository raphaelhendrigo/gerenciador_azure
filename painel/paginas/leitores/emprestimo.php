<?php 
$tabela = 'emprestimos';
@session_start();
require_once("../../../conexao.php");

$id_leitor = $_POST['id'];
$id_livro = $_POST['id_livro'];
$data_emprestimo = $_POST['data_emprestimo'];
$data_entrega = $_POST['data_entrega'];
$obs_emprestimo = $_POST['obs_emprestimo'];
$id_usuario = $_SESSION['id'];

if($id_livro == ""){
	echo 'Selecione um Livro';
	exit();
}


$query = $pdo->prepare("INSERT INTO $tabela SET livro = '$id_livro', leitor = '$id_leitor', data_emprestimo = '$data_emprestimo', data_devolucao = '$data_entrega', obs = :obs, funcionario = '$id_usuario', devolvido = 'Não' ");	

$query->bindValue(":obs", "$obs_emprestimo");
$query->execute();

$query2 = $pdo->query("SELECT * from livros where id = '$id_livro'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$emprestimos = @$res2[0]['emprestimos'];
$total_emprestimo = $emprestimos + 1;

$pdo->query("UPDATE livros SET status = 'Emprestado', emprestimos = '$total_emprestimo' where id = '$id_livro'");	

echo 'Salvo com Sucesso';
 ?>