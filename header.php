<!-- Header-->
<header id="header" class="header">
    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">

            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="fa fa- user"></i>
                        <?php
                        if (!isset($_SESSION)) {
                            session_start();
                        }
                        if (empty($_SESSION['id'])) {
                            $_SESSION['msg'] = "Área restrita";
                            header("Location: login.php");
                        }
                        echo $_SESSION['nome'];
                        ?>
                    </a>

                    <a class="nav-link" href="#"><i class="fa fa -cog"></i>Configurações</a>
                    <a class="nav-link" href="sair.php"><i class="fa fa-power -off"></i>Logout</a>
                </div>
            </div>
        </div>
    </div>
</header><!-- /header -->
<!-- Header-->