<html>
<head>
    <meta charset="UTF-8">
    <title>Dochadzka</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
</body>
</html>

<?php

include('../RenderUtilities.php');
require_once('methods.php');
session_start();

if (isset($_SESSION["username"]) &&  isset($_SESSION["password"]) )
{
    echo renderIntranetPanel(); //render intranet menu
    $sidebar = renderSidebarPanel();echo $sidebar[0];echo $sidebar[1];   // rendering of sidebar parts
    echo "
<br>
<div class='container'>
    <div class='panel panel-default'>
        <div class='panel-header'>
            <div class='text-center' id='header'><h2>Evidencia Dochádzky</h2></div>
        </div>

        <div class='panel-body text-center'>
            <div class='panel-body text-center'>
                <form id='dataform' class='form-inline' action='index.php' method='post'>
                    <div class='form-group'>
                        Mesiac
                        <select class='form-control' name='mesiac' id='mesiac'>
                            <option value='1' >Január</option>
                            <option value='2'>Február</option>
                            <option value='3'>Marec</option>
                            <option value='4'>Apríl</option>
                            <option value='5'>Máj</option>
                            <option value='6'>Jún</option>
                            <option value='7'>Júl</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>Október</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        Rok
                        <select class='form-control' name='rok' id='rok'>
                            <option value='2015'>2015</option>
                            <option value='2016'>2016</option>
                            <option value='2017'>2017</option>
                        </select>
                    </div>
                    <button id='showBtn' type='submit' class='btn btn-primary'>Zobraziť</button>
                </form>
            </div>
        </div>
    </div>";

    if (isset($_POST["rok"]) && isset($_POST["mesiac"]))
        build_table($_POST["rok"], $_POST["mesiac"]);
    
    echo "</div>";






}
else{

    //here should go default text,content,whatever if user is not logged in
    echo
    "<div>
       You are not logged in !
     </div>";
}

?>
















