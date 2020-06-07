<?php include 'header.php' ?>
<div class="ortabaslik">
	<span>Fikrim OL! / Filme Göre Oyuncuların Beğenisini Sorgulama</span>
</div>
<div class="ortaicerik">
	<div id="ogoresorgu">
		<form action="islem.php" method="POST" >
			<span>Film Adı:</span>
			<input type="text" name="filmadiinput" id="search_text" required="" placeholder="<?php if(isset($_GET['filmadi']))
			{
				$a=$_GET['filmadi'];
				echo $a;
			}
			else
			{
				echo "Film adını buraya giriniz..";
			}
			?>">
			<button  type="submit" class="btn btn-primary btn-lg" name="sorgulamabtnfilm">Sorgula</button>
			<div id="result" class="ajaxsecimi"></div>
		</form>
	</div>
	<?php if(isset($_GET['filmadi']))
	{  
		$b=$_GET['filmadi'];
		$query2 = "SELECT movie_title,actor_1_name,actor_2_name,actor_3_name,actor_1_facebook_likes,actor_2_facebook_likes,actor_3_facebook_likes FROM mytable WHERE lower(mytable.movie_title) LIKE lower('%$b%') ";

		$result6 = $conn->query($query2);

		if ($result6->num_rows > 0) {
			?>
			<div id="piechart" class="dashboardpiechart" ></div>
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
	$query = "SELECT movie_title,actor_1_name,actor_2_name,actor_3_name,actor_1_facebook_likes,actor_2_facebook_likes,actor_3_facebook_likes FROM mytable WHERE lower(mytable.movie_title) LIKE lower('%$b%') ";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	if ($result->num_rows > 0) {

		?>

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);

			function drawChart() {

				var data = google.visualization.arrayToDataTable([
					['Task', 'Hours per Day'],
					['<?php echo $row['actor_1_name'] ?>',     <?php echo $row['actor_1_facebook_likes']; ?>],
					['<?php echo $row['actor_2_name'] ?>',     <?php echo $row['actor_2_facebook_likes']; ?>],
					['<?php echo $row['actor_3_name'] ?>',     <?php echo $row['actor_3_facebook_likes']; ?>],

					]);

				var options = {
					width: 1000,
					height: 600,
					chart: {
						title: 'Company Performance',
						subtitle: 'Sales, Expenses, and Profit: 2014-2017'
					},
					backgroundColor: {
						fill: 'none',
						fillOpacity: 0.8
					},
					legend: {
						position: 'top', textStyle: {color: 'white', fontSize: 16,bold:1}
					},

				}

				var chart = new google.visualization.PieChart(document.getElementById('piechart'));

				chart.draw(data, options);
			}
		<?php } ?>
	</script>	
	<script>
		$(document).ready(function(){
			load_data();
			function load_data(oyuncubegeniquery)
			{
				$.ajax({
					url:"islem.php",
					method:"post",
					data:{oyuncubegeniquery:oyuncubegeniquery},
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


	

<?php include'footer.php' ?>