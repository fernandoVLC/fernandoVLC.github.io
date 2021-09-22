<!DOCTYPE html>
<html>
<body>

<?php

//header('Content-Type:application/html');
$url = "https://scholar.google.es/citations?hl=en&user=WLN3QrAAAAAJ";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$res = curl_exec($ch);

curl_close($ch);

$dom = new DomDocument();
$dom->loadHTML($res);

echo ($res);

// Mediante TagName
$h2s = $dom->getElementsByTagName('h2');
foreach( $h2s as $h2 ) {
    echo $h2->textContent . "\n";
}
echo "<br>";
// Mediante clases
$xpath = new DOMXpath($dom);
$tables = $xpath->query("//table[contains(@class,'gsc_a_at')]");
$count = $tables->length;

echo "No. of tables " . $count;
echo "<br>";
// Mediante links

$links = $dom->getElementsByTagName('a');
$urls = [];
foreach($links as $link) {
    $url = $link->getAttribute('href');
    $parsed_url = parse_url($url);
   
    
}
var_dump($urls);
?>

</body>
</html>
