<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 5/6/2017
 * Time: 2:42 PM
 */

// TODO :  store it to disc,the make reference in DB  open connection to db and store file,url or document to DB,or folder from POST request ....


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


        if(isset($_POST["file"])&& isset($_POST["nazov"])){

        // store doc
            try {
              //  $forInsert = "INSERT INTO Dokumenty (kategoria_z_menu,kategoria,) VALUES (".$idPracovnika.",".$idTypuNepritomnosti.","."'".  $denforinsert."'".");";
               // $request = $pdo->exec($forInsert);

            }
            catch(PDOException $es){
                echo $es->getMessage();
                echo " Failed to update";
                $updateFail = true;
            }





         }


        if(isset($_POST["categoryName"])&& isset($_POST["kategoria_z_menu"])){

        // store Category
            $katMenu = strval($_POST["kategoria_z_menu"]);
            $categoryName = strval($_POST["categoryName"]);

            echo "katmenu : ". $katMenu->kategoria_z_menu;
            echo "   categoryName : ".$categoryName;

            try {
                $forInsert = "INSERT INTO Dokumenty (kategoria_z_menu,kategoria) VALUES ('".$katMenu."','".$categoryName."');";
                echo $forInsert;
               // $request = $pdo->exec($forInsert);

            }
            catch(PDOException $es){
                echo $es->getMessage();
                echo " Failed to update";
                $updateFail = true;
            }




        }





?>