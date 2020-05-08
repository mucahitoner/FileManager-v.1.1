<?php
if (is_file("inc/oturum-yonetimi.php"))
  require 'inc/oturum-yonetimi.php';

if (isset($_POST["newfolder"]) and $_POST["newfolder"]!="") {
	$link=$gt.duzenle($_POST["newfolder"]).$ckeditor;
	if (file_exists($ana_dizin.$gt.duzenle($_POST["newfolder"]))) {
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
			mkdir($ana_dizin.$gt.duzenle($_POST["newfolder"]),0777);
			header("location:index.php?file={$link}");
		} catch (Exception $e) {
			?>
			<script>
				swal("Warning!!! Oluşturma hatası.", {
					icon: "warning",
					buttons: false,
					timer: 2000,
				});
			</script>
			<?php
		}
	}
}
?>