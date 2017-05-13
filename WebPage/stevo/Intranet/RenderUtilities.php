<?php
require __DIR__.'/config.php';

try{
    $GLOBALS['pdo'] = new PDO("" . $dbengine . ":host=$dbhost; dbname=$dbname", $dbuser, $dbpassword);
    $GLOBALS['pdo']->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $GLOBALS['pdo']->exec("set names utf8");
}
catch(PDOException $e){
    echo $e->getMessage();
    echo "Connection to the db failed !";
}

function renderIntranetPanel(){

    return"<br>
        <div class='container'>
        <ul class='nav nav-tabs navbar-default col-sm-10' style='left: 130px;'>
              <li ><button class='w3-button w3-white w3-large' onclick='w3_open()'>&#9776;</button></li>
              <li><a href='/testovaciFile/stevo/Intranet/intranet/pedagogika.php'>Pedagogika</a></li>
              <li><a href='/testovaciFile/stevo/Intranet/intranet/doktorandi.php'>Doktorandi</a></li>
              <li><a href='/testovaciFile/stevo/Intranet/intranet/publikacie.php'>Publikácie</a></li>
              <li><a href='/testovaciFile/stevo/Intranet/intranet/sluzobne-cesty.php'>Služobné cesty</a></li>
              <li><a href='/testovaciFile/stevo/Intranet/intranet/nakupy.php'>Nákupy</a></li>
              <li><a href='/testovaciFile/stevo/Intranet/intranet/dochadzka.php'>Dochádzka</a></li>
              <li><a href='/testovaciFile/stevo/Intranet/intranet/rozdelenie-uloh.php'>Rozdelenie úloh</a></li>
            </ul>
        </div>";
}

function urlSwitchRouter(){
    $urlParts = explode("/",$_SERVER[REQUEST_URI]);
    return $urlParts[sizeof($urlParts)-1];
}


class CategoryAndCount{
    public $category;
    public $counts;
}

function retreiveDocForCategory($category){

    $categoryMenu_name = explode(".",$category);
    $sidebarPanelParts = renderSidebarPanel();
    echo $sidebarPanelParts[0];

    echo "<br><div class='container' >
            <div class='row row-centered'>
                <div class='col-sm-10 col-sm-offset-1'>
                
                <div class='panel panel-default' style='border: none!important;'>
                <div class='panel-header'><h2 class='text-center'>".ucfirst($categoryMenu_name[0])."</h2></div>
                <div class='panel-body'> 
                        <div class='list-group'>";
                        $docCategories = [];
                        //select categories first
                        try {
                            $queryToDo = "select distinct kategoria,Count(kategoria) as counts from Dokumenty where kategoria_z_menu like '%".$categoryMenu_name[0]."%' GROUP by kategoria";

                            $stmt = $GLOBALS['pdo']->query($queryToDo);
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                //we fetched categories from database
                                $catObject =  new CategoryAndCount;
                                $catObject->category = $row ["kategoria"];
                                $catObject->counts = $row ["counts"];
                                array_push( $docCategories,$catObject); //document categories

                            }
                        }
                        catch(PDOException $e){
                            echo $e->getMessage();
                            echo "Categories empty !";
                        }

                        //now for each category return documents
                        foreach ($docCategories as $docCategory) {

                          $minHeightProperty = ($docCategory->counts * 25 ) + 55;

                            echo "<div class='list-group-item justify-content-between' style='min-height:".$minHeightProperty."px'>
                                                <span id='kategoria'><strong>".$docCategory->category."<br></strong></span>";

                            try {
                                $queryToDo = "select * from Dokumenty where kategoria_z_menu like '%".$categoryMenu_name[0]."%' and kategoria like '%".$docCategory->category."%'";
                                $stmt = $GLOBALS['pdo']->query($queryToDo);
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){


                                               echo" <div class='col-sm-6'>".$row["nazov_dokumentu"]."</div>
                                                <div class='col-sm-6'>
                                                    <span>".$row["umiestnenie_na_disku"]."</span>
                                                    <span class='badge badge-default badge-pill'>Príloha</span>
                                                    <span class='label label-warning pull-right'>Editovat</span>
                                                    <span class='label label-danger pull-right' style='position: relative;right: 7px;'>Zmazat</span><br>
                                                </div>";
                                }
                            }
                            catch(PDOException $e){
                                echo $e->getMessage();
                                echo "RESULT SET ERROR !";
                            }
                            echo"</div>";
                        }
                        unset($docCategory);

                                   echo "<div class='list-group-item justify-content-between'  style='min-height: 80px'>
                                         <h5 class='mb-1 text-center '>
                                             <button type='button' class='btn btn-info btn-sm text-center' data-toggle='modal' data-target='#myModalDoc'>Vytvorte nový dokument</button>
                                             <button type='button' class='btn btn-info btn-sm text-center' data-toggle='modal' data-target='#myModalCat'>Vytvorte novú kategóriu </button>
                                        </h5>
                                        </div>
                         </div>
                </div>
                 </div>
                 
             </div>
        </div>
   </div>
