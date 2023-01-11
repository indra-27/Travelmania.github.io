<?php

$hname = 'localhost';
$unmae = 'root';
$pass = 'indra27127';
$db = 'travelmania';

$conn = mysqli_connect($hname, $unmae, $pass, $db);

if (!$conn) {
    die("Failed" . mysqli_connect_error());
}

function select($sql, $value, $datatype)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatype, ...$value); //...(splat operator)
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query can't be executed");
        }
    } else {
        die("Query can't be Prepared");
    }
}

function selectAll($table)
{
    $conn = $GLOBALS['conn'];
    $res = mysqli_query($conn,"SELECT * FROM $table");
    return $res;
}

function insert($sql,$values,$datatype)
{
    $conn=$GLOBALS['conn'];
    if($stmt = mysqli_prepare($conn,$sql))
    {
        mysqli_stmt_bind_param($stmt,$datatype,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Query cannot be executed- Insert");
        }
    }
    else{
        die("Query can't be Prepared - insert");
    }
}

?>