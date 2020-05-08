<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';
?>
<div class="container-fluid p-1 text-dark">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 d-none d-sm-block">
        <h1>
          FileManager
        </h1>
      </div>
      <div class="col-md-6 col-sm-12 clearfix">

        <h3>
          <ol class="breadcrumb float-md-right">
            <?php
            if ($_GET)
            {
              if (isset($_GET["file"]) and $_GET["file"]!="") {
                ?>

                <li class="breadcrumb-item">
                  <a href="<?php echo SITE; ?>index.php?file=<?php echo $ckeditor; ?>">
                    <?php echo trim($ana_dizin,"/"); ?>
                  </a>
                </li>

                <?php
                $dizin=explode("/",trim($_GET["file"],"/"));
                $toplam=0;
                $link="";
                foreach ($dizin as $key => $value) {                
                  $yol=trim($value);
                  $link=$link.$yol."/";
                  $toplam++;
                  if ($toplam==count($dizin))
                  {
                    ?>

                    <li class="breadcrumb-item active" aria-current="page">
                      <?php echo $yol; ?>
                    </li>

                    <?php
                  }
                  elseif((count($dizin)-3)>$key and $key==0)
                  {
                    ?>

                    <li class="breadcrumb-item">
                      ...
                    </li>

                    <?php
                  }
                  elseif((count($dizin)-3)<=$key)
                  {
                    ?>

                    <li class="breadcrumb-item">
                      <a href="<?php echo SITE; ?>index.php?file=<?php echo trim($link,"/").$ckeditor; ?>">
                        <?php echo $yol;?>
                      </a>
                    </li>

                    <?php
                  }
                }
              }
              else {
                ?>

                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo trim($ana_dizin,"/"); ?>
                </li>

                <?php
              }
            }
            else {
              ?>

              <li class="breadcrumb-item active" aria-current="page">
                <?php echo trim($ana_dizin,"/"); ?>
              </li>

              <?php
            }
            ?>
        </ol>
      </h3>

    </div>
  </div>
</div>
</div>