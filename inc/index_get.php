<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';

setcookie("songt","");
$footerfolder=0;
$footerfile=0;
if ($_GET) {
  $ckeditor="";
  if (isset($_GET["ckeditor"]) and $_GET["ckeditor"]!="" and $_GET["ckeditor"]=="show") {
    $ckeditor="&ckeditor=".$_GET["ckeditor"];
  }
  if (isset($_GET["file"]) and $_GET["file"]!="") {
    $dizin_adi = $ana_dizin.$_GET["file"]."/";
    if (file_exists($dizin_adi)) {
      $gt=$_GET["file"]."/";
      setcookie("songt",$gt);
    }
    else {
      switch ($_COOKIE['songt']) {
        case $ana_dizin:
        setcookie("filenone",$ana_dizin);
        header("location:index.php?file=");
        break;
        
        default:
        $f=trim($_COOKIE['songt'],"/");
        setcookie("filenone",$f);
        header("location:index.php?file={$f}");
        break;
      }
    }
  }
  else if (isset($_GET["filedelete"]) and $_GET["filedelete"]!="") {
    filedelete($_GET["filedelete"]);

    switch ($_COOKIE['songt']) {
        case $ana_dizin:
        $f="".$ckeditor;
        break;
        
        default:
        $f=trim($_COOKIE['songt'],"/").$ckeditor;
        break;
      }

    header("location:index.php?file={$f}");
  }
  else if (isset($_GET["folderdelete"]) and $_GET["folderdelete"]!="") {
    folderdelete($_GET["folderdelete"]);

    switch ($_COOKIE['songt']) {
        case $ana_dizin:
        $f="".$ckeditor;
        break;
        
        default:
        $f=trim($_COOKIE['songt'],"/").$ckeditor;
        break;
      }
    header("location:index.php?file={$f}");
  }
  else {
    setcookie("songt",$ana_dizin);
    $dizin_adi = $ana_dizin;
    $gt="";
  }
}
else {
  setcookie("songt","");
  $dizin_adi = $ana_dizin;
  $gt="";
}

$filemanagerlink=trim($gt,"/").$ckeditor;
?>