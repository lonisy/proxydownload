<?php
/**
 * Created by lonisy@163.com
 * Author: lilei
 * Date: 2017/8/22
 * Time: 13:36
 */


$filepath = isset($_GET['url']) ? trim($_GET['url']) : false;
if (!$filepath) exit();

//header('Content-Description: File Transfer');
//header('Content-Type: application/octet-stream');
//header('Content-Disposition: attachment; filename=' . basename($filepath));
//header('Content-Transfer-Encoding: binary');
//header('Expires: 0');
//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//header('Pragma: public');
////header('Content-Length: ' . filesize($filepath));
//readfile($file_path);


$filename = $filepath;
$file = fopen($filename, "rb");
header('Content-Description: File Transfer');
Header('Content-type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
Header('Accept-Ranges: bytes');
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header('Expires: 0');
header('Pragma: public');
Header('Content-Disposition: attachment; filename=' . basename($filepath));
$contents = "";
while (!feof($file)) {
    $contents .= fread($file, 8192);
}
echo $contents;
fclose($file);