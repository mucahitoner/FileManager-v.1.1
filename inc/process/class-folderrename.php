<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';

$updateyol=trim($ana_dizin,"/");//upload
$location="";
$variable=explode("/",trim($link,"/"));
foreach ($variable as $key => $value) {
  $updateyol=$updateyol."/".$value;
  $location=$location."/".$value;
}
$location=trim($location,"/").$ckeditor;
$updatefirst=$updateyol."/".$_POST["ilkdeger"];
$updatesecond=$updateyol."/".duzenle($_POST["sondeger"]);
if ($updatefirst==$updatesecond) {
  ?>
  <script>
    swal("Güncellendi!",{
      icon:"success",
      buttons:false,
      timer:2000,
    });
  </script>
  <?php
}
else{
  if (is_dir($updatesecond)) {
    ?>
    <script>
      swal("Aynı ada sahip klasör mevcut!", {
        icon: "warning",
        buttons: false,
        timer: 2000,
      });
    </script>
    <?php
  }
  else{
    try {
      rename($updatefirst, $updatesecond);
      header("location:index.php?file={$location}");
    } catch (Exception $e) {
      ?>
      <script>
        swal("Güncellenemedi!!!", {
          icon: "error",
          buttons: false,
          timer: 2000,
        });
      </script>
      <?php
    }
  }
}
?>