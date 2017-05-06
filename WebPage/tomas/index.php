<!DOCTYPE html>
<html>
<head>
    <title>Projekty</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
    <link rel="stylesheet" href="style/style.css" type="text/css" />
</head>
<body onload="init()">
<article>
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
                <li class="menu-item"><p>Fotogaléria</p></li>
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
    <div class="clear"></div>
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
<footer>
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
</footer>
</body>
</html>