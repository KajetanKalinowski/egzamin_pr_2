<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Panel administratora</title>
</head>
<body>
    <div id="nag">
   <h3>Portal Społecznościowy - panel administratora</h3>
    </div>
    <div id="bl1">
<h4>Użytkownicy</h4>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dane42";
    $year=2024;
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT id,imie,nazwisko,rok_urodzenia,zdjecie FROM `osoby` LIMIT 30";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $wiek=$year-$row["rok_urodzenia"];
        echo $row["id"].". ".$row["imie"]." ". $row["nazwisko"].", ". $wiek." lat"."<br>";
      }
    } else {
      echo "0 results";
    }
    
    mysqli_close($conn);
    ?>
<a href="setings.html">Inne ustawienia</a>
    </div>
    <div id="autor">
<h3>Stronę wykonał: 77777777777</h3>
    </div>
    <div id="bl2">
<h4>Podaj id użytkownika</h4>
<form action="users.php" method="post">
    <input type="number" name="idu" id="idu">
    <input type="submit" value="ZOBACZ" id="button">
</form>
<hr>
<?php
  if (isset($_POST['idu'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dane42";
    $id=$_POST["idu"];
    
    
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT imie,nazwisko,rok_urodzenia,opis,zdjecie,hobby.nazwa FROM osoby,hobby WHERE hobby.id = osoby.Hobby_id AND osoby.id=$id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $wiek=$year-$row["rok_urodzenia"];
        echo "<h2>",$id.". ". $row["imie"]." ".$row["nazwisko"],"</h2><br>";
        echo "<img src='",$row["zdjecie"],"'<br>";
        echo "<p>Rok urodzenia: ",$row["rok_urodzenia"] ,"</p>";
        echo "<p>Opis: ",$row["opis"] ,"</p>";
        echo "<p>Hobby: ",$row["nazwa"] ,"</p>";
        
      }
    } else {
      echo "0 results";
    }
    mysqli_close($conn);
  }
    ?>
    </div>
    
    
</body>
</html>