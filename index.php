<?php
if (is_file("inc/config.php"))
  require 'inc/config.php';
else
  die("Dosya eksik!!!");

if (is_file("inc/function.php"))
  require 'inc/function.php';
else
  die("Dosya eksik!!!");

urlyonlendirme($_SERVER['REQUEST_URI']);
anadizinkontrol($ana_dizin);

if (is_file("inc/index_get.php"))
  require 'inc/index_get.php';
else
  die("Dosya eksik!!!");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="vie" content="">
  
  <title><?php echo $site_adi." - FileManager"; ?></title>
  <?php
  if (is_file("inc/head.php"))
    require 'inc/head.php';
  else
    die("Dosya eksik!!!");
  ?>
  <link rel="stylesheet" href="<?php echo SITE; ?>css/style.css">
</head>
<body>
  <!-- Başlık başlangıç -->
  <?php
  if (is_file("inc/baslik.php"))
    require 'inc/baslik.php';
  else
    die("Dosya eksik!!!");
  ?>
  <!-- Başlık bitiş -->

  <!-- İçerik Başlangıç -->
  <?php
  if (is_file("inc/icerik.php"))
    require 'inc/icerik.php';
  else
    die("Dosya eksik!!!");
  ?>
  <!-- İçerik bitiş -->

  <!-- Footer başlangıç -->
  <?php
  if (is_file("inc/footer.php"))
    require 'inc/footer.php';
  else
    die("Dosya eksik!!!");
  ?>
  <!-- Footer bitiş -->
  
  <?php
  if (is_file("inc/script.php"))
    require 'inc/script.php';
  else
    die("Dosya eksik!!!");
  ?>
  <?php
  if (is_file("inc/islemler.php"))
    require 'inc/islemler.php';
  else
    die("Dosya eksik!!!");
  ?>
</body>
</html>
