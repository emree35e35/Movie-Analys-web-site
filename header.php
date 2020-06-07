<?php include 'baglan.php' ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js">
	</script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!--Monserrat Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,800&display=swap" rel="stylesheet">
	<!--Oswald Font-->
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.16.0/css/mdb.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Averia Sans Libre' rel='stylesheet'>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<link rel="shortcut icon" href="/fikrimol.png" type="image/png">

	<title id='webTitle'>Hoşgeldiniz</title>
</head>
<body onload="zoom()">
	<header>
		<div class="menu">
			<div class="solbilgi">
				<a href="index.php">
					<img src="fikrimol.png">
				</a>
				<h3>Emre çevik</h3>
			</div>
			<div class="solnav">
				<div class="baslik">
					<span>MENÜ</span>
				</div>
				<div class="solnavliste">
					<a class="liste" href="index.php">
						<i class="fas fa-home mr-3"></i>Anasayfa</a>
						<a href="top15turimdb.php" class="liste" >
							<i class="fas fa-chart-line mr-3"></i>Top15 İmdb(Film)</a>
							<a class="liste" href="top15turbegeni.php">
								<i class="fas fa-chart-line mr-3"></i>Top15 Beğeni(Film)</a>
								<a href="ogoresorgufilm.php" class="liste" >
									<i class="fas fa-male mr-3"></i>Oyuncu Begeni(Film)</a>
									<a class="liste" href="ygoresorgu.php">
										<i class="fas fa-video mr-3"></i>Yönetmen İmdb(Film)</a>
										<a href="fgoresorguoyuncu.php" class="liste" >
											<i class="fas fa-film mr-3"></i>Film Begeni(Oyuncu)</a>
										</div>
									</div>
								</div>
							</header>
							<div class="icerik">
								<div class="top">
									<div id="header" class="baslik">
										<span>Fikrim OL!</span>
									</div>
								</div>
								<script type="text/javascript">
									var i = 0;
									setInterval(function() {
										document.title = i++ % 2 == 0 ? "#EvdeKal" : "Fikrim OL";
									}, 1000);
								</script>
