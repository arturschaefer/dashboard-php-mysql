<?php
if (!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION['id'])) {
    $_SESSION['msg'] = "Área restrita";
    header("Location: login.php");
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Synergia - Consolidado de Pessoas</title>
        <meta name="description" content="Synergia - Consolidado de Pessoas">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
        <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
        <link rel="stylesheet" href="assets/scss/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <?php include("./index.html") ?>
        <div id="right-panel" class="right-panel">
            <?php include("./header.php") ?>
            <p></p> 
            <div class="breadcrumbs">

                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Consolidado de Pessoas</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="index.php">Inicio</a></li>
                                <li class="active">Tabela de pessoas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3 ">
                <div class="animated fadeIn ">
                    <div class="row">
                        <div class="content mt-12">
                            <div class="card">
                                <br>
                                <div class=" table-responsive">
                                    <table id="user_data" class="table table-bordered table-striped dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        <thead>
                                            <tr>
                                                <th>SGC</th>
                                                <th>Indexador</th>
                                                <th>Nome</th>
                                                <th>SGS Pessoa</th>
                                                <th>Sexo</th>
                                                <th>CPF</th>
                                                <th>RG</th>
                                                <th>Data de Nascimento</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->
        </div>
    </div>

    <!-- /#right-panel -->
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

</body>
</html>   
<script type="text/javascript" language="javascript" >
    $(document).ready(function () {

        fetch_data();

        function fetch_data()
        {
            var dataTable = $('#user_data').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "person_fetch.php",
                    type: "POST"
                }
            });
        }
    });
</script>
