<?php

$url = "https://www.ots.at/api/liste?app=6b572c35908e4a5c4f3b8a7ee3ea9c6d&query=&inhalt=alle&von=1434371480&anz=15&format=json";
$jsondata=file_get_contents($url);
$json=json_decode($jsondata, true);
//echo $data["ergebnisse"][4]["TITEL"];
$output = '<ul class="ergebnisseList">';
foreach($json["ergebnisse"] as $ergebnis){
    $output .= '<h4 id="myBtn" class="myBtn">' .$ergebnis["TITEL"].'</h4>';
    $output .= "<li><strong>Datum: </strong>" .$ergebnis["DATUM"]."</li>";
    $output .= "<li><strong>Zeit: </strong>" .$ergebnis["ZEIT"]."</li>";
    $output .= "<li><strong>Lead: </strong>" .$ergebnis["LEAD"]."</li>";
    $output .= "<li><strong>Emittent: </strong>" .$ergebnis["EMITTENT"]."</li><br><hr>";
}
$output .= '</ul>';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APA-OTS</title>
    <link rel="stylesheet" type="text/css" href="./mystyle.css">
    <script type="text/javascript" src="modal.js"></script>
</head>
<body>

<ul class="navbar">
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Releases</a></li>
  <li><a href="#about">About</a></li>
</ul>

<div class="centerlize">
    <img src="./images/apa_ots_logo.jpg" class="headerImage" alt="">
</div>

<div class="output">
  <?php echo $output; ?>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <img src="./images/apa_ots_logo.jpg" class="headerImage" alt="">
    <ul id="modal-content-result">
      
    </ul>
  </div>

</div>
</body>
</html>


