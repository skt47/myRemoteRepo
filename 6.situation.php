<?php
require("dbconfig.php");

$id = (int) $_GET['id'];
if ($id <= 0) {
    echo "error!! empty ID";
    exit(0);
}

$sql = "SELECT jobSituation FROM todo WHERE id = ?;";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $jobSituation);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if ($jobSituation === 'Completed') {
    echo "this job has already completed.";
} else {
    $updateSql = "UPDATE todo SET jobSituation = 'Completed' WHERE id = ?;";
    $updateStmt = mysqli_prepare($db, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "i", $id);

    if (mysqli_stmt_execute($updateStmt)) {
        echo "this job has been marked as completed.";
    } else {
        echo "oops, seems like some error happened." . mysqli_error($db);
    }
}
mysqli_close($db);
?>
<a href="1.新首頁.html">回工作列表</a>