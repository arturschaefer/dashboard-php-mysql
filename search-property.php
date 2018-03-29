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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="ajax.js"></script>

    <!-- Include one of jTable styles. -->
    <link href="assets/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />

    <!-- Include jTable script file. -->
    <script src="assets/jtable/jquery.jtable.min.js" type="text/javascript"></script>

    <?php include("./index.html") ?>
    <div id="right-panel" class="right-panel">
        <?php include("./header.php") ?>
        <div class="row">
            <div class="content mt-3 col-md-12">
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <h4>Consultar Propriedades</h4>
                        </div>
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-indexador-tab" data-toggle="tab" href="#nav-indexador" role="tab" aria-controls="nav-indexador" aria-selected="false">Buscar por CPF</a>
                                        <a class="nav-item nav-link" id="nav-sgc-tab" data-toggle="tab" href="#nav-sgc" role="tab" aria-controls="nav-sgc" aria-selected="false">Buscar por SGC</a>
                                        <a class="nav-item nav-link" id="nav-sgs-tab" data-toggle="tab" href="#nav-sgs" role="tab" aria-controls="nav-sgs" aria-selected="false">Buscar por SGS</a>
                                    </div>
                                </nav>

                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <!--CPF TAB-->
                                    <div class="tab-pane fade show active" id="nav-cpf" role="tabpanel" aria-labelledby="nav-indexador-tab">
                                        <div class="card-body card-block">
                                            <strong class="col-md-5">Indexador</strong>
                                            <br>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                        <div class="input-group">
                                                            <div class="input-group-btn" onclick="">
                                                                <button class="btn btn-primary" >
                                                                    <i class="fa fa-search"></i> Buscar
                                                                </button>
                                                            </div>                                                            
                                                            <input type="text" id="indexador"
                                                                   placeholder="012-345-678-000-A-A-A" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FIM CPF TAB-->

                                    <!--SGC TAB-->
                                    <div class="tab-pane fade show" id="nav-sgc" role="tabpanel" aria-labelledby="nav-sgc-tab">
                                        <div class="card-body card-block">
                                            <strong class="col-md-5">SGC</strong>
                                            <br>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                        <div class="input-group">
                                                            <div class="input-group-btn" onclick="">
                                                                <button class="btn btn-primary" >
                                                                    <i class="fa fa-search"></i> Buscar
                                                                </button>
                                                            </div>                                                            
                                                            <input type="text" id="sgc" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FIM SGC TAB-->

                                    <!--SGS TAB-->
                                    <div class="tab-pane fade show" id="nav-sgs" role="tabpanel" aria-labelledby="nav-sgs-tab">
                                        <div class="card-body card-block">
                                            <strong class="col-md-5">SGS</strong>
                                            <br>
                                            <div class="col-md-6">
                                                <div class="row form-group">
                                                    <div class="col col-md-12">
                                                        <div class="input-group">
                                                            <div class="input-group-btn" onclick="enviaSGS();">
                                                                <button class="btn btn-primary" >
                                                                    <i class="fa fa-search"></i> Buscar
                                                                </button>
                                                            </div>                                                            
                                                            <input type="text" id="sgs" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--FIM SGS TAB-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--RESULTADO DA BUSCA-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Resultado da busca</strong>
                            </div>
                            <div class="table-responsive">
                                <br />
                                <div align="right">
                                    <button type="button" name="add" id="add" class="btn btn-info">Add</button>
                                </div>
                                <br />
                                <div id="alert_message"></div>
                                <table id="user_data" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SGC</th>
                                            <th>SGS Completo</th>
                                            <th>Indexador</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--FIM RESULTADO DA BUSCA-->
                </div>
            </div>
        </div>
    </div>
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
    <!-- /# column -->    
</body>
</html>