<?php

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "synergia");
$columns = array('sgc', 'indexador', 'sgs_completo', 'data_pesquisa');

$query = "SELECT * FROM propriedade";

if (isset($_POST["search"]["value"])) {
    $query .= '
    WHERE sgc LIKE "%' . $_POST["search"]["value"] . '%" 
        OR indexador LIKE "%' . $_POST["search"]["value"] . '%" 
        OR sgs_completo LIKE "%' . $_POST["search"]["value"] . '%" 
    ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY sgc DESC ';
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
    $sub_array[] = '<div class="" data-id="' . $row["sgc"] . '" data-column="sgc">' . $row["sgc"] . '</div>';
    $sub_array[] = '<div class="" data-id="' . $row["sgc"] . '" data-column="indexador">' . $row["indexador"] . '</div>';
    $sub_array[] = '<div class="" data-id="' . $row["sgc"] . '" data-column="sgs_completo">' . $row["sgs_completo"] . '</div>';
    $sub_array[] = '<div class="" data-id="' . $row["sgc"] . '" data-column="data_pesquisa">' . $row["data_pesquisa"] . '</div>';
    $data[] = $sub_array;
}

function get_all_data($connect) {
    $query = "SELECT * FROM propriedade";
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