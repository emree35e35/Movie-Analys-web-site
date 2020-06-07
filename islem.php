<?php include 'baglan.php'; 


if(isset($_POST['sorgulamabtn']))
{
	$oyuncuadi = $_POST['ajaxsecim'];
	if ($oyuncuadi=="")
	{
		header("Location:../fikrimol/ogoresorgufilm.php?oyuncuadi=Tekrar Deneyiniz");
	}
	else{
		header("Location:../fikrimol/ogoresorgufilm.php?oyuncuadi=$oyuncuadi");
	}

}


if(isset($_POST['sorgulamabtnyonetmen']))
{
	$yonetmenadi = $_POST['ajaxsecim'];
	if ($yonetmenadi=="")
	{
		header("Location:../fikrimol/ygoresorgu.php?yonetmenadi=Tekrar Deneyiniz");
	}
	else{
		header("Location:../fikrimol/ygoresorgu.php?yonetmenadi=$yonetmenadi");
	}
}


if(isset($_POST['sorgulamabtnfilm']))
{
	$filmadi = $_POST['ajaxsecim'];

	if($filmadi=="")
	{
		header("Location:../fikrimol/fgoresorguoyuncu.php?filmadi=Tekrar Deneyiniz");
	}
	else{
		header("Location:../fikrimol/fgoresorguoyuncu.php?filmadi=$filmadi");
	}
}

if(isset($_POST["query"]))
{
	$output = '';
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($conn, $_POST["query"]);
		$query =
		"
		SELECT * FROM mytable WHERE lower(mytable.actor_1_name) LIKE lower('%".$search."%' ) or lower(mytable.actor_2_name) LIKE lower('%".$search."%') or lower(mytable.actor_3_name) LIKE lower('%".$search."%' ) ORDER BY imdb_score desc 

		";
	}
	else
	{
		$query = "
		SELECT * FROM mytable  ORDER BY imdb_score desc ";
	}
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0)
	{

		$output .= '<select name="ajaxsecim" style="width: 300px;margin-left:136px;height:40px;">

		';
		while($row = mysqli_fetch_array($result))
		{

			$output .= '
			<option value="'.$row["actor_1_name"].'">'.$row["actor_1_name"].'</option>
			<option value="'.$row["actor_2_name"].'">'.$row["actor_2_name"].'</option>
			<option value="'.$row["actor_3_name"].'">'.$row["actor_3_name"].'</option>
			';
		}
		echo $output;
	}

}

if(isset($_POST["yonetmenquery"]))
{
	$output = '';
	if(isset($_POST["yonetmenquery"]))
	{
		$search = mysqli_real_escape_string($conn, $_POST["yonetmenquery"]);
		$query =
		"SELECT mytable.director_name,mytable.movie_title,mytable.imdb_score FROM mytable WHERE lower(mytable.director_name) LIKE lower('%".$search."%') 
		";
	}
	else
	{
		$query = "
		SELECT * FROM mytable  ";
	}
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0)
	{

		$output .= '<select name="ajaxsecim" style="width: 300px;margin-left:171px;height:40px;">

		';
		while($row = mysqli_fetch_array($result))
		{

			$output .= '
			<option value="'.$row["director_name"].'">'.$row["director_name"].'</option>

			';
		}
		echo $output;
	}

}


if(isset($_POST["oyuncubegeniquery"]))
{
	$output = '';
	if(isset($_POST["oyuncubegeniquery"]))
	{
		$search = mysqli_real_escape_string($conn, $_POST["oyuncubegeniquery"]);
		$query =
		"SELECT movie_title,actor_1_name,actor_2_name,actor_3_name,actor_1_facebook_likes,actor_2_facebook_likes,actor_3_facebook_likes FROM mytable WHERE lower(mytable.movie_title) LIKE lower('%".$search."%') 
		";
	}
	else
	{
		$query = "
		SELECT * FROM mytable  ";
	}
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0)
	{

		$output .= '<select name="ajaxsecim" style="width: 300px;margin-left:102px;height:40px;">

		';
		while($row = mysqli_fetch_array($result))
		{

			$output .= '
			<option value="'.$row["movie_title"].'">'.$row["movie_title"].'</option>

			';
		}
		echo $output;
	}

}















?>


