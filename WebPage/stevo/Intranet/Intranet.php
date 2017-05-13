<html>
<head>
    <meta charset="UTF-8">
    <title>Intranet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="intranet/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="intranet/css/bootstrap-theme.css" type="text/css"/>
    <link rel="stylesheet" href="intranet/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
</body>
</html>



    <?php

    require ("RenderUtilities.php");
    session_start();

    if (isset($_SESSION["username"]) &&
        isset($_SESSION["password"]) )
    {
        //render intranet menu,and sidebar panel
        echo renderIntranetPanel(); $panel =  renderSidebarPanel();  echo $panel[0].$panel[1];
        echo "<br>";
        echo "<div class='container'>
                 <div class='row row-centered'>
                    <div class='col-sm-10 col-sm-offset-1'>
                        <div class='panel panel-default'>
                            <div class='panel-header'>
                                <br><h1 class='text-center'>Vitajte v intranete</h1>
                            </div>
                            <div class='panel-body'>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <h4 class='text-center'>Intranet umožnuje spravovanie obsahu hlavnej stránky a správu dokumentov pre pracovníkov ÚAM FEI STU.</h4>
                            </div>
                        </div>
                    </div>
               </div>
            </div> ";

    }
    else{
        //here should go default text,content,whatever if user is not logged in
        echo  "<div>  You are not logged in !  </div>";
    }
    ?>





