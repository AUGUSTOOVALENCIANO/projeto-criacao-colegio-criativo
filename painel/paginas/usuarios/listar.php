<?php
$tabela = "usuario";
require_once("../../../conexao.php");
$query = $pdo->query("SELECT * FROM usuarios order by nome asc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas > 0){
echo <<<HTML
<small>
    <table class="table table-hover" id="tabela">
    <thead>
    <tr>
    <th>Nome</th>
    <th class="esc">Telefone</th>
    <th class="esc">Email</th>
    <th class="esc">Nível</th>
    <th class="esc">Ativo</th>
    <th class="esc">Unidade</th>
    <th>Ações</th>
    </tr>
    </thead> 
    <tbody>	
HTML;
}

for($i=0; $i<$linhas; $i++){ //percorrendo dentro da tabela
    $id = $res[$i]['id_login'];
    $nome = $res[$i]['nome'];
    $telefone = $res[$i]['telefone'];
    $email = $res[$i]['email'];
    $nivel = $res[$i]['nivel'];
    $ativo = $res[$i]['ativo'];
    $unidade = $res[$i]['Unidade'];

    if($ativo == 'sim'){
        $icone = 'fa-check-square';
        $titulo_link = 'Desativar Usuário';
        $acao = 'nao';
        $classe_ativo = '';
    }else{
        $icone = 'fa-square-o';
        $titulo_link = 'Ativar Usuário';
        $acao = 'sim';
        $classe_ativo = '#c4c4c4';
    }

echo <<<HTML
    <tr style= "color:{$classe_ativo}">
        <td>{$nome}</td>
        <td class="esc">{$telefone}</td>
        <td class="esc">{$email}</td>
        <td class="esc">{$nivel}</td>
        <td class="esc">{$ativo}</td>
        <th class="esc">{$unidade}</th>
        <td>
            
<big><a href="#" onclick="editar('{$id}','{$nome}','{$email}','{$telefone}','{$nivel}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>
<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
</li>
<big><a href="#" onclick="mostrar('{$nome}','{$email}','{$telefone}','{$ativo}','{$senha}', '{$nivel}')" title="Mostrar Dados"><i class="fa fa-info-circle text-primary"></i></a></big>


<big><a href="#" onclick="ativar('{$id}', '{$acao}')" title="{$titulo_link}"><i class="fa {$icone} text-success"></i></a></big>
        </td>
    </tr>
HTML;

}
?>


<script type="text/javascript">
    $(document).ready( function () {
    $('#tabela').DataTable({
        "language" : {
            "url" : '//cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
        },
        "ordering": false,
        "stateSave":true
    });    
});
</script>