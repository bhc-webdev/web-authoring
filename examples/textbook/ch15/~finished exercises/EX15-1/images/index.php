<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
.container {
	display: flex;
}
.item {
  background-color: #f1f1f1;
  width: 40%;
  margin: 2em;
  padding: 2em;
  line-height: 1.5em;
  font-size: 1.5em;
}
</style>
</head>
<body>
    <h1>Navigation Menu</h1>
<?php

echo '<div class="container">';

$fileList = array();
$directoryList = array();

if ($handle = opendir('.')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && $entry != "index.php" && (!is_dir($entry))) {
			$fileList[] = $entry;
        } elseif ($entry != "." && (is_dir($entry))){
			$directoryList[] = $entry;
		}
    }
    closedir($handle);
}

asort($directoryList);
echo "<div class='item'>\n";
echo "<h2>Directory Listing</h2>\n";
if (!empty($directoryList)) {
foreach ($directoryList AS $name => $value) {
	if ($value == ".."){
	echo <<<HERE
	<a href="$value">Parent Directory</a><br>\n
HERE;
} else {
	echo <<<HERE
	<a href="$value">$value</a><br>\n
HERE;
}
}
} else {
	echo <<<HERE
	<p>No files available</p>\n
HERE;
}
echo "</div>";

asort($fileList);
echo "<div class='item'>\n";
echo "<h2>File Listing</h2>\n";
if (!empty($fileList)) {
	foreach ($fileList AS $name => $filevalue) {
		echo <<<HERE
		<a href="$filevalue">$filevalue</a><br>\n
HERE;
}
} else {
	echo <<<HERE
	<p>No files available</p>\n
HERE;
}
echo "</div>";

echo "</div>";

?>

</body>
</html>