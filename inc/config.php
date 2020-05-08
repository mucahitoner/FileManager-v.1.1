<?php
if (is_file("inc/oturum-yonetimi.php"))
	require 'inc/oturum-yonetimi.php';

ob_start();
error_reporting(0);

/*AYARLAR*/
$site_adi="Site Adı";
//Sitenizin adını gireceksiniz.

$ikon_adi="filemanager.ico";
//İkon dosyanızı css klasörünün altına yükleyin ve ismini uzantısı ile birlikte girin

$site_aciklaması="description,filemanager";
//filemanager sayfasını meta etiketi olan description bilgilerini girebilirsiniz.

$image_uzantilari = ["gif","jpeg","jpg","png","svg","ico","icon","webp"];
//desteklenen resim uzantıları

$resim_turleri = ["image/gif","image/jpeg","image/png","image/svg+xml","image/x-icon","image/webp"];
//yüklenmeye izin resim türleri

$ana_dizin="Upload/";
//klasörleri nereye oluşturacağımızı ve resimlerin nereye yüklenecek anadizin klasör ismini yazacaksınız

define('SITE', "http://localhost/FileManager/");
//define('SITE', "https://muhendistayfa.com/filemanager-v.1.1/");
//FileManager dosyalarının olduğu dizin yolunu yazmanız gerekiyor
/*AYARLAR*/

?>