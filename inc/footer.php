<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';
?>
<div class="container-fluid fixed-bottom w-100 bg-dark text-white py-1 px-4">
      <div class="row">
        <div class="mr-auto d-none d-sm-block">
          Copyright © 2020 Mücahit ÖNER - FileManager v1.1
        </div>
        <div class="ml-auto">
          <?php
          $footer="";
            switch ($footerfolder) {
              case 0:
                switch ($footerfile) {
                  case 0:
                    $footer="Dizin Boş!";
                    break;
                  
                  default:
                    $footer=$footerfile." Dosya";
                    break;
                }
                break;
              
              default:
                switch ($footerfile) {
                  case 0:
                    $footer=$footerfolder." Klasör";
                    break;
                  
                  default:
                    $footer=$footerfolder." Klasör ve ".$footerfile." Dosya";
                    break;
                }
                break;
            }
          ?>
          <?php echo $footer; ?>
          <?php       
          echo convertbirim(dizinboyutu($dizin_adi));
          ?>
        </div>
      </div>
    </div>