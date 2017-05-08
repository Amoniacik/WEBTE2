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
    <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
    <script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/tables.js"></script>
    <!-- liteAccordion is Homepage Only -->
    <link rel="stylesheet" href="layout/scripts/liteaccordion-v2.2/css/liteaccordion.css" type="text/css" />
</head>
<body id="top" onload="init()">
<div class="wrapper row1">
    <div id="header" class="clear">
        <div class="fl_left">
            <h1><a href="index.php">ÚAM FEI</a></h1>
            <p>Free Website Template</p>
        </div>
        <form action="#" method="post" id="login">
            <fieldset>
                <legend>Student Login</legend>
                <input type="password" />
                <input type="text" />
                <div id="forgot">Need <a href="#">Help ?</a> or <a href="#">Forgot Your Details ?</a></div>
                <input type="button" id="signin" value="Sign In" alt="Sign In" />
            </fieldset>
        </form>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
    <div id="topnav">
        <label for="show-menu" class="show-menu">Menu</label>
        <input type="checkbox" id="show-menu" role="button">
        <ul id="menu" class="first-level">
            <li class="menu-item"><p>O nás</p></li>
            <li class="menu-item"><p>Pracovníci</p></li>
            <li class="menu-item"><p>Štúdium</p></li>
            <li class="menu-item"><p>Výskum</p>
                <ul class="second-level">
                    <li class="menu-item"><p>Projekty</p></li>
                    <li class="menu-item"><p>Výskumné oblasti</p>
                        <ul class="third-level">
                            <li class="menu-item"><p>Elektrická motokára</p></li>
                            <li class="menu-item"><p>Autonómne vozidlo 6x6</p></li>
                            <li class="menu-item"><p>3D LED kocka</p></li>
                            <li class="menu-item"><p>Biomechatronika</p></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item"><p>Aktuality</p></li>
            <li class="menu-item"><p>Aktivity</p>
                <ul class="second-level">
                    <li class="menu-item"><p><a href="gallery.php">Fotogaléria</a></p></li>
                    <li class="menu-item"><p>Videá</p></li>
                    <li class="menu-item"><p>Médiá</p></li>
                    <li class="menu-item"><p>Naše tématické web stránky</p>
                        <ul class="third-level">
                            <li class="menu-item"><p>Elektromobilita</p></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item"><p>Kontakt</p></li>
        </ul>
        <div  class="clear"></div>
    </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row3">
    <div id="featured_slide">
        <!-- ####################################################################################################### -->
        <ol>
            <li>
                <h2><span>Slide 1</span></h2>
                <div><img src="images/feika.jpg" alt="" /></div>
            </li>
            <li>
                <h2><span>Slide 2</span></h2>
                <div><iframe width="560" height="315" src="https://www.youtube.com/embed/i5b--NtRj8M" frameborder="0" allowfullscreen></iframe></div>
            </li>
            <li>
                <h2><span>Slide 3</span></h2>
                <div><img src="images/mech.jpg" alt="" /></div>
            </li>
            <li>
                <h2><span>Slide 4</span></h2>
                <div><img src="images/inf.jpg" alt="" /></div>
            </li>
            <li>
                <h2><span>Slide 5</span></h2>
                <div><img src="images/math.jpg" alt="" /></div>
            </li>
        </ol>
        <!-- ####################################################################################################### -->
    </div>
</div>
<!-- ####################################################################################################### -->
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
<!-- ####################################################################################################### -->
<div class="wrapper row5">
    <footer id="footer" class="clear">
        <!-- ####################################################################################################### -->
        <table class="footer-contacts">
            <tr>
                <td>
                    <ul>
                        <li><a href="http://is.stuba.sk/">AIS STU</a></li>
                        <li><a href="http://aladin.elf.stuba.sk/rozvrh/">Rozvrh hodín FEI</a></li>
                        <li><a href="http://elearn.elf.stuba.sk/moodle/">Moodle FEI</a></li>
                        <li><a href="http://www.sski.sk/webstranka/">SSKI</a></li>
                        <li><a href="https://www.jedalen.stuba.sk/WebKredit/">Jedáleň STU</a></li>
                        <li><a href="https://webmail.stuba.sk/">Webmail STU</a></li>
                    </ul>
                </td>
                <td>
                    <ul>
                        <li><a href="https://kis.cvt.stuba.sk/i3/epcareports/epcarep.csp?ictx=stu&language=1">Evidencia publikácií STU</a></li>
                        <li><a href="http://okocasopis.sk/">Časopis OKO</a></li>
                        <li><a href="https://www.facebook.com/UAMTFEISTU">Facebook</a></li>
                        <li><a href="https://www.youtube.com/channel/UCo3WP2kC0AVpQMIiJR79TdA">YouTube</a></li>
                    </ul>
                </td>
            </tr>
        </table>
        <!-- ####################################################################################################### -->
    </footer>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
    <div id="copyright" class="clear">
        <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
        <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    </div>
</div>
<!-- liteAccordion is Homepage Only -->
<script type="text/javascript" src="layout/scripts/liteaccordion-v2.2/js/liteaccordion.jquery.min.js"></script>
<script type="text/javascript">
    $("#featured_slide").liteAccordion({
        theme: "os-tpl",
        containerWidth: 960, // fixed (px)
        containerHeight: 360, // fixed (px) - overall height of the slider
        headerWidth: 48, // fixed (px) - slide spine title
        firstSlide: 1, // displays slide (n) on page load
        activateOn: "click", // click or mouseover
        autoPlay: false, // automatically cycle through slides
        pauseOnHover: true, // pause slides on hover
        rounded: false, // square or rounded corners
        enumerateSlides: true, // put numbers on slides
        slideSpeed: 800, // slide animation speed
        cycleSpeed: 6000, // time between slide cycles
    });
</script>
</body>
</html>