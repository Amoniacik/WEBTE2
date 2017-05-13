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
$role = $_SESSION["role"] ;

//here we need to store photos to the disc and db TODO :

if(isset($_SESSION["role"])){


    //render intranet menu
    echo renderIntranetPanel();
    // rendering of sidebar parts
    $sidebar = renderSidebarPanel(); echo $sidebar[0];echo $sidebar[1];

    echo "<br>";
    echo "<div class='container'>
        <div class='row row-centered'>
             <div class='col-sm-10 col-sm-offset-1'>
                <div class='panel panel-default'>
                    <div class='panel-header'>
                        <h2 class='text-center'>Pridanie videa</h2>
                    </div>
                <div class='panel-body'>";
    if($role >=  3) {echo "<form class='form form-horizontal' method='post' action='PridanieVidea.php'>
                        <div class='form-group'>
                            <label class='control-label col-sm-2' for='titul2'>Url:</label>
                            <div class='col-sm-10'>
                                <input type='text' class='form-control text-center' id='tit2' value='Bla' placeholder='Zadajte url videa' name='urlVidea'>
                            </div>
                        </div>
                       
                          <div class='form-group'>
                            <label class='control-label col-sm-2' for='titul2'>Nahrajte video:</label>
                            <div >
                                <label class='btn btn-default btn-file col-sm-9 '>
                                    Nahrajte video z počítača<input type='file' style='display: none;' class='form-control ' id='videoLoad'  name='urlVidea'>
                                </label>
                            </div>
                        </div>
                        <div class='form-group'>

                            <div class='col-sm-12'>
                                <input type='submit'  class='form-control btn btn-warning text-center' id='tit2' value='Uložte video' placeholder='Zadajte url videa' name='urlVidea'>
                            </div>
                        </div>
                    </form>";}
    else {echo "<h2 class='text-center'>Nemáte oprávnenie pridávať videá</h2>";}
    echo "
                </div>
            </div
        </div>
    </div>
</div>";

}

else echo "<h2 class='text-center'>You are not logged in</h2>";




?>

              
              

