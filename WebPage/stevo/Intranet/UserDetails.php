<?php
include('./User.php');

try {
    $GLOBALS['pdo'] = new PDO("" . $dbengine . ":host=$dbhost; dbname=$dbname", $dbuser, $dbpassword);
    $GLOBALS['pdo']->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $GLOBALS['pdo']->exec("set names utf8");

} catch (PDOException $e) {
    echo $e->getMessage();
    echo "Connection to the db failed !";
}


function getUserDetails($username,$parameter){






//select categories first
    try {

        if($parameter == "default") $queryToDo = "select * from staff where ldapLogin = '" . $username . "' limit 1 ";
        if($parameter == "lookupByNameSurname") {
            $name = explode(",",$username);
            $queryToDo = "select * from staff where name like '%" . $name[0] . "%' and surname like '".$name[1]."' limit 1 ";
        }

        $stmt = $GLOBALS['pdo']->query($queryToDo);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //we fetched categories from database

            $userDetails = new User;
            $userDetails->name = $row["name"];
            $userDetails->surname = $row["surname"];
            $userDetails->title1 = $row["title1"];
            $userDetails->title2 = $row["title2"];
            $userDetails->ldapLogin = $row["ldapLogin"];
            $userDetails->photo = $row["photo"];
            $userDetails->room = $row["room"];
            $userDetails->phone = $row["phone"];
            $userDetails->department = $row["department"];
            $userDetails->staffRole = $row["staffRole"];
            $userDetails->function = $row["function"];

        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "User not found empty !";
    }

    return $userDetails;
}













?>