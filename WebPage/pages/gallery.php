<!DOCTYPE html>
<!--
Template Name: Education Time
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ÚAM FEI</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../layout/styles/layout.css" type="text/css" />
    <script type="text/javascript" src="../layout/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="../scripts/tables.js"></script>
    <script type="text/javascript" src="../layout/scripts/slimbox2.js"></script>
    <link rel="stylesheet" href="../layout/styles/slimbox2.css" type="text/css" media="screen" />
    <!-- liteAccordion is Homepage Only -->
    <link rel="stylesheet" href="../layout/scripts/liteaccordion-v2.2/css/liteaccordion.css" type="text/css" />
</head>
<body>
<div id="top" onload="init()">
    <div class="wrapper row4">
        <h2>Fotogaléria</h2>
        <script type="text/javascript">
            function show(cls) {
                if ($("." + cls).css('display') == "block"){
                    $("." + cls).css("display", "none");
                }else{
                    $("." + cls).css("display", "block");
                }
            }
        </script>
        <?php

            require "gallery/folder.php";

            $directories = glob("../images" . '/*' , GLOB_ONLYDIR);
            //print_r($directories);

            for($i=0; $i<count($directories); $i++){
                $a=new Folder($directories[$i]);

                $folder=$a->getFiles();

                $cls= $a->getClass();

                $name=explode("/",$directories[$i]);
                $name=ucfirst(strtolower($name[count($name)-1]));

                echo "<h3 onclick='show(\"$cls\")'><img src='../layout/styles/images/folder.png'/><br>$name</h3>";
                echo "$folder<br><br><hr>";
            }
        ?>
    </div>
</div>
</body>
</html>