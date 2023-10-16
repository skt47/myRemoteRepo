<font size="5">Todo list</font>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>Job</td>
    <td>Urgent</td>
    <td>Job Content</td>
    <td>Job Situation</td>
    <td>Edit</td>
    <td>Delete</td>
    <td>Done</td>
  </tr>
  <?php
  require("dbconfig.php");
  $sql = "select * from todo;";
  $stmt = mysqli_prepare($db, $sql); //precompile sql指令，建立statement 物件，以便執行SQL
  mysqli_stmt_execute($stmt); //執行SQL
  $result = mysqli_stmt_get_result($stmt); //取得查詢結果
  
  while ($rs = mysqli_fetch_assoc($result)) { //用迴圈逐筆取出
  
    echo "<tr><td>", $rs['id'],
      "</td><td>", $rs['jobName'],
      "</td><td>", $rs['jobUrgent'],
      "</td><td>", $rs['jobContent'],
      "</td><td>", $rs['jobSituation'],
      "</td><td><button onclick='loadEditForm(", $rs['id'], ")'>edit</button>",
      "</td><td><button onclick='loadDeleteForm(", $rs['id'], ")'>delete</button>",
      "</td><td><button onclick='loadDoneForm(", $rs['id'], ")'>done</button>",
      "</td></tr>";
  }
  ?>
</table>