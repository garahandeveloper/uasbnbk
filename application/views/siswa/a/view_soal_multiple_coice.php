<style type='text/css'>
.jawaban-class {
	border:1px solid #000; 
	width:20px;
	height:20px; 
}
.span-item {
	width:95%;
	position:top;
	margin-top:0px;
	margin-left:20px;
	float:right;
	display: inline-block;
	overflow:scroll;
}
.class-multiple {
	font-size:20px;
	color:red;
}
</style>
<?php
foreach($query1 as $item){
	if($item["status_soal"] == 0){
		echo "
			<input type='hidden' class='mode-form-soal' value='1' hidden>
			<input type='hidden' name='nisn' value='$_SESSION[nisn]' hidden>
			<input type='hidden' name='nik' value='$_SESSION[nik]' hidden>
			<input type='hidden' name='token' value='$_SESSION[token]' hidden>
			<input type='hidden' name='no_soal' class='no_soal' value='$item[id_bank_soal]' hidden>
			<div class='span-item'>
				$item[soal]
			</div>
			<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='a' required> 
			<span class='class-multiple'> A </span>
			<div class='span-item'> $item[a]</div> <hr />
			<div></div>
			<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='b' required> 
			<span class='class-multiple'> B </span>
			<div class='span-item'> $item[b]</div> <hr />
			<div></div>
			<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='c' required> 
			<span class='class-multiple'> C </span>
			<div class='span-item'> $item[c]</div> <hr />
			<div></div>
			<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='d' required> 
			<span class='class-multiple'> D </span>
			<div class='span-item'> $item[d] </div><hr />
			<div></div>
			<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='e' required> 
			<span class='class-multiple'> E </span>
			<div class='span-item'> $item[e] </div><hr />
			<button type='submit' class='btn btn-primary btn-submit'>simpan</button>
		";
	} else {
		echo "
		
			<input type='hidden' name='nisn' value='$_SESSION[nisn]' hidden>
			<input type='hidden' name='nik' value='$_SESSION[nik]' hidden>
			<input type='hidden' name='token' value='$_SESSION[token]' hidden>
			<input type='hidden' name='no_soal' value='$item[id_bank_soal]' hidden>
			$item[soal] <hr />
		";
		if($item["jawaban"] == "a"){
			echo "<input type='radio' checked name='jawaban' class='jawaban-class' id='jawaban' value='a' required> 
			<span class='class-multiple'> A </span>
			<div class='span-item'> $item[a]</div> <hr />
			";
		} else {
			echo "<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='a' required>
			<span class='class-multiple'> a </span>
			<div class='span-item'> $item[a]</div> <hr />
			";
		}
		if($item["jawaban"] == "b"){
			echo "<input type='radio' checked name='jawaban' class='jawaban-class' id='jawaban' value='b' required>
			<span class='class-multiple'> B </span>
			<div class='span-item'> $item[b]</div> <hr />";
		} else {
			echo "<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='b' required> 
			<span class='class-multiple'> B </span>
			<div class='span-item'> $item[b]</div> <hr />";
		}
		if($item["jawaban"] == "c"){
			echo "<input type='radio' checked name='jawaban' class='jawaban-class' id='jawaban' value='c' required>
			<span class='class-multiple'> C </span>
			<div class='span-item'> $item[c]</div> <hr />";
		} else {
			echo "<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='c' required>
			<span class='class-multiple'> C </span>
			<div class='span-item'> $item[c]</div> <hr />";
		}
		if($item["jawaban"] == "d"){
			echo "<input type='radio' checked name='jawaban' class='jawaban-class' id='jawaban' value='d' required> 
			<span class='class-multiple'> D </span>
			<div class='span-item'> $item[d]</div> <hr />";
		} else {
			echo "<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='d' required> 
			<span class='class-multiple'> d </span>
			<div class='span-item'> $item[d]</div> <hr />";
		}
		if($item["jawaban"] == "e"){
			echo "<input type='radio' checked name='jawaban' class='jawaban-class' id='jawaban' value='e' required> 
			<span class='class-multiple'> E </span>
			<div class='span-item'> $item[e]</div> <hr />";
		} else {
			echo "<input type='radio' name='jawaban' class='jawaban-class' id='jawaban' value='e' required> 
			<span class='class-multiple'> E </span>
			<div class='span-item'> $item[e]</div> <hr />";
		}
		echo "<button type='submit' class='btn btn-primary btn-submit'>simpan</button>";
	}

}
?>