<?php
require("dbconfig.php");

$id = (int) $_GET['id'];
if ($id <= 0) {
    echo "error!! empty ID";
    exit(0);
}

$sql = "DELETE FROM todo WHERE id = ?;";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    echo "this job has been deleted.";
} else {
    echo "oops, seems like some error happened." . mysqli_error($db);
}

mysqli_close($db);
?>
<a href="1.新首頁.html">回工作列表</a>