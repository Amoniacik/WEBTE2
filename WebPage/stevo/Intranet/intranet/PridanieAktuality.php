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

//here we need to store photos to the disc and db TODO :


    $role = $_SESSION["role"];


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
                            <h2 class='text-center'>Pridanie aktuality</h2>
                        </div>
                        <div class='panel-body'>";
    if ($role >= 3) {
        echo "               
                        <form class='form form-horizontal' method='post'>
                            <div class='form-group'>
                                <label class='control-label col-sm-2' for='autor'>Autor:</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='autor' value='' placeholder='Zadajte autora' name='autor'>
                                </div>
                            </div>                           
                            <div class='form-group'>
                                <label class='control-label col-sm-2' for='nazov'>Názov:</label>
                                <div class='col-sm-10'>
                                    <input type='text' class='form-control' id='nazov' value='Bla' placeholder='Zadajte názov' name='nazov'>
                                </div>
                            </div>  
                             <div class='form-group'>
                                <label class='control-label col-sm-2' for='titul2'>Jazyk:</label>
                                <div class='col-sm-5'>
                                      <div id='languagesEN' class='text-center'>
                                                   <label class='checkbox-inline'><input type='checkbox' name='language' value=''>Angličtina</label>         
                                      </div>     
                                </div>                              
                                  <div class='col-sm-5'>
                                        <div id='languageSK' class='text-center'>
                                                   <label class='checkbox-inline'><input type='checkbox' name='language' value=''>Slovenčina</label>
                                        </div>                                    
                                  </div>
                            </div>                           
                             <div class='form-group'>
                                <label class='control-label col-sm-2' for='obsahEN'>Obsah:</label>
                                <div class='col-sm-5'>
                                     <div> 
                                        <textarea name='obsahEN' id='obsahEN' cols='35' rows='8'></textarea>
                                      </div>
                                </div>                               
                                 <div class='col-sm-5'>
                                     <div> 
                                        <textarea name='obsahSK' id='obsahSK' cols='35' rows='8'></textarea>
                                      </div>
                                 </div>                 
                              </div>                            
                             <div class='form-group'>
                                <label class='control-label col-sm-2' for='titul2'>Kategória:</label>
                                <div class='col-sm-10'>
                                    <select name='kategoria' class='dropdown  form-control'>                               
                                        <option value='propagacia'>Propagácia</option>
                                        <option value='oznamy'>Oznamy</option>
                                        <option value='zo_zivota_ustavu'>Zo života ústavu</option>
                                    </select>
                                </div>
                            </div>
                             <div class='form-group'>
                                <label class='control-label col-sm-2' for='titul2'>Aktívna do :</label>
                                <div class='col-sm-10'>
                                    <input type='date' required class='form-control' id='aktivna_do' value='Bla' placeholder='Zadajte dátum - [pollyfill missing]' name='aktivna_do'>
                                </div>
                            </div>
                             <div class='form-group'>
                                <div class='col-sm-12'>
                                    <input type='submit' class='form-control btn btn-warning' id='submitBtn' value='Uložiť aktualitu' name='storeAct'>
                                </div>
                            </div>                            
                        </form>";
    } else echo "<div><br><br><br><br><h4 class='text-center'>Nemáte oprávnenie</h4></div>
                    </div>
                </div
            </div>
        </div>
    </div>";
}
else echo "<h2 class='text-center'>You are not logged in</h2>";



?>






