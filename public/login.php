
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
    <title>CLINICASERV - LOGIN</title>


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
<center>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
			   <div class="login-panel panel panel-default">
                    
					
						
					
                    <div class="panel-body">

                        <form role="form" action="index.php?ruta=login&accion=entrar" method="post">
						<div class="panel-default">
						
						<img class="login-principal" src=../img/login3.png>

						</div>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="usuario" placeholder="Usuario" required autofocus >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Clave" required>
                                </div>
                                <div class="form-group">
                                    <p><a class="lost-password" href="index.php?ruta=login&accion=olvide">Recordar clave</a></p>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" type="submit">GO!</button>

                                <a href="index.php?ruta=login&accion=registro" class="btn btn-lg btn-register btn-block">Registrate</a>
                                <center><h5 class="msj-info"><?php if(isset($error)){echo $error;} ?></h5></center>
                            </fieldset>
                        
                            
                        </form>
                    </div>
                </div>
            </div>
        
    </div>
	</center>

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