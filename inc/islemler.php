<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';

if ($_POST) {
  $buttonclick=$_POST["buttonclick"];
  if ($buttonclick=="Güncelle") {
    if (is_file("inc/process/class-folderrename.php"))
      require 'inc/process/class-folderrename.php';
    else
      die("Dosya eksik!!!");
  }
  else if($buttonclick=="Klasör Oluştur"){
    if (is_file("inc/process/class-newfolder.php"))
      require 'inc/process/class-newfolder.php';
    else
      die("Dosya eksik!!!");
  }
  elseif ($buttonclick=="Dosya Yükle") {
    if (is_file("inc/process/class-fileupload.php"))
      require 'inc/process/class-fileupload.php';
    else
      die("Dosya eksik!!!");
  }
  elseif($buttonclick=="Dosya Adını Güncelle"){
    if (is_file("inc/process/class-filerename.php"))
      require 'inc/process/class-filerename.php';
    else
      die("Dosya eksik!!!");
  }
}
if(isset($_COOKIE['filenone']))
  {
    ?>
    <script>
      swal("Böyle bir dizin yok", {
        icon: "warning",
        buttons: false,
        timer: 1000,
      });    
    </script>
    <?php
    setcookie("filenone","");
  }
?>