<script>
$(document).ready(function(){
	$(".nomer-soal-pilihan-ganda").on("click", function(){
		var id = $(this).attr("value");
		var locid = localStorage.setItem("id_soal_pilihan", id);
		$.ajax({
			type : "POST",
			url : "halaman_soal_siswa/load_soal?pg=1&nisn=" + <?php echo $_SESSION['nisn'];?> + "&nik=" + <?php echo $_SESSION['nik']; ?> +"&token=" + <?php echo $_SESSION["token"]; ?> + "&id_bank_soal=" + id,
			data : $(this).serialize(),
			beforeSend: function() {
				$(".class-loading-cube").show();
			},
			success : function(data){
				$(".view-soal").html(data);
			}
		}).done(function(){
			$(".class-loading-cube").hide("5000");
		});
	});
	$(".nomer-soal-essay").on("click", function(){
		var id = $(this).attr("value");
		var locid = localStorage.setItem("id_bank_soal_essay", id);
		$.ajax({
			type : "POST",
			url : "halaman_soal_siswa/load_soal?pg=2" + "&id_bank_soal_essay=" + id,
			data : $(this).serialize(),
			beforeSend: function() {
				$(".class-loading-cube").show();
			},
			success : function(data){
				$(".view-soal").html(data);
			}
		}).done(function(){
			$(".class-loading-cube").hide("5000");
		});
	});
});
</script>
<style>
	.nomer-soal-pilihan-ganda, .nomer-soal-essay {
		border-radius: 50%;
		width:50px;
		height:50px;
	}
	.span-button {
		color:#000;
	}
</style>
<?php
$no=0;
foreach($query as $item){
	$no++;
	if($item["status_jawaban"] == "1"){
		echo "
			<button type='button' class='btn btn-primary nomer-soal-pilihan-ganda' value='$item[id_bank_soal]'>$no</button>
		";
	} else {
		echo "
			<button type='button' class='btn btn-info nomer-soal-pilihan-ganda' value='$item[id_bank_soal]'>$no<span class='span-button'>$item[jawaban]</span></button>
		";
	}
}
foreach($query2 as $item2){
	$no++;
	echo "
		<button type='button' class='btn btn-success nomer-soal-essay' value='$item2[id_bank_soal_essay]'>$no</button>
	";
}
?>
