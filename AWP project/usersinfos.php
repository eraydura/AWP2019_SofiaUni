<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
<style>      
  table, th {
     border: 1px solid black;
}
</style>
 <?php
 include 'connectdatabase.php';
 $i = 1;
$sql = "SELECT id, Name, Surname, EMail, Password, Telephone, Address FROM users ";
$result = mysqli_query($conn, $sql);
?>
<h1> All users </h1>
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<table> <tr> <strong> User ".$i."</strong></tr>";
        echo 
        " <td>Id: " . $row["id"]."</td> "
        ."<td><strong>Name: </strong>" . $row["Name"]."</td> "
        ."<td><strong>Surname: </strong>" . $row["Surname"]."</td> "
        ."<td><strong>EMail:</strong> " . $row["EMail"]."</td>"
        ."<td><strong>Password:</strong> " . $row["Password"]. "</td> "
        ."<td><strong>Telephone:</strong> " . $row["Telephone"]."</td>"
        ."<td><strong>Address:</strong> " . $row["Address"]."</td>";
        echo "</table>";
        $i += 1;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 

<h3>Reset password</h3>
 <form action="modifiermdp.php" method="post">
  ID:<br>
  <input type="text" name="id"><br>
  New password:<br>
  <input type="text" name="mdp"><br><br>
  <input type="submit" value="Submit">
</form> 
<button><a href="admin.php">Go back to admin </a></button>
</html>