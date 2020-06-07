<?php include 'header.php' ?>
<div class="ortabaslik">
	<span>Fikrim OL! / Oyuncuya Göre Filmlerinin Beğenisini Sorgulama</span>
</div>
<div class="ortaicerik">
	<div id="ogoresorgu">
		<form action="islem.php" method="POST" >
			<span>Oyuncu Adı:</span>
			<input type="text" name="oyuncuadiinput" id="search_text" required=""  placeholder="<?php if(isset($_GET['oyuncuadi']))
			{
				$a=$_GET['oyuncuadi'];
				echo $a;
			}
			else
			{
				echo "Oyuncu adını buraya giriniz..";
			}
			?>">

			

			<button  type="submit" class="btn btn-primary btn-lg" name="sorgulamabtn">Sorgula</button>
			<div id="result" class="ajaxsecimi"></div>
		
		</form>
	</div>



		<?php if(isset($_GET['oyuncuadi']))
		{  
			$b=$_GET['oyuncuadi'];
			$query2 = "SELECT mytable.movie_title,mytable.imdb_score FROM mytable WHERE lower(mytable.actor_1_name) LIKE lower('%$b%') or lower(mytable.actor_2_name) LIKE lower('%$b%') or lower(mytable.actor_3_name) LIKE lower('%$b%') ORDER BY imdb_score desc ";
			$result6 = $conn->query($query2);

			if ($result6->num_rows > 0) {



				?>

				<div id="columnchart_material" class="ygorecolumnchart"></div>
			<?php }
			else {
				?>

				<script>
					swal("Hata!", "Aradığınız Oyuncu Bulunamadı", "error");
				</script>


				<?php 

			}
		} ?>

		<?php  
		$query = "SELECT mytable.movie_title,mytable.imdb_score,mytable.cast_total_facebook_likes FROM mytable WHERE lower(mytable.actor_1_name) LIKE lower('%$b%') or lower(mytable.actor_2_name) LIKE lower('%$b%') or lower(mytable.actor_3_name) LIKE lower('%$b%') ORDER BY cast_total_facebook_likes desc ";

		$result = $conn->query($query);
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
						['Film', 'Begeni'],

						<?php while($row = $result->fetch_assoc()) 
						{ 
							echo $c.$e.$row['movie_title'].$e.$a.$row['cast_total_facebook_likes'].$d.$a;
						}

						?>
						]);

					var options = {
						chart: {
							title: 'Oyuncunun oynadıgı filmlerin begenisi',

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
				function load_data(query)
				{
					$.ajax({
						url:"islem.php",
						method:"post",
						data:{query:query},
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