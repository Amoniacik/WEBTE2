<html>
<head>
    <meta charset="UTF-8">
    <title>Intranet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=u0xubz8k7kfuhcb83vi2fxeckrfnpaa6yqvir2xl08vjfp30'></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</head>
<body>
</body>
</html>

<?php

include('../RenderUtilities.php');
session_start();

if (isset($_SESSION["username"]) &&  isset($_SESSION["password"]) )
{
    //render intranet menu
    echo renderIntranetPanel();

    // router to render related sub-page,returns name of that page
    $page = urlSwitchRouter();
    renderIntranetPage($page);
    $sidebar = renderSidebarPanel();echo $sidebar[0]; echo $sidebar[1];

    echo "<div class='container'>
            <div class='row row-centered'>
                <div class='col-sm-10 col-sm-offset-1'>
                    <div class='panel panel-default'>
                        <div class='panel-header'>
                            <h2 class='text-center'>Editovanie nákupov</h2>
                        </div>
                        <div class='panel-body'>";
    echo "               
                        <form class='form form-horizontal' method='post'>
                            <div class='form-group'>
                                <div class='col-sm-12'>
                                    <textarea id='mytextarea' cols='35' rows='14'>Hello, World!</textarea>
                                </div>
                            </div> 
                         <div class='form-group'>
                                <div class='col-sm-12'>
                                    <input type='submit' class='form-control btn btn-warning' value='Uložte nákupy'>
                                </div>
                            </div> 
                        
                        
                        </form>       
                               
                               
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



