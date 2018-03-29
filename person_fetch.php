<?php

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "synergia");
$columns = array('sgc_pessoa', 'indexador', 'nome', 'sgs_p', 'sexo', 'cpf', 'rg', 'data_nascimento');

$query = "SELECT * FROM pessoa ";

if (isset($_POST["search"]["value"])) {
    $query .= '
    WHERE sgc_pessoa LIKE "%' . $_POST["search"]["value"] . '%" 
        OR indexador LIKE "%' . $_POST["search"]["value"] . '%" 
        OR nome LIKE "%' . $_POST["search"]["value"] . '%" 
        OR sgs_p LIKE "%' . $_POST["search"]["value"] . '%" 
        OR cpf LIKE "%' . $_POST["search"]["value"] . '%"
        OR rg LIKE "%' . $_POST["search"]["value"] . '%"
    ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY cod DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="sgc_pessoa">' . $row["sgc_pessoa"] . '</div>';
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="indexador">' . $row["indexador"] . '</div>';
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="nome">' . $row["nome"] . '</div>';
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="sgs_p">' . $row["sgs_p"] . '</div>';
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="sexo">' . $row["sexo"] . '</div>';
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="cpf">' . $row["cpf"] . '</div>';
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="rg">' . $row["rg"] . '</div>';
    $sub_array[] = '<div  class="" data-id="' . $row["cod"] . '" data-column="data_nascimento">' . $row["data_nascimento"] . '</div>';
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM pessoa";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);

echo json_encode($output);
?>