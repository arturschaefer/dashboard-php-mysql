<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function queries($option, $data) {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "synergia";

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if (!$conn) {
        die("Falha na conexao: " . mysqli_connect_error());
    }

    $myArray = array();

    
    if ($option == 1) {//query to all peoples
        $result = mysqli_query($conn, "SELECT sgc_pessoa, indexador, nome, sgs_p FROM pessoa");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['sgc_pessoa'] . "</td>";
            echo "<td>" . $row['indexador'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['sgs_p'] . "</td>";
            echo "</tr>";
        }
    } else if ($option == 2) {//query to all properties
        $result = mysqli_query($conn, "SELECT sgc, indexador, sgs_completo, data_pesquisa FROM propriedade");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['sgc'] . "</td>";
            echo "<td>" . $row['indexador'] . "</td>";
            echo "<td>" . $row['sgs_completo'] . "</td>";
            echo "<td>" . $row['data_pesquisa'] . "</td>";
            echo "</tr>";
        }
    } else if ($option == 3) {//query to CPF
        $result = mysqli_query($conn, "SELECT sgc_pessoa, indexador, nome, sgs_p, cpf FROM pessoa where cpf like '%" . $data . "%'");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['sgc_pessoa'] . "</td>";
            echo "<td>" . $row['indexador'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['sgs_p'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "</tr>";
        }
    } else if ($option == 4) {//query to sgs_pessoa
        $result = mysqli_query($conn, "SELECT sgc_pessoa, indexador, nome, sgs_p, cpf FROM pessoa where sgs_p like '%" . $data . "%'");
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['sgc_pessoa'] . "</td>";
            echo "<td>" . $row['indexador'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['sgs_p'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "</tr>";
        }
    } else if ($option == 5) {//query to SGC pessoa
        $result = mysqli_query($conn, "SELECT sgc_pessoa, indexador, nome, sgs_p, cpf FROM pessoa where sgc_pessoa like '%" . $data . "%'");

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['sgc_pessoa'] . "</td>";
            echo "<td>" . $row['indexador'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['sgs_p'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "</tr>";
        }
    }
    mysqli_close($conn);
}

function contador($tabela, $coluna) {
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "synergia";

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if (!$conn) {
        die("Falha na conexao: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, "SELECT count(*) as total FROM " . $tabela);
    while ($row = mysqli_fetch_array($result)) {
        echo $row['total'];
    }


    mysqli_close($conn);
}

function retornaJSon() {
    //Get records from database
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "synergia";

    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    $result = mysqli_query($conn, "SELECT * FROM pessoa;");

//Add all records to an array
    $rows = array();
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }

//Return result to jTable
    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    $jTableResult['Records'] = $rows;
    print json_encode($jTableResult);
    
    mysqli_close($conn);
}
