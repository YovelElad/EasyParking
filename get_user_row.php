<?php

$userQuery = "SELECT * FROM tbl_users_201 WHERE user_id = $currId" ;
$userResult = mysqli_query($connection, $userQuery);
if(!$userResult) {
    die("DB query failed.");
}
$userRow = mysqli_fetch_assoc($userResult);
$user_role=$userRow["user_role"];

?>