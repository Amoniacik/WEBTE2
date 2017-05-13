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






if(isset($_SESSION["role"])){

 $role = 5 ;$_SESSION["role"];

 // find details about user TESTING
 $username = "xmajiros";//$_SESSION["username"];

    //render intranet menu
    echo renderIntranetPanel();

    // rendering of sidebar parts
    $sidebar = renderSidebarPanel(); echo $sidebar[0];echo $sidebar[1];


if(isset($_POST["name"]) &&  isset($_POST["surname"])  ) {

    $toUpdate = new User;
    $toUpdate->name = $_POST["name"];
    $toUpdate->surname = $_POST["surname"];
    $toUpdate->title1 = $_POST["title1"];
    $toUpdate->title2 = $_POST["title2"];
    $toUpdate->ldapLogin = $_POST["ldapLogin"];
    $toUpdate->photo = $_POST["photo"];
    $toUpdate->room = $_POST["room"];
    $toUpdate->phone = $_POST["phone"];
    $toUpdate->department = $_POST["department"];
    $toUpdate->staffRole = $_POST["staffRole"];
    $toUpdate->function = $_POST["function"];
    $toUpdate->UserRole = $_POST["UserRole"];
    $toUpdate->HrRole = $_POST["HrRole"];
    $toUpdate->ReporterRole = $_POST["ReporterRole"];
    $toUpdate->EditorRole = $_POST["EditorRole"];
    $toUpdate->AdminRole = $_POST["AdminRole"];

    print_r($toUpdate);
    //store user to DB -- do update - TODO : need to write function
    //do update,if it fails,do insert

}
 if(isset($_POST["ThIsIsAdMiNNLoGedOn"])){

     $username= $_POST["QueryName"].",".$_POST["QuerySurName"];
     $userDetails = getUserDetails($username,"lookupByNameSurname");  // if we call it with string as second parameter we are looking up details by name an surname
 }
 else {
     $userDetails = getUserDetails($username,"default"); } // if we call it with

    //if admin is logged in we display this string
    $userSearchBar = "<form class='form form-horizontal' action='EditovanieProfilu.php' method='post'>
                                 <div class='form-group'>
                                     <label class='control-label col-sm-2' for='adminQueryName'>Načítaj profil :</label>
                                     <div class='col-sm-4'>
                                            <input type='text' class='form-control' id='QueryName' placeholder='Enter name' name='QueryName'>
                                     </div>
                                      <div class='col-sm-3'>
                                            <input type='text' class='form-control' id='QuerySurName' placeholder='Enter surname' name='QuerySurName'>
                                     </div>
                                      <div class='col-sm-3'>
                                            <input type='hidden' name='ThIsIsAdMiNNLoGedOn' value='1' '>
                                     </div>
                                     <div class='col-sm-3'>
                                            <input type='submit' class='form-control' id='adminQueryName' value='Načítaj profil' name='email'>
                                     </div>
                                 </div>
                             </form>";

    echo "<br>";
    echo "<div class='container row row-centered'>
            <div class='row row-centered'>
                <div class='col-sm-10 col-sm-offset-2''> 
                    <div class='panel panel-default' style='border: none!important;'> <div class='panel-header'><h2 class='text-center'>Editovanie profilu</h2>";
                    if ($role == 5) echo "<h3 class='text-center'>Admin vie pridávať a upravovať profily ostatných používateľov</h3>";
                    else echo "";
                    echo"</div><div class='panel-body'>";
                    if ($role == 5) echo $userSearchBar;
                    else echo "";
                    echo "
                            <form action='EditovanieProfilu.php' method='post'>
                            <div class='form form-horizontal' >       
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='name'>Meno:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='name' value='" . $userDetails->name . "' placeholder='Zadajte meno' name='name'>
                                        </div>
                                  </div>
                                   <div class='form-group'>
                                        <label class='control-label col-sm-2' for='surname'>Priezvisko:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='surname' value='" . $userDetails->surname . "' placeholder='Zadajte priezvisko' name='surname'>
                                        </div>
                                  </div>
                                   <div class='form-group'>
                                        <label class='control-label col-sm-2' for='rola'>Rola";
                                        if ($role != 5) echo " READONLY "; echo "</label>
                                        <div class='col-sm-10'>
                                            <div id='roles'>
                                               <label class='checkbox-inline'><input type='checkbox' name='UserRole' value='isUsr' ";
                                                if ($role != 5) echo "readonly"; echo ">User</label>
                                               <label class='checkbox-inline'><input type='checkbox' name='HrRole' value='isHr' ";
                                                if ($role != 5) echo "readonly"; echo ">HR</label>
                                               <label class='checkbox-inline'><input type='checkbox' name='ReporterRole' value='isRp'";
                                                if ($role != 5) echo "readonly"; echo ">Reporter</label> 
                                               <label class='checkbox-inline'><input type='checkbox' name='EditorRole' value='isEd' ";
                                                if ($role != 5) echo "readonly"; echo ">Editor</label> 
                                               <label class='checkbox-inline'><input type='checkbox' name='AdminRole' value='IsAd' ";
                                                if ($role != 5) echo "readonly"; echo ">Admin</label> 
                                            </div>
                                  </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='titul1'>Titul 1:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='titul1' value='" . $userDetails->title1 . "' placeholder='Zadajte prvý titul' name='title1'>
                                        </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='titul2'>Titul 2:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='titul2' value='" . $userDetails->title2 . "' placeholder='Zadajte druhý titul' name='title2'>
                                        </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='ldapLogin'>LDAP login:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='ldapLogin' value='" . $userDetails->ldapLogin . "' placeholder='Zadajte LDAP login' name='ldapLogin'>
                                        </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='photo'>Photo:</label>
                                        <div class='col-sm-10'>
                                             <input type='file' class='form-control' id='photo' value='" . $userDetails->photo . "' placeholder='Zadajte fotku' name='photo'>
                                        </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='room'>Kancelária:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='room' value='" . $userDetails->room . "'  placeholder='Zadajte číslo kancelárie' name='room'>
                                        </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='phone'>Klapka:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='phone' value='" . $userDetails->phone . "'  placeholder='Zadajte klapku' name='phone'>
                                        </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='department'>Oddelenie:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='department' value='" . $userDetails->department . "' placeholder='Zadajte oddelenie' name='department'>
                                        </div>
                                  </div> 
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='staffRole'>Pozícia:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='staffRole' value='" . $userDetails->staffRole . "' placeholder='Zadajte pozíciu' name='staffRole'>
                                        </div>
                                  </div>
                                    <div class='form-group'>
                                        <label class='control-label col-sm-2' for='function'>Funkcia:</label>
                                        <div class='col-sm-10'>
                                             <input type='text' class='form-control' id='function' value='" . $userDetails->function . "' placeholder='Zadajte funkciu' name='function'>
                                        </div>
                                  </div>
                                    <div class='form-group'>                                       
                                        <div class='col-sm-12'>
                                             <input type='submit' class='btn btn-warning form-control' id='doUpdateButton' value='Ulož zmeny' >
                                        </div>
                                    </div>                           
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
     </div> ";

}
else
     echo "<h2 class='text-center'>You are not logged in ! </h2>";
?>














