<?php
$con = mysql_connect("localhost","root","password");

if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("pokerdb", $con);

$name = $_POST['name'];

if($name != "") {

    $getdeck = mysql_query("SELECT * FROM game_table WHERE player2='$name'") or die(mysql_error());
	
    while($row = mysql_fetch_array($getdeck)) {
        $deck = $row['deck'];
        $opponent = $row['player1'];
    }
	
    $array = array();
    $array["deck"] = $deck;
    $array["opponent"] = $opponent;
    echo json_encode($array);
}
mysql_close($con);

?>
