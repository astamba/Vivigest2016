<?php

if (isset($_GET['q'])){
    $search = strip_tags(trim($_GET['q']));
}
else
{
    $search = '';
}


$conn = mysqli_connect('localhost', 'root', '', 'vivigestdb');
$sql = "select Codice as id, concat(Codice, ' - ', Descrizione) as text from abicab where Descrizione like '%$search%' or Codice like '%$search%'";
//echo $sql;

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)){
    echo '{"results":[';

    $first = true;
    //$row=mysqli_fetch_array($result);
    while($row=mysqli_fetch_assoc($result)){
        //  cast results to specific data types

        if($first) {
            $first = false;
        } else {
            echo ',';
        }
        echo json_encode($row);
    }
    echo ']}';
} else {
    echo '[]';
}
mysqli_close($conn);