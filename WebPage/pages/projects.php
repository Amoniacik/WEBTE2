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
<body onload="init()">
<div id="top">
    <article class="wrapper row4">
        <?php
        //    error_reporting(E_ALL);
        //    ini_set('display_errors', 'on');

        function view()
        {
            $ch = curl_init('http://is.stuba.sk/pracoviste/projekty.pl');


            $data = array(
                'id' => 30,
                'lang' => 'sk'

            );

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            $result = curl_exec($ch);
            curl_close($ch);

            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($result);
            $xPath = new DOMXPath($doc);

            $tableRows = $xPath->query('//html/body/div/div/div/table/tbody/tr');

            $table="<table>";

            $kega="<table class='projects'><tr><th>Názov</th><th>Od</th><th class='presort'>Do</th><th>Druh</th><th>Garant</th><th>Pracovisko</th></tr>";
            $vega="<table class='projects'><tr><th>Názov</th><th>Od</th><th class='presort'>Do</th><th>Druh</th><th>Garant</th><th>Pracovisko</th></tr>";
            $apvv="<table class='projects'><tr><th>Názov</th><th>Od</th><th class='presort'>Do</th><th>Druh</th><th>Garant</th><th>Pracovisko</th></tr>";
            $inyDom="<table class='projects'><tr><th>Názov</th><th>Od</th><th class='presort'>Do</th><th>Druh</th><th>Garant</th><th>Pracovisko</th></tr>";//-- Iný domáci --
            $inyMedzi="<table class='projects'><tr><th>Názov</th><th>Od</th><th class='presort'>Do</th><th>Druh</th><th>Garant</th><th>Pracovisko</th></tr>";//-- Iný medzinárodný --

            for($i=0; $i<$tableRows->length; $i++){
                if($tableRows[$i]->childNodes[4]->nodeValue=="KEGA" && $tableRows[$i]->childNodes[6]->nodeValue=="ÚAM FEI"
                    && ($tableRows[$i]->childNodes[0]->childNodes[0]->childNodes[0]->attributes[0]->nodeValue=="/img.pl?unid=151053")){


                    $kega.="<tr>";
                    for($j=1; $j<$tableRows[$i]->childNodes->length; $j++){
                        $kega.="<td>" . $tableRows[$i]->childNodes[$j]->nodeValue . "</td>";
                    }
                    $kega.="</tr>";
                }

                if($tableRows[$i]->childNodes[4]->nodeValue=="VEGA" && $tableRows[$i]->childNodes[6]->nodeValue=="ÚAM FEI"
                    && ($tableRows[$i]->childNodes[0]->childNodes[0]->childNodes[0]->attributes[0]->nodeValue=="/img.pl?unid=151053")){
                    $vega.="<tr>";

//                echo $tableRows[$i]->childNodes[1]->childNodes[0]->childNodes[0]->nodeValue . '<br>';
                    for($j=1; $j<$tableRows[$i]->childNodes->length; $j++){

                        $vega.="<td>" . $tableRows[$i]->childNodes[$j]->nodeValue . "</td>";
                    }
                    $vega.="</tr>";
                }

                if($tableRows[$i]->childNodes[4]->nodeValue=="APVV" && $tableRows[$i]->childNodes[6]->nodeValue=="ÚAM FEI"
                    && ($tableRows[$i]->childNodes[0]->childNodes[0]->childNodes[0]->attributes[0]->nodeValue=="/img.pl?unid=151053")){
                    $apvv.="<tr>";

//                echo var_dump($tableRows[$i]->childNodes[1]->childNodes[0]->childNodes[0]->attributes) . '<br>';
                    for($j=1; $j<$tableRows[$i]->childNodes->length; $j++){
                        $apvv.="<td>" . $tableRows[$i]->childNodes[$j]->nodeValue . "</td>";
                    }
                    $apvv.="</tr>";
                }

                if($tableRows[$i]->childNodes[4]->nodeValue=="-- Iný domáci --" && $tableRows[$i]->childNodes[6]->nodeValue=="ÚAM FEI"
                    && ($tableRows[$i]->childNodes[0]->childNodes[0]->childNodes[0]->attributes[0]->nodeValue=="/img.pl?unid=151053")){
                    $inyDom.="<tr>";

//                echo var_dump($tableRows[$i]->childNodes[1]->childNodes[0]->childNodes[0]->attributes[0]) . '<br>';
                    for($j=1; $j<$tableRows[$i]->childNodes->length; $j++){

                        $inyDom.="<td>" . $tableRows[$i]->childNodes[$j]->nodeValue . "</td>";
                    }
                    $inyDom.="</tr>";
                }

                if($tableRows[$i]->childNodes[4]->nodeValue=="-- Iný medzinárodný --" && $tableRows[$i]->childNodes[6]->nodeValue=="ÚAM FEI"
                    && ($tableRows[$i]->childNodes[0]->childNodes[0]->childNodes[0]->attributes[0]->nodeValue=="/img.pl?unid=151053")){
                    $inyMedzi.="<tr>";

//                echo var_dump($tableRows[$i]->childNodes[1]->childNodes[0]->childNodes[0]->attributes) . '<br>';
                    for($j=1; $j<$tableRows[$i]->childNodes->length; $j++){

                        $inyMedzi.="<td>" . $tableRows[$i]->childNodes[$j]->nodeValue . "</td>";
                    }
                    $inyMedzi.="</tr>";
                }
            }
//        var_dump($tableRows[0]->childNodes[1]->nodeValue);
            $table.="</table>";

            $kega.="</table>";
            $vega.="</table>";
            $apvv.="</table>";
            $inyDom.="</table>";
            $inyMedzi.="</table>";

            echo "<h2>KEGA</h2>";
            echo $kega;
            echo "<h2>VEGA</h2>";
            echo $vega;
            echo "<h2>APVV</h2>";
            echo $apvv;
            echo "<h2>Iný domáci</h2>";
            echo $inyDom;
            echo "<h2>Iný medzinárodný</h2>";
            echo $inyMedzi;
        }

        view();

        ?>
    </article>

</div>
</body>
</html>