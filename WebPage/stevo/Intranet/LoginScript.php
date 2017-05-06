<?php
/*
 * If valid credentials are provided via POST,username and password are set up into Session
 *
 */

session_start(); // should be on top of page due to logging and security reasons
$username = $_POST["stuLogin"];
$password = $_POST["stuPassword"];
$ldap_server = "ldap.stuba.sk";

if ($connect = @ldap_connect($ldap_server)) { // if connected to ldap server

    ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);

    // bind to ldap connection
    if (($bind = @ldap_bind($connect)) == false) {
        print "bind:__FAILED__<br>\n";
        echo "bad";
    }

    // search for user
    if (($res_id = ldap_search($connect,
            "dc=stuba, dc=sk",
            "uid=$username")) == false
    ) {
        print "failure: search in LDAP-tree failed<br>";
        echo "bad";
    }

    if (ldap_count_entries($connect, $res_id) != 1) {
        print "failure: username $username found more than once<br>\n";
        echo "bad";
    }

    if (($entry_id = ldap_first_entry($connect, $res_id)) == false) {
        print "failure: entry of searchresult couln't be fetched<br>\n";
        echo "bad";
    }

    if (($user_dn = ldap_get_dn($connect, $entry_id)) == false) {
        print "failure: user-dn coulnd't be fetched<br>\n";
        echo "bad";
    }


    if (($link_id = ldap_bind($connect, $user_dn, $password)) == false) {
        print "failure: username, password didn't match: $user_dn<br>\n";
        echo "bad";
    }

    // TODO : implement check condition - if user has password set up in database
    // db connnect, select name where username like ,if name != null ...




    // Set variables in session
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    //redirect to intranet welcome Page
    header('Location: Intranet.php');


    return true;
    @ldap_close($connect);
} else {                                  // no conection to ldap server
    echo "no connection to '$ldap_server'<br>\n";
}


@ldap_close($connect);



















?>

