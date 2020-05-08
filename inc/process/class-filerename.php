<?php
if (is_file("inc/oturum-yonetimi.php"))
	require 'inc/oturum-yonetimi.php';

if (isset($_POST["dosyaadi"]) and $_POST["dosyaadi"]!="") {
	$postedilen=explode(".",trim(strip_tags($_POST["dosyaadi"])));
	$dosyaadi=duzenle($postedilen[0]);
	$dosyauzantisi=mb_strtolower($postedilen[1]);
	$eskidosya=$ana_dizin.$gt.$_POST["dosya"];
	$yenidosya=$ana_dizin.$gt.$dosyaadi.".".$dosyauzantisi;
	if ($eskidosya==$yenidosya) {
		?>
		<script>
			swal("Güncellendi!", {
				icon: "success",
				buttons: false,
				timer: 2000,
			});
		</script>
		<?php
	}
	else{
		if (in_array($dosyauzantisi, $image_uzantilari)) {
			if (file_exists($yenidosya)) {
				?>
				<script>
					swal("Aynı isim de başka dosya var!", {
						icon: "warning",
						buttons: false,
						timer: 2000,
					});
				</script>
				<?php
			}
			else{
				rename($eskidosya, $yenidosya);
				header("location:index.php?file={$filemanagerlink}");
			}
		}
		else{
			?>
			<script>
				swal("Yazdığınız uzantı desteklenmiyor!", {
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