<?php

if (isset($_POST["text"]) && isset($_POST["regId"])) {
    $name = $_POST["text"];
    $regId = $_POST["regId"];

    include_once './db_functions.php';
    include_once './GCM.php';

    $gcm = new GCM();


    $db = new DB_Functions();

    $users = $db->getAllUsers();
    $log = "Broadcasting message to " . mysql_num_rows($users);

    if ($users != false) {
        $no_of_users = mysql_num_rows($users);
    } else {
        $no_of_users = 0;
    }

    if ($no_of_users > 0) {
        while ($row = mysql_fetch_array($users)) {
            $registatoin_ids = array($row["gcm_regid"]);
            $message = array("price" => $name);
            $result = $gcm->send_notification($registatoin_ids, $message);
        }
    }
    echo $log;
} else {
    echo "Missing Required Data";
}
?>