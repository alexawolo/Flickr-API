<?php
include("includes/header.php");

$userinput = $_GET["userinput"];

$response = file_get_contents("https://api.flickr.com/services/rest/?method=flickr.photos.search&format=json&api_key=078fc20034686ba946805b83983693d9&text=" . $userinput);
$code = substr($response, 14); // removing the first 14 characters
$json = substr($code, 0, strlen($code) - 1); // starting at the 14th character and finish before the last character

$data = json_decode($json, true);

$server = $data["photos"]["photo"][0]["server"];
$id = $data["photos"]["photo"][0]["id"];
$secret = $data["photos"]["photo"][0]["secret"];
$farm = $data["photos"]["photo"][0]["farm"];

$url = '<img class="pic" src="https://c1.staticflickr.com/' . $farm . "/" . $server . "/" . $id . "_" . $secret . '.jpg" />';
echo $url;


include("includes/footer.php");
?>
