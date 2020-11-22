<?php
    require_once("..\Connection.php");

    $res = $pdo->query("SELECT * FROM USERS")->fetchAll();

    // METHOD 1
    // echo json_encode($res);

    // METHOD 2
    foreach($res as $key => $value)
    {
        echo "<tr>";
        echo "<th scope='row'>" . (intval($key) + 1) . "</th>";
        echo "<td>" . $value['username'] . "</td>";
        echo "<td>" . $value['email'] . "</td>";
        if ($value['is_disabled'] == 0)
        {
            echo "<td>" . "<button type='button' class='btn btn-danger' onClick='DisableAccount(" . $value['username'] . ")'>Disable Account</button>" . "</td>";
        }
        else if ($value['is_disabled'] == 1)
        {
            echo "<td>" . "<button type='button' class='btn btn-success' onClick='EnableAccount(" . $value['username'] . ")'>Enable Account</button>" . "</td>";
        }
        echo "</tr>";
    }
?>