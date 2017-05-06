<html>
<head>
    <meta charset="UTF-8">
    <title>Intranet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
</body>
</html>


<?php
/**
 * if we are logged in,display default page for intranet
 */

require ("RenderUtilities.php");
session_start();


if (isset($_SESSION["username"]) &&
    isset($_SESSION["password"]) )
    {
        //render intranet menu
        echo renderIntranetPanel();

        // router to render related sub-page,returns name of that page
        //urlSwitchRouter();
        renderIntranetMenuItem();





}
else{

    //here should go default text,content,whatever if user is not logged in
    echo
    "<div>
       You are not logged in !
     </div>";

}

?>





