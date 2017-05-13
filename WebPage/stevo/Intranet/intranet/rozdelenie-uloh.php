<html>
<head>
    <meta charset="UTF-8">
    <title>Intranet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        td{
            min-width:140px;
        }
    </style>
</head>
<body>


</body>
</html>

<?php

include('../RenderUtilities.php');
session_start();

if (isset($_SESSION["username"]) &&  isset($_SESSION["password"]) &&  isset($_SESSION["role"]) )
{

    echo renderIntranetPanel(); //render sidebar
    $sidebar = renderSidebarPanel(); echo $sidebar[0];  echo $sidebar[1];

    echo "<br>";
    echo "<div class='container'>
        <div class='row row-centered'>
             <div class='col-sm-10 col-sm-offset-1'>
                <div class='panel panel-default'>
                    <div class='panel-header'>
                        <h2 class='text-center'>Rozdelenie úloh</h2>
                    </div>
                <div class='panel-body'>               
                <table class='table table-striped table-bordered table-hover'>
                    <thead>
                        <td>Lucia</td>
                        <td>Monika</td>
                        <td>Tomáš</td>
                        <td>Ľubo</td>
                        <td>Števo</td> 
                    </thead>
                    <tbody>
                     <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>Titulná strana</td>
                            <td>-</td>
                            <td>-</td> 
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>                        
                        </tr>
                         <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>Footer</td>
                            <td>-</td>
                            <td>-</td> 
                        </tr>
                         
                         <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td> 
                        </tr>
                         <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td> 
                        </tr>
                         <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td> 
                        </tr>
                         <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td> 
                        </tr>
                         <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Databáza</td> 
                        </tr>
                         <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Intranet</td> 
                        </tr>
                      
                    
                    
                    </tbody>
                       
                        
                        
                   
                
                </table>
                
                
                
                
                
                
                </div>               
                ";



}
else{

    //here should go default text,content,whatever if user is not logged in
    echo
    "<div>
       You are not logged in !
     </div>";

}
?>

<br>
<div class="container">


    <div class="row row-centered">

        <div class="colu">

    </div>


</div>








