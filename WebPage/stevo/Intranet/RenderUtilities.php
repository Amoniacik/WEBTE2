<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 5/4/2017
 * Time: 10:37 PM
 */


function renderIntranetPanel(){

    return "
        <ul class='nav nav-tabs navbar-inverse'>
          <li class='active'><a href='#'>Home</a></li>
          <li><a href='#pedagogika'>Pedagogika</a></li>
          <li><a href='#doktorandi'>Doktorandi</a></li>
          <li><a href='#publikacie'>Publikácie</a></li>
          <li><a href='#sluzobne-cesty'>Služobné cesty</a></li>
          <li><a href='#'>Nákupy</a></li>
          <li><a href='#'>Dochádzka</a></li>
          <li><a href='#'>Rozdelenie úloh</a></li>
        </ul>";
}


function urlSwitchRouter(){

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actualUrlFragment = parse_url ( $actual_link ,PHP_URL_FRAGMENT );

    return $actualUrlFragment;
}



function renderIntranetMenuItem(){






}












?>