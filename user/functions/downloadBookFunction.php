<?php
$bookNameSeparated=explode(".", $bookPath);
$bookExtension=strtolower(end($bookNameSeparated));
$bookDownload=$online_books["title"].".".$bookExtension;

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($bookDownload));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
$fileDestination='C:\xampp\htdocs\BibliotekaOnline\eBooks\\'.$bookPath;
header('Content-Length: ' . filesize($fileDestination));
ob_clean();
flush();
readfile($fileDestination);
exit;


?>