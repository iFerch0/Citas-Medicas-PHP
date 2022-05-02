<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CLINICALSERV - Unicor</title>

    <!-- Bootstrap Core CSS -->
    <link href="librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Table CSS -->
    <link href="librerias/bootstrap-table/bootstrap-table.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="librerias/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="librerias/select2/select2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/css/sb-admin-2.css" rel="stylesheet">
    <link href="public/css/estilo.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="librerias/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="librerias/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="librerias/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="librerias/bootstrap-table/bootstrap-table.js" ></script>

    <!-- para exportar la tabla -->
    <script type="text/javascript" src="librerias/bootstrap-table/extensions/export/bootstrap-table-export.js" ></script>
    <script type="text/javascript" src="librerias/bootstrap-table/extensions/export/tableExport/libs/FileSaver/FileSaver.min.js"></script>
    <!-- para Excel -->
    <script type="text/javascript" src="librerias/bootstrap-table/extensions/export/tableExport/libs/js-xlsx/xlsx.core.min.js"></script>
    <!-- para PDF -->
    <script type="text/javascript" src="librerias/bootstrap-table/extensions/export/tableExport/libs/jsPDF/jspdf.min.js" ></script>
    <script type="text/javascript" src="librerias/bootstrap-table/extensions/export/tableExport/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <!-- para PNG -->
    <script type="text/javascript" src="librerias/bootstrap-table/extensions/export/tableExport/libs/html2canvas/html2canvas.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap-table/extensions/export/tableExport/tableExport.js"></script>

    <!-- para Traducir Bootstrap-Table a español-->
    <script src="librerias/bootstrap-table/locale/bootstrap-table-es-ES.js"></script>
    
</head>

<body>

    <div id="wrapper">
    
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CLINICALSERV</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?ruta=usuarios&accion=cuenta"><i class="fa fa-user fa-fw"></i> Mi cuenta</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php?ruta=login&accion=salir"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

    <?php require 'public/menu.php'; ?>
    <!-- Page Content -->
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php require 'vistas/'.$view.'.php';?> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Metis Menu Plugin JavaScript -->
    <script src="librerias/metisMenu/metisMenu.min.js"></script>

    <!-- Metis Select2 Plugin JavaScript -->
    <script src="librerias/select2/select2.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/js/sb-admin-2.js"></script>

    <script>
        $(document).ready(function() {
            $('select').select2();
        });
    </script>

</body>

</html>
    