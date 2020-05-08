<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';
?>
<div class="container-fluid mt-0 text-center"> 
  <div class="row">
    <div class="input-group">
      <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Bu dizin içerisinde ara..." aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
      <div class="input-group-append" id="button-addon4">
        <!-- Button trigger modal -->
        <button class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-download"></i>
          <span class="d-none d-sm-block">
            Oluştur/Yükle
          </span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FileManager</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Yeni Klasör</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Dosya Yükle</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <form action="" method="post">
                      <div class="form-row">

                        <div class="form-group col-12">

                          <input type="text" class="form-control" name="newfolder" placeholder="Yeni Klasör Adı" value="" required>

                        </div>

                      </div>

                      <div class="form-row">

                        <input type="submit" class="btn btn-primary mt-2 col-12" onclick="return confirm('Klasör oluşturulsun mu?')" name="buttonclick" value="Klasör Oluştur">

                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-row">

                        <div class="form-group col-12">

                          <input type="file" class="form-control p-1" name="fileupload" required>

                        </div>

                      </div>

                      <div class="form-row">
                        <input type="submit" name="buttonclick" class="btn btn-primary mt-2 col-12" value="Dosya Yükle"  onclick="return confirm('<?php echo $ana_dizin.$gt; ?> dizinine yüklensin mi?')">

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php
    if (is_file("inc/view/view.php"))
      require 'inc/view/view.php';
    else
      die("Dosya eksik!!!");
    ?>
  
</div>