</div>";

          echo $sidebarPanelParts[1];


          echo "<input id=CatToPost type='hidden' value='".$categoryMenu_name[0]."'>";

echo "
<div id='myModalDoc' class='modal fade' role='dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title text-center'>Vytvorte nový dokument</h4>
            </div>
            <div class='modal-body'>
                   <div class='form'>
                       <div class='form-group'>
                           <input class='form-control text-center' id='focusedInput' type='text' placeholder='Zadajte názov,url alebo popis dokumentu'>
                       </div>
                           <div class='form-group text-center'>
                               <select class='form-control' style='text-align-last:center;padding-right: 1px;' >
                                   <option selected disabled >Zvolťe kategóriu</option>";
                                    foreach ($docCategories as $docCategory){
                                       echo "<option>".$docCategory->category."</option>";
                                    }
                               unset($docCategory);
                               echo "</select>
                            </div>
                           <div class='form-group'>
                               <span class='text-center'>Vyberte typ súboru</span>
                               <div id='tab' class='btn-group text-center' data-toggle='buttons'>
                                   <a href='#prices' class='btn btn-default active text-center ' data-toggle='tab'>
                                       <input type='radio'>URL odkaz</a>
                                   <a href='#features' class='btn btn-default text-center ' data-toggle='tab'>
                                       <input type='radio'>File</a>
                                   <a href='#requests' class='btn btn-default text-center' data-toggle='tab'>
                                       <input type='radio'>Text</a>
                                    <br><br>
                               </div>
                               <div class='tab-content '>
                           <div class='tab-pane active' id='prices'>
                               <div class='form-group'>
                                   <input class='tab-pane active text-center form-control' id='focusedInputDoc' type='text' placeholder='Zadajte url'>
                               </div>
                           </div>
                           <div class='tab-pane' id='features'>
                               <div class='form-group'>
                                   <input class='btn btn-default text-center' id='focusedInputDoc2' type='file' placeholder='Nahrajte obsah dokumentu'>
                               </div>
                           </div>
                           <div class='tab-pane' id='requests'>
                              <div class='form-group'>
                                  <textarea class='form-control test-center' rows='5' id='comment'></textarea>
                              </div>
                           </div>
                       </div>
                           </div>
                       </div>
            </div>
        </div>
            <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal' >Zatvoriť</button>
                    <input type='submit' class='btn btn-default' placeholder='Uložiť' data-dismiss='modal' onclick='storeDoc()' >
            </div>
    </div>
</div>";


    echo "
    <div id='myModalCat' class='modal fade' role='dialog'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                <h4 class='modal-title text-center'>Vytvorte novú kategóriu</h4>
            </div>
            <div class='modal-body'>
                   <div class='form'>
                       <div class='form-group'>
                           <input class='form-control text-center' id='categoryInput' type='text' placeholder='Zadajte názov kategórie'>
                       </div>";
    echo "                       
                    </div>
            </div>
        </div>
            <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Zatvoriť</button>
                    <input type='submit' class='btn btn-default' placeholder='Uložiť' data-dismiss='modal' onclick='storeCat()' >
            </div>
    </div>
</div>";






}

function renderSidebarPanel(){

    $parts = [];

    array_push($parts,"    
    <div class='w3-sidebar w3-bar-block w3-animate-left' style='display:none;z-index:5;top: 70px;height: 500px;width: 210px;' id='mySidebar'>
      <button class='w3-bar-item w3-button w3-large' onclick='w3_close()'>Close &times;</button>
      <p style='position: relative;margin: 0px 10px 10px;'>Správa používateľov</p>
      <ul>
        <li><a href='/final/intranet/EditovanieProfilu.php' class='w3-bar-item w3-button'>Úprava profilu</a> </li>
       </ul>
     <p style='position: relative;margin: 0px 10px 10px;'>Správa obsahu hlavnej stránky</p>
       <ul>
         <li><a href='/final/intranet/PridanieAktuality.php' class='w3-bar-item w3-button'>Pridanie aktuality</a> </li>
         <li><a href='/final/intranet/PridanieFotiek.php' class='w3-bar-item w3-button'>Pridanie fotiek</a> </li>
         <li><a href='/final/intranet/PridanieVidea.php' class='w3-bar-item w3-button'>Pridanie videa</a> </li>
       </ul>
     
      
    </div>
    <!-- Page Content -->
        <div class='w3-overlay w3-animate-opacity' onclick='w3_close()' style='cursor:pointer' id='myOverlay'></div>  
        <div>
          <div class='w3-container'>");

      //here goes content of page -needs to be rendered within  sidebar $parts

    array_push($parts,"</div>
        </div>        
        <script>
        function w3_open() {
            document.getElementById('mySidebar').style.display = 'block';
            document.getElementById('myOverlay').style.display = 'block';
        }
        function w3_close() {
            document.getElementById('mySidebar').style.display = 'none';
            document.getElementById('myOverlay').style.display = 'none';
        }
        </script>");

        return $parts;



}











?>