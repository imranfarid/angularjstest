
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "memeberlist");

$result = $conn->query("SELECT sl, name, id, email, phone FROM user");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Serial":"'  . $rs["sl"] . '",';
    $outp .= '"Name":"'   . $rs["name"]        . '",';
    $outp .= '"ID":"'   . $rs["id"]        . '",';
    $outp .= '"Email":"'   . $rs["email"]        . '",';
    $outp .= '"Phone":"'. $rs["phone"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>