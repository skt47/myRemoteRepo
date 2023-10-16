<?php
require("dbconfig.php");

$sql = "SELECT * FROM todo WHERE jobSituation = 'Completed';";
$result = mysqli_query($db, $sql);

if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>jobName</th><th>jobUrgent</th><th>jobContent</th><th>jobSituation</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['jobName'];
        $urgent = $row['jobUrgent'];
        $content = $row['jobContent'];
        $completed = $row['jobSituation'];

        echo "<tr><td>$id</td><td>$name</td><td>$urgent</td><td>$content</td><td>$completed</td></tr>";
    }

    echo "</table>";

    mysqli_free_result($result);
} else {
    echo "Error:" . mysqli_error($db);
}

mysqli_close($db);
?>