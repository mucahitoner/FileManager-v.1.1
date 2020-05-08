<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';

if ($_FILES) {
  $yukleme_yeri=$ana_dizin.$gt;
  $dosya_adi=$_FILES["fileupload"]["name"];
  $parcala=pathinfo($dosya_adi);
  $dosya_adi=duzenle($parcala["filename"]).".".$parcala["extension"];
  if (file_exists($yukleme_yeri.$dosya_adi)) {
    $parcala=pathinfo($dosya_adi);
    $yeni_dosya_adi=duzenle($parcala["filename"])."_".uniqid().".".$parcala["extension"];
  }
  else{
    $parcala=pathinfo($dosya_adi);
    $yeni_dosya_adi=duzenle($parcala["filename"]).".".$parcala["extension"];
  }
  $dosya_turu=$_FILES["fileupload"]["type"];
  $yuklencek_yer=$_FILES["fileupload"]["tmp_name"];
  $dosya_hatasi=$_FILES["fileupload"]["error"];
  if ($dosya_hatasi==0) {
    if (in_array($dosya_turu, $resim_turleri)) {
      $link=$yukleme_yeri.$yeni_dosya_adi;
      $upload=move_uploaded_file($yuklencek_yer, $link);
      if ($upload==true) {
        header("location:index.php?file={$filemanagerlink}");
      }
      else{
        ?>
        <script>
          swal("Dosya yüklenemedi.", {
            icon: "warning",
            buttons: false,
            timer: 2000,
          });
        </script>
        <?php
        
      }
    }
    else{
      ?>
      <script>
        swal("Dosya uygun uzantıya sahip değil.", {
          icon: "warning",
          buttons: false,
          timer: 2000,
        });
      </script>
      <?php
      
    }
  }
  else{
    ?>
    <script>
      swal("Dosya da bir hata oluştu.", {
        icon: "warning",
        buttons: false,
        timer: 2000,
      });
    </script>
    <?php

  }
}
else{
  ?>
  <script>
    swal("Error Files!", {
      icon: "error",
      buttons: false,
      timer: 2000,
    });
  </script>
  <?php
}
?>