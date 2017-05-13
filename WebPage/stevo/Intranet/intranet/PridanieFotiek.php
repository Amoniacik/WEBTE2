<html>
<head>
    <meta charset="UTF-8">
    <title>Intranet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
</body>
</html>


<?php

include('../RenderUtilities.php');
include('../UserDetails.php');
include('../User.php');
session_start();




if(isset($_SESSION["role"])) {

    $role = $_SESSION["role"];

    //here we need to store photos to the disc and db TODO :


    //render intranet menu
    echo renderIntranetPanel();
    // rendering of sidebar parts
    $sidebar = renderSidebarPanel();
    echo $sidebar[0];
    echo $sidebar[1];

    echo "<br>";
    echo "<div class='container'>
    <div class='row row-centered'>
        <div class='col-sm-10 col-sm-offset-1'>
            <div class='panel panel-default'>
                <div class='panel-header'>
                    <h2 class='text-center'>Pridanie fotiek</h2>
                </div>
                <div class='panel-body'>";

    if ($role >= 3) {

        echo "         <form class='form form-horizontal' action='PridanieFotiek.php' method='post'>
                        <div class='form-group'>
                            <label class='control-label col-sm-2' for='titul2'>Vyberte fotky:</label>
                            <div >
                                <label class='btn btn-default btn-file col-sm-9 '>
                                    Nahrajte viac fotiek z počítača<input type='file' multiple  style='display: none;' class='form-control ' id='fotky'  name='photos'>
                                </label>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='col-sm-12'>
                                <input type='submit'  class='btn btn-warning form-control' id='fotkys'  name='photos'>
                            </div>
                        </div>
                    </form>";

    } else echo "<h4 class='text-center'>Nemáte oprávnenia pridávať fotky</h4>";
    echo "       
                    </div>
                </div
            </div>
        </div>
    </div>
    ";
}

else echo "<h2 class='text-center'>You are not logged in</h2>";





?>



