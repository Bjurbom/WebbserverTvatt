<?php

    $agare = $_SESSION['userLoggedIn'];


    $sql = "SELECT * FROM users";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['lagenhetsnummer'] . "</td>";
                echo "<td>" . $row['namn'] . "</td>";
                echo "<td>" . $row['adress'] . "</td>";
                echo "<td>" . $row['bild'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>