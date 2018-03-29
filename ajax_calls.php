<?php
include_once("queries.php");
echo "<table id='resultado_tabela' class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>SGC da Pesquisa</th>
            <th>Indexador</th>
            <th>Nome</th>
            <th>SGS Pessoa</th>
            <th>CPF</th>
        </tr>
    </thead>";
if (isset($_GET['cpf_entrada'])) { // Pega o valor digitado no primeiro campo
//    echo strtoupper($_GET['cpf_entrada']); // exibe o valor convertido em maiúsculo
//    echo "<tbody id='cpf'>";
    queries(3, $_GET['cpf_entrada']);
}
if (isset($_GET['sgs'])) { // Pega o valor digitado no primeiro campo
//    echo strtoupper($_GET['cpf_entrada']); // exibe o valor convertido em maiúsculo
//    echo "<tbody id='sgs'>";
    queries(4, $_GET['sgs']);
}
if (isset($_GET['sgc'])) { // Pega o valor digitado no primeiro campo
//    echo strtoupper($_GET['cpf_entrada']); // exibe o valor convertido em maiúsculo
//    echo "<tbody id='sgs'>";
    queries(5, $_GET['sgc']);
}
?>