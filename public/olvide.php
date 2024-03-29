<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Olvide CLINICALSERV</title>



    <!-- Bootstrap Core CSS -->

    <link href="librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- MetisMenu CSS -->

    <link href="librerias/metisMenu/metisMenu.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="public/css/sb-admin-2.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="librerias/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->



</head>



<body>



    <div class="container">

        <div class="row">

            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title">Recuperar Contraseña</h3>

                    </div>

                    <div class="panel-body">

                        <form role="form" action="index.php?ruta=login&accion=olvide" method="post">

                            <fieldset>

                                <div class="form-group">

                                    <input class="form-control" type="email" name="email" placeholder="Ingrese Correo" required>

                                </div>

                                <!-- Change this to a button or input when using this as a form -->

                                <button class="btn btn-lg btn-success btn-block" name="guardar" type="submit">Recuperar</button>



                                <a href="index.php?ruta=login" class="btn btn-lg btn-default btn-block">Volver</a>

                                <center><h5 class="msj-info"><?php echo $msj; ?></h5></center>

                            </fieldset>

                        

                            

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- jQuery -->

    <script src="librerias/jquery/jquery.min.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="librerias/bootstrap/js/bootstrap.min.js"></script>



    <!-- Metis Menu Plugin JavaScript -->

    <script src="librerias/metisMenu/metisMenu.min.js"></script>



    <!-- Custom Theme JavaScript -->

    <script src="public/js/sb-admin-2.js"></script>



</body>



</html>

                     