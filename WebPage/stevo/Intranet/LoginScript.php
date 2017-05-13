<?php
/*
 * If valid credentials are provided via POST,username and password are set up into Session
 *
 */

session_start(); // should be on top of page due to logging and security reasons
$login = $_POST["stuLogin"];
$password = $_POST["stuPassword"];
$ldap_server = "ldap.stuba.sk";


//  header('Location: Intranet.php');
if ($connect = @ldap_connect($ldap_server)) { // if connected to ldap server

    ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);

    //nasleduje set fucnckie ,pri ktorych ak nie si prihlaseny,vypise to spravu bad a dost --toto pouzivam v callbacku pre post
    // bind to ldap connection
    if (($bind = @ldap_bind($connect)) == false) {
       // print "bind:__FAILED__<br>\n";
      //  echo "bad";
    }

    // search for user
    if (($res_id = ldap_search($connect,
            "dc=stuba, dc=sk",
            "uid=$login")) == false
    ) {
      //  print "failure: search in LDAP-tree failed<br>";
      //  echo "bad";
    }

    if (ldap_count_entries($connect, $res_id) != 1) {
      //  print "failure: username $login found more than once<br>\n";
       // echo "bad";
    }

    if (($entry_id = ldap_first_entry($connect, $res_id)) == false) {
       // print "failur: entry of searchresult couln't be fetched<br>\n";
      //  echo "bad";
    }

    if (($user_dn = ldap_get_dn($connect, $entry_id)) == false) {
     //   print "failure: user-dn coulnd't be fetched<br>\n";
     //   echo "bad";
    }


    if (($link_id = ldap_bind($connect, $user_dn, $password)) == false) {
       print "<h2>Bad login or password</h2>";
       return false;
    }

    //if we could make it here,set up session parameters and do redirect do intranet

    // TODO : implement check condition - if user has password set up in database,need to fetch role from DB
    // db connnect, select name where username like ,if name != null ...

    // Set variables in session
    $_SESSION["username"] = $login;
    $_SESSION["password"] = $password;
    $_SESSION["role"] = 5; //admin role is logged by default

    header('Location: Intranet.php');
    return true;
} else {                                  // no conection to ldap server
    echo "Could not contact LDAP server".$ldap_server;
}

ldap_close($connect);





















?>

