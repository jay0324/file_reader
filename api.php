<?php
$dir = "files/";
$lastMod = 0;
$lastModFile = '';
foreach (scandir($dir) as $entry) {
    if (is_file($dir.$entry) && filectime($dir.$entry) > $lastMod) {
        $lastMod = filectime($dir.$entry);
        $lastModFile = $entry;
    }
}

$fp = fopen($dir.$lastModFile, "r");

//透過fgetcsv函式可以很完整的切割字串
$result = array();
$list = fgetcsv($fp, $CSVfile_size);
fclose($fp);//關閉csv檔案

//輸出為json文件格式
$output = json_encode(array($list));
header("Content-type:application/json");
echo $output;
?>