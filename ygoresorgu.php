<?php include 'header.php' ?>
<div class="ortabaslik">
	<span>Fikrim OL! / Yönetmene Göre Filmlerinin İmdb'sini Sorgulama</span>
</div>
<div class="ortaicerik">
	<div id="ogoresorgu">
		<form action="islem.php" method="POST" >
			<span>Yönetmen Adı:
			</span>
			<input type="text" name="yonetmenadiinput" id="search_text" required="" placeholder="<?php if(isset($_GET['yonetmenadi']))
			{
				$a=$_GET['yonetmenadi'];
				echo $a;
			}
			else
			{
				echo "Yönetmen adını buraya giriniz..";
			}
			?>">
			<button  type="submit" class="btn btn-primary btn-lg" name="sorgulamabtnyonetmen">Sorgula</button>
			<div id="result" class="ajaxsecimi"></div>
		</form>
	</div>
	
	<?php if(isset($_GET['yonetmenadi']))
	{  
		$b=$_GET['yonetmenadi'];
		$query2 = "SELECT mytable.director_name,mytable.movie_title,mytable.imdb_score FROM mytable WHERE lower(mytable.director_name) LIKE lower('%$b%')";
		$result6 = $conn->query($query2);

		if ($result6->num_rows > 0) {



			?>

			<div id="columnchart_material" class="ygorecolumnchart"></div>
		<?php }
		else {
			?>
			<script >
				swal("Hata!", "Aradığınız yönetmen bulunamadı", "error");
			</script>
			<?php 

		}
	} ?>

	<?php  
	$query = "SELECT mytable.director_name,mytable.movie_title,mytable.imdb_score FROM mytable WHERE lower(mytable.director_name) LIKE lower('%$b%') ORDER BY imdb_score desc ";
	$result = $conn->query($query);
	$result2 = $conn->query($query);
	$result3 = $conn->query($query);
	$result4 = $conn->query($query);
	if ($result->num_rows > 0) {
		$a=",";
		$e='"';
		$c="[";
		$d="]";

		?>

		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("visualization", "1.1", {packages:["bar"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['Film', 'İmdb'],

					<?php while($row = $result->fetch_assoc()) 
					{ 
						echo $c.$e.$row['movie_title'].$e.$a.$row['imdb_score'].$d.$a;
					}

					?>
					]);

				var options = {
					chart: {
						title: 'Yönetmenin filmlerinin İMDB si',

					},
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
	<script>
		$(document).ready(function(){
			load_data();
			function load_data(yonetmenquery)
			{
				$.ajax({
					url:"islem.php",
					method:"post",
					data:{yonetmenquery:yonetmenquery},
					success:function(data)
					{
						$('#result').html(data);
					}
				});
			}

			$('#search_text').keyup(function(){
				var search = $(this).val();
				if(search != '')
				{
					load_data(search);
				}
				else
				{
					load_data();      
				}
			});
		});
	</script>

</div>
<?php include'footer.php' ?>