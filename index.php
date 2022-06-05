<?php 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$bangunruang = $_POST['bangun-ruang'];

		if (isset($_POST['ba-panjang']) && ($_POST['ba-lebar']) && ($_POST['ba-tinggi'])) {
			$ba_panjang = $_POST['ba-panjang'];
            $ba_tinggi = $_POST['ba-tinggi'];
            $ba_lebar = $_POST['ba-lebar'];
			$ba_vol = $ba_panjang * $ba_lebar * $ba_tinggi;
	        $ba_luas = 2*(($ba_panjang * $ba_lebar)+($ba_lebar * $ba_tinggi)+($ba_panjang * $ba_tinggi));
	        $ba_kel = 4*($ba_panjang+$ba_lebar+$ba_tinggi);
			}
		

        if (isset($_POST['tb-jarijari']) && ($_POST['tb-tinggi'])) {
            $tb_jarijari = $_POST['tb-jarijari'];
            $tb_tinggi = $_POST['tb-tinggi'];
            $tb_vol = pi() * pow($tb_jarijari,2) * $tb_tinggi;
            $tb_luas = (pi() * pow($tb_jarijari,2)) + (pi()*2*$tb_jarijari*$tb_tinggi);
        }

        if (isset($_POST['kr-jarijari']) && ($_POST['kr-tinggi']) && ($_POST['kr-gp'])) {
            $kr_jarijari = $_POST['kr-jarijari'];
            $kr_tinggi = $_POST['kr-tinggi'];
            $kr_gp = $_POST['kr-gp'];
            $kr_vol = 1/3 * pi() * pow($kr_jarijari,2) * $kr_tinggi;
            $kr_luas = (pi() * pow($kr_jarijari,2)) + (pi()*$kr_jarijari*$kr_tinggi);
        }

        if (isset($_POST['bo-jarijari'])) {
            $bo_jarijari = $_POST['bo-jarijari'];
            $bo_vol = 4/3 * pi() * pow($bo_jarijari,3);
            $bo_luas = 4 * (pi() * pow($bo_jarijari,2));
        }
	}

?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Nomor 4</title>
</head>
<body>
	<h3 class="mt-5" align="center" >Menghitung Volume, Luas, dan Keliling Bangun Ruang</h3>
	<div class="col-4 mt-5 mb-5 mx-auto">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		 <label for="exampleFormControlSelect1">Pilih Bangun Ruang!</label>
    		<select name="bangun-ruang" class="form-control">
     		<option>Balok</option>
      		<option>Tabung</option>
      		<option>Kerucut</option>
      		<option>Bola</option>
      		</select><br>
      	 <?php if($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <?php if($bangunruang == "Balok"): ?>
                    <label>Panjang Balok</label>
                    <input type="number" class="form-control" placeholder="cm" name="ba-panjang" required>
                    </input><br>
                    <label>Lebar Balok</label>
                    </label>
                    <input type="number" class="form-control" placeholder="cm" name="ba-lebar" required>
                    </input><br>
                    <label>Tinggi Balok</label>
                    </label>
                    <input type="number" class="form-control" placeholder="cm" name="ba-tinggi" required>
                    </input>
                <?php endif; ?>
                <?php if($bangunruang == "Tabung"): ?>
                    <label>Jari-Jari Tabung</label>
                    <input type="number" class="form-control" placeholder="cm" name="tb-jarijari" required></input>
                    <label>Tinggi Tabung</label>
                    <input type="number" class="form-control" placeholder="cm" name="tb-tinggi" required></input>
                <?php endif; ?>
                <?php if($bangunruang == "Kerucut"): ?>
                    <label>Jari-Jari Kerucut</label>
                    <input type="number" class="form-control" placeholder="cm" name="kr-jarijari" required></input>
                    <label>Tinggi Kerucut</label>
                    <input type="number" class="form-control" placeholder="cm" name="kr-tinggi" required></input>
                    <label>Garis Pelukis Kerucut</label>
                    <input type="number" class="form-control" placeholder="cm" name="kr-gp" required></input>
                <?php endif; ?>
                <?php if($bangunruang == "Bola"): ?>
                    <label>Jari-Jari Bola</label>
                    <input type="number" class="form-control" placeholder="cm" name="bo-jarijari" required></input>
                <?php endif; ?>
            <?php endif; ?>
		<button type="submit" name="submit" class="btn btn-primary">Kirim</button>
		</form>
	</div>
	<div class="col-4 mt-5 mb-5 mx-auto">
            <?php if(isset($ba_vol)&&($ba_luas)&&($ba_kel)): ?>
            <h4>Balok</h4><br>
            <h5>
            	<?php 
            	echo "Panjang: ".$ba_panjang." cm <br>";
            	echo "Lebar: ".$ba_lebar." cm <br>";
            	echo "Tinggi: ".$ba_tinggi." cm <br>"; 
            	echo "<br>";
            	echo "Volume: ".$ba_vol." cm<sup>3</sup> <br>";
            	echo "Luas: ".$ba_luas." cm<sup>2</sup> <br>";
            	echo "Keliling: ".$ba_kel." cm";
            	?>
            </h5>
            <?php endif; ?>

            <?php if(isset($tb_vol)&&($tb_luas)): ?>
            <h4>Tabung</h4><br>
            <h5>
            	<?php 
            	echo "Jari-jari: ".$tb_jarijari." cm <br>";
            	echo "Tinggi: ".$tb_tinggi." cm <br>"; 
            	echo "<br>";
            	echo "Volume: ".$tb_vol." cm<sup>3</sup> <br>";
            	echo "Luas :".$tb_luas." cm<sup>2</sup> <br>";
            	?>
            </h5>
            <?php endif; ?>

            <?php if(isset($kr_vol)&&($kr_luas)): ?>
            <h4>Kerucut</h4><br>
            <h5>
            	<?php 
            	echo "Jari-jari: ".$kr_jarijari." cm <br>";
            	echo "Tinggi: ".$kr_tinggi." cm <br>"; 
            	echo "Garis Pelukis: ".$kr_gp." cm <br>"; 
            	echo "<br>";
            	echo "Volume: ".$kr_vol." cm<sup>3</sup> <br>";
            	echo "Luas: ".$kr_luas." cm<sup>2</sup> <br>";
            	?>
            </h5>
            <?php endif; ?>

            <?php if(isset($bo_vol)&&($bo_luas)): ?>
            <h4>Bola</h4><br>
            <h5>
            	<?php 
            	echo "Jari-jari: ".$bo_jarijari." cm <br>";
            	echo "<br>";
            	echo "Volume: ".$bo_vol." cm<sup>3</sup> <br>";
            	echo "Luas: ".$bo_luas." cm<sup>2</sup> <br>";
            	?>
            </h5>
            <?php endif; ?>
        </div>
</body>
</html>