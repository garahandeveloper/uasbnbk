<script type="text/javascript">
	alertMess();
	ajaxloadNilai();
	$(document).ready(function(){
		$(".btn-class-load-number").on("click", function(){
			$.ajax({
				type : "POST",
				url : "halaman_soal_siswa/load_number_soal?pg=1",
				data : $(this).serialize(),
				beforeSend: function() {
					$(".class-loading-cube").show();
				},
				success : function(data){
					$(".load-number-soal-pilihan-ganda").html(data);
				}
			}).done(function(){
				$(".class-loading-cube").hide("5000");
			});
		});
		$(".btn-class-load-nilai").on("click", function(){
			$.ajax({
				type : "POST",
				url : "halaman_soal_siswa/nilai_keseluruhan?pg=1",
				data : $(this).serialize(),
				beforeSend: function() {
					$(".class-loading-cube").show();
				},
				success : function(data){
					$(".load-nilai-all").html(data);
				}
			}).done(function(){
				$(".class-loading-cube").hide("5000");
			});
		});
		$("#form123").submit(function(){
			if($(".mode-form-soal").val() == 1) {
				var linkSubmit = "halaman_soal_siswa/jawaban_siswa";
			}
			if($(".mode-form-soal").val() == 2){
				var linkSubmit = "halaman_soal_siswa/jawaban_siswa_essay";
			}
			for(instance in CKEDITOR.instances){
				CKEDITOR.instances[instance].updateElement();
			}
			//alert(linkSubmit);
			//console.log($(this).serialize());
			$.ajax({
				type : "POST",
				url : linkSubmit,
				data : $(this).serialize(),
				beforeSend: function() {
					$(".class-loading-cube").show();
				},
				success : function(data){
					loadSoalStorageMultipelCoice();
					ajaxloadNilai();
				}
			}).done(function(){
				$(".class-loading-cube").hide("5000");
			});
			return false;
			
		});
		
		// var fiveSeconds = new Date().getTime() + 5000;
		// <!---1800000 30 menit-->
		// $('#clock').countdown(fiveSeconds, {elapse: true}).on('update.countdown', function(event) {
		  // var $this = $(this);
		  // if (event.elapsed) {
			
		  // } else {
			// $this.html(event.strftime('Waktu: <span>%H:%M:%S</span>'));
			
		  // }
		// });
		
		
		

	});
	function alertMess(){
		alert("ok");
	}
	function loadSoalStorageMultipelCoice(){
		$.ajax({
			type : "POST",
			url : "halaman_soal_siswa/load_soal?pg=1&id_bank_soal=" + localStorage.getItem("id_soal_pilihan"),
			data : $(this).serialize(),
			success : function(data){
				$(".view-soal").html(data);
			}
		})
	}
	function ajaxloadNilai(){
		$.ajax({
			type : "POST",
			url : "halaman_soal_siswa/nilai_compile?pg=1",
			data : $(this).serialize(),
			success : function(data){
				$("#nilai-keseluruhan").html(data);
			}
		})
	}
	
	// function clearLocalStorage(){
		// window.localStorage.clear();
	// }
	// if(localStorage.getItem("saveWaktu") == null || localStorage.getItem("saveWaktu") == 1){
		// var time = <?php echo $_SESSION["waktu"] * 60;?>
	// } else {
		// var time = localStorage.getItem("saveWaktu");
	// }
		
	// function waktuUjian(){
		// var time = '500';
		// if(time > 0){
			// time--;
			// menit = time / 60;
			// var waktu = time + 1;
			
			// localStorage.setItem("saveWaktu", waktu);
			// var lo = localStorage.getItem("saveWaktu");
			// $("#waktu-ujian").html("Sisa Waktu Ujian " + menit.toFixed(0) + " Menit ");
			// setTimeout("waktuUjian()", 1000);
		// }else {
			// $("#waktu-ujian").html("Waktu Habis");
			// <!--$(".view-soal").hide();
			// <!--$(".waktu-habis").html("Anda Sudah Melewati Batas Waktu");
		// }
	// }
	// waktuUjian();
	// // catatan waktu masih belum bisa
	
	
	
</script>
<style>
	.btn-class-load-number {
		width : 60px;
		height: 60px;
		position: fixed;
		right:10px;
		margin-top: 20%;
		z-index: 1;
		border-radius:50%;
	}
	.btn-class-load-nilai {
		width : 60px;
		height: 60px;
		position: fixed;
		right:10px;
		margin-top: 35%;
		z-index: 1;
		border-radius:50%;
	}
	.btn-waktu {
		width : 100px;
		height: 100px;
		position: fixed;
		right:10px;
		margin-top: 30%;
		z-index: 1;
		border-radius:50%;
	}
</style>
<div class="content-wrapper" style="min-height: 561px;">
	<section class="content">
		<button type="button" class="btn btn-info new-data-class btn-class-load-number" data-toggle="modal" data-target="#myModal">Nomer</button>
		<button type="button" class="btn btn-info new-data-class btn-class-load-nilai" data-toggle="modal" data-target="#myModal2">Nilai</button>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Nilai</h3>
				
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<div id="nilai-keseluruhan">
					
				</div>
				<div id="waktu-ujian"></div>
				<script>
				
				</script>
			<!-- /.box-body -->
			<!-- /.box-footer-->
		</div>
		
		<div class="modal fade" id="myModal" role="dialog" style="overflow:scroll;">
			<div class="modal-dialog">
			
				<div class="modal-content">
					<div class="modal-body">
						<div class="load-number-soal-pilihan-ganda"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModal2" role="dialog" style="overflow:scroll;">
			<div class="modal-dialog">
			
				<div class="modal-content">
					<div class="modal-body">
						<div class="load-nilai-all"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="box soal-pilihan-class">
			<div class="box-body">
				<form action="#" method="POST" name="form123" id="form123">
					<div class="view-soal">silahkan klik nomer di sebelah kanan</div>
					
				</form>
              </div>
		</div>
	</section>
</div>