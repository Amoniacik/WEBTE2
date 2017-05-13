<?php
require_once('methods.php');
?>
<!DOCTYPE html>
<html lang="sk">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <title>Evidencia Dochádzky</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    </head>
    <body>

        <?php
            include('../RenderUtilities.php');
            echo renderIntranetPanel();
        ?>

        <br>
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-header">
                    <div class="text-center" id="header"><h2>Evidencia Dochádzky</h2></div>
                </div>
            </div>
        </div>
        <div class="panel-body text-center">
            <div class="panel-body text-center">
                <form id="dataform" class="form-inline" action="index.php" method="post">
                    <div class="form-group">
                        Mesiac
                        <select class="form-control" name="mesiac" id="mesiac">
                            <option value="1" >Január</option>
                            <option value="2">Február</option>
                            <option value="3">Marec</option>
                            <option value="4">Apríl</option>
                            <option value="5">Máj</option>
                            <option value="6">Jún</option>
                            <option value="7">Júl</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">Október</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="form-group">
                        Rok
                        <select class="form-control" name="rok" id="rok">
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                    <button id="showBtn" type="submit" class="btn btn-primary">Zobraziť</button>
                </form>
            </div>
            <?php
            if (isset($_POST["rok"]) && isset($_POST["mesiac"]))
                build_table($_POST["rok"], $_POST["mesiac"])
                ?>
        </div>
        <footer>
            <div class="panel panel-info text-center">
                <div class="panel-body">© Pašek Ľubomír 2017</div>
            </div>
        </footer>
    </body>
</html>