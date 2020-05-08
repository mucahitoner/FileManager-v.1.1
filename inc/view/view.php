<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';
?>
<div class="row icerik" id="icerik">
  <!--klasör çektik-->
  <?php
  if (file_exists($dizin_adi)) {
          $dizin = opendir($dizin_adi);//dizin oku
          while ($file=readdir($dizin)) {//dizin içeriği
            if ($file=="." or $file=="..") continue;
            if (!is_file($dizin_adi."".$file)) {
              $footerfolder++;
              ?>

              <div class="col-6 col-sm-2 col-md-3 col-lg-1">
                <div class="my-1 klasor task" data-id="<?php echo $ana_dizin.$gt.$file.$ckeditor; ?>" data-folder="<?php echo $file; ?>">
                  <a href="<?php echo SITE."index.php?file=".$gt.$file.$ckeditor;?>">
                    <img src="<?php echo SITE."css/folder-solid.png"; ?>" alt="" class="fluid">
                    <h5 class="baslik text-truncate"><?php echo $file; ?></h5>
                  </a>
                </div>
              </div>

              <?php
            }
          }
        }
        else {
          echo "Warning! Dizin bulunamadı!";
        }
        ?>
        <!--klasör çektik-->

        <!--image çektik-->
        <?php
        if (file_exists($dizin_adi)) {
          $dizin = opendir($dizin_adi);//dizin oku
          while ($file=readdir($dizin)) {//dizin içeriği
            if ($file=="." or $file=="..") continue;
            if (is_file($dizin_adi."".$file)) {

              $image=explode(".", $file);
              $uzanti=end($image);
              if (in_array(strtolower($uzanti), $image_uzantilari)) {
                $footerfile++;
                ?>
                
                <div class="col-6 col-sm-2 col-md-3 col-lg-1">
                  <div class="my-1 bg-success border rounded">
                    <a onclick="filerename('<?php echo SITE.$ana_dizin.$gt.$file; ?>','<?php echo $file; ?>','<?php echo $ana_dizin.$gt.$file; ?>')" data-toggle="modal" data-target="#exampleDosya">
                      <img src="<?php echo SITE.$ana_dizin.$gt.$file; ?>" alt="<?php echo "filemanager_".$file; ?>" class="fluid">
                      <h5 class="text-truncate"><?php echo $file; ?></h5>
                    </a>

                    <?php if (!$ckeditor==""): ?>
                      <span class="kopyala">
                        <h5>
                          <a class="rounded-circle btn btn-secondary text-white" onclick="kopyala('<?php echo SITE.$ana_dizin.$gt.$file; ?>')">
                            <i class="fas fa-copy"></i>
                          </a>
                        </h5>
                      </span>
                    <?php endif ?>
                  </div>
                </div>
                <?php
              }
            }
          }
        }
        else {
          echo "Warning! Dizin bulunamadı!";
        }
        ?>
        <!--image çektik-->

        <!--desteklenmeyenler-->
        <?php
        if (file_exists($dizin_adi)) {
          $dizin = opendir($dizin_adi);//dizin oku
          while ($file=readdir($dizin)) {//dizin içeriği
            if ($file=="." or $file=="..") continue;
            if (is_file($dizin_adi."".$file)) {


              $image=explode(".", $file);
              $uzanti=end($image);
              if(!in_array(strtolower($uzanti), $image_uzantilari)){
                $footerfile++;
                ?>

                <div class="col-6 col-sm-2 col-md-3 col-lg-1">
                  <div class="my-1 desteklenmeyen">
                    <a onclick="desteklenmeyen()" style="cursor: pointer;">
                      <img src="<?php echo SITE."css/file-solid-lg.png"; ?>" alt="" class="d-none d-lg-block fluid">
                      <img src="<?php echo SITE."css/file-solid.png"; ?>" alt="" class=" d-block d-lg-none fluid">
                      <h5 class="mt-2 text-truncate" style="font-size:15px;"><?php echo $file; ?></h5>
                    </a>
                  </div>
                </div>

                <?php
              }
            }
          }
        }
        else {
          echo "Warning! Dizin bulunamadı!";
        }
        ?>
        <!--desteklenmeyenler-->
      </div>

      <!--klasör sağ tık-->
      <nav id="context-menu" class="context-menu">
        <ul class="context-menu__items">
          <li class="context-menu__item">
            <a href="#" class="context-menu__link" data-action="delete">
              <i class="fas fa-trash-alt"></i> Öğeyi Sil
            </a>
          </li>
          <li class="context-menu__item">
            <a href="#" class="context-menu__link" data-action="folderrename" data-toggle="modal" data-target="#exampleFolder">
              <i class="fa fa-edit"></i> Düzenle
            </a>
          </li>
        </ul>
      </nav>
      <!--klasör sağ tık-->
      
      <div class="modal fade" id="exampleFolder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                <label for="" id="pfolder"></label>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                <div class="form-row">

                  <div class="form-group col-4">

                    Güncellenecek Klasör Adı:

                  </div>

                  <div class="form-group col-8">

                    <input type="text" class="form-control" id="folder" name="ilkdeger" value="" readonly>

                  </div>

                </div>
                <div class="form-row">

                  <div class="form-group col-12">

                    <input type="text" class="form-control" id="folderadi" name="sondeger" placeholder="Klasör Adı" value="" required>

                  </div>

                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <input class="btn btn-primary" type="submit" value="Güncelle" onclick="return confirm('Klasörün ismini güncellemek istiyor musunuz? ')" name="buttonclick">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script>
        function filerename(yol,isim,sil) {
          document.getElementById("myImgId").href=yol;
          document.getElementById("dosya").value = isim;
          document.getElementById("pdosya").innerHTML = isim+" Özellikleri";
          document.getElementById("dosyaadi").value = isim;
          document.getElementById("myImg").src=yol;
          document.getElementById("modalSil").href="<?php echo SITE; ?>index.php?filedelete="+sil+"<?php echo $ckeditor; ?>";
        }
      </script>

      <div class="modal fade" id="exampleDosya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                <label for="" id="pdosya"></label>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                <div class="form-row">

                  <div class="form-group col-12">
                    <a href="" class="fresco" id="myImgId">
                      
                      <img src="" alt="" id="myImg" class="img-fluid">

                    </a>
                  </div>

                </div>
                <div class="form-row">

                  <div class="form-group col-4">

                    Güncellenecek Dosya Adı:

                  </div>

                  <div class="form-group col-8">

                    <input type="text" class="form-control" id="dosya" name="dosya" value="" readonly>

                  </div>

                </div>
                <div class="form-row">

                  <div class="form-group col-12">

                    <input type="text" class="form-control" id="dosyaadi" name="dosyaadi" placeholder="Dosya Adı" value="" required>

                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <a href="" id="modalSil" class="btn btn-danger" onclick="return confirm('Görsel silinsin mi?')">
                  <i class="fas fa-trash-alt"></i>
                </a>
                <input type="submit" class="btn btn-primary" onclick="return confirm('Dosya adı değiştirilsin mi?')" name="buttonclick" value="Dosya Adını Güncelle">
              </div>
            </form>
          </div>
        </div>
      </div>
      