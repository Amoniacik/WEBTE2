<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>ÚAM FEI</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
    <script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/tables.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <script type="text/javascript">
            <!--
            $( document ).ready(function() {
                var isMobile = window.matchMedia("only screen and (max-width: 720px)");
                if (isMobile.matches) {
                //window.location = "http://m.domain.com";
    //            $("input[type=checkbox]:checked ~ #menu").css("display","block");
    //            $("input[type=checkbox]").css("display","none");
    //            $(".first-level,.second-level,.third-level").css({"position":"static","display":"none","padding":"0px"});
    //            $("li").css({"margin-bottom":"1px", "width":"100%"});
    //            $(".first-level > li,.second-level> li,.third-level > li").css("width","100%");
    //            $(".menu-item").css({"width":"100%","box-shadow":"none"});
    //            $(".first-level li:hover > ul").css({"position":"relative","display":"block","z-index":"9999","width":"inherit"});
    //            $(".second-level li:hover > ul").css({"display":"block","z-index":"9999","position":"relative"});
    //            $(".show-menu").css("display", "block");
            }
                $('#signin').click(function () {
                    var targetvalue = "stevo/Intranet/index.php";
                    $('#featured_slide').hide();
                    $('#godSrcFrame').prop("src", targetvalue);
                });
        });
            //-->
        </script>
    <!-- liteAccordion is Homepage Only -->
    <link rel="stylesheet" href="layout/scripts/liteaccordion-v2.2/css/liteaccordion.css" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body id="top" onload="init(); initialize();">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="pages/home.php" target="content" onclick="showSlide();">ÚAM FEI</a></h1>
      <p>Free Website Template</p>
    </div>
    <form action="" method="post" id="login" class="form form-horizontal">
        <div class="form-group form-group-sm">
            <input type="button" id="signin" class="btn btn-danger" value="Intranet" style="height: 20px;font-size: x-small;position: fixed;left: 81%;" >
        </div>
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
          <li class="menu-item"><p><a href="pages/projects.php" target="content">Projekty</a></p></li>
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
          <li class="menu-item"><p><a href="pages/gallery.php" target="content">Fotogaléria</a></p></li>
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
<div class="wrapper row4">
  <iframe name="content" id="godSrcFrame" width="100%" height="800px" src="pages/home.php"></iframe>
</div>
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
          <td>
              <div class="round-blue-button"><div class="round-blue-button-circle"><a href="http://example.com" class="round-button">Button!!</a></div></div>
              <div class="round-red-button"><div class="round-red-button-circle"><a href="http://example.com" class="round-button">Button!!</a></div></div>
              <div class="round-green-button"><div class="round-green-button-circle"><a href="http://example.com" class="round-button">Button!!</a></div></div>
          </td>
      </tr>
    </table>
    <!-- ####################################################################################################### -->
  </footer>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
<!--  <div id="copyright" class="clear">-->
<!--    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>-->
<!--    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>-->
<!--  </div>-->
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