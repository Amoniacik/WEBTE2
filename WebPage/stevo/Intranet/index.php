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
session_start();

include('RenderUtilities.php');

echo "    
    ";

        if(!isset($_SESSION["role"]) && !isset($_SESSION["password"]) && !isset($_SESSION["username"])) {
        echo"<br>
        <div class='container'>
             <div class='row row-centered'>
                <div class='col-sm-4 col-sm-offset-4'>
                    <div class='panel panel-default'>
                        <div class='panel-header'>
                        <h4 class='text-center'>Prihlásenie do intranetu</h4>
                        </div>
                        <div class='panel-body'>
                            <form class='form form-horizontal' action='LoginScript.php' method='post'><input type='text' name='stuLogin' class='form-control mb-2 mr-sm-2 mb-sm-0 input-sm text-center' id='inlineFormInput' placeholder='stu username' style='height: 25px;font-size: smaller;'>
                               <br> <input type='password' name='stuPassword' class='form-control input-sm text-center' id='inlineFormInputGroup' placeholder='stu password' style='height: 25px;font-size: smaller;'>    
                                    
                                <div class='form-inline text-center'>
                                <br>
                                    <input type='submit' class='form-control input-sm btn btn-primary' value='Prihlásenie'  style='height: 30px;font-size: small;'>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div>
              </div>
         </div>";
    }
    else {
        echo renderIntranetPanel();
        echo "
        <br>
        <div class='container'>
             <div class='row row-centered'>
                <div class='col-sm-4 col-sm-offset-4'>
                     <a href='LogOut.php' class='form-control input-sm btn btn-danger'  style='height: 30px;font-size: small;'>Odhlásenie</a>
                </div>
             </div>
        </div>";
    }
    echo "
</body>
</html>";
?>










