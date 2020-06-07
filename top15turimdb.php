<?php include 'header.php' ?>
<div class="ortabaslik">
	<span>Fikrim OL! / İmdb'ye Göre Top 15 Filmler</span>
</div>
<div class="ortaicerik">
	<?php  

	if(isset($_GET['filmtur']))
	{  
		$b=$_GET['filmtur'];
		$query = "SELECT movie_title,imdb_score,cast_total_facebook_likes  FROM mytable WHERE mytable.genres LIKE '%$b%' ORDER BY imdb_score desc LIMIT 15";

	}
	else{



		$query = "SELECT movie_title,imdb_score,cast_total_facebook_likes FROM mytable ORDER BY imdb_score desc LIMIT 15";
	}
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
		$a=",";
		$e='"';
		$c="[";
		$d="]";
		$b=$_GET['filmtur'];
		?>



	</head>
	<div class="ortaanaicerik" >
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("visualization", "1.1", {packages:["bar"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Film', 'İmdb Puanı'],

					<?php while($row = $result->fetch_assoc()) 
					{ 
						echo $c.$e.$row['movie_title'].$e.$a.$row['imdb_score'].$d.$a;
					}

					?>
					]);

				var options = {
					chart: {
						title: 'Top15',

						subtitle: 'İmdbye göre en çok oylanan ilk 15 film---<?php echo $b;?>'
					},
					titleTextStyle:{color: 'red', fontName: 'Averia Sans Libre',},
					backgroundColor:"none",
					chartArea:{
						backgroundColor: 'none'
					},
				};

				var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

				chart.draw(data, google.charts.Bar.convertOptions(options));
			}
		<?php } ?>
	</script>
	<div id="columnchart_material" class="ygorecolumnchart"></div>

	<div class="turlistesi">
		<div class="baslik">
			<h3 style="color: white;"><u>TÜR SEÇİMİ</u></h3>
		</div>
		<div class="turliste">
			<ul class="ulilk">
				<li onclick="location.href='top15turimdb.php?filmtur=Action';">

					<label  >Aksiyon</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=Adventure';">

					<label >Macera</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=Fantasy';">

					<label>Fantezi</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=Sci-Fi';">

					<label >Bilim Kurgu</label>

				</li>


				<li onclick="location.href='top15turimdb.php?filmtur=Animation';">
					<label >Animasyon</label>

				</li>
				<li onclick="location.href='top15turimdb.php?filmtur=Comedy';">
					<label  >Komedi</label>

				</li>
				<li onclick="location.href='top15turimdb.php?filmtur=Western';">
					<label >Western</label>

				</li>
			</ul>
			<ul class="ulikinci">
				<li onclick="location.href='top15turimdb.php?filmtur=Family';">
					<label  >Aile</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=Thriller';">
					<label >Gerilim</label>

				</li>
				<li onclick="location.href='top15turimdb.php?filmtur=Drama';">

					<label >Drama</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=History';">

					<label >Tarih</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=Romance';">

					<label  >Romantik</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=Horror';">

					<label  >Korku</label>

				</li>

				<li onclick="location.href='top15turimdb.php?filmtur=Crime';">

					<label >Suç</label>

				</li>

			</ul>
		</div>
	</div>
</div>

</div>
<?php include'footer.php' ?>