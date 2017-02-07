<?php
	$tab = array("img/ane.jpg", "img/chat.jpg", "img/chien.jpg", "img/lama.jpg", "img/lapins.jpg", 
"img/lionne.jpg", "img/ours.jpg", "img/ane.jpg", "img/chat.jpg", "img/chien.jpg", "img/lama.jpg", 
"img/lapins.jpg", "img/lionne.jpg", "img/ours.jpg");
	shuffle($tab);

	session_start();
	if(isset($_POST["prenom"])){
		$_SESSION["prenom"] = $_POST["prenom"];
	}
?>
<!DOCTYPE	html>
<html>
	<head>
		<title>Jeux-des-paires</title>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Kumar+One" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript">
			var tab = [<?php 
						foreach ($tab as $indexDuTableau => $caseDuTableau){
							if($indexDuTableau != count($tab)-1)
								echo "'".$caseDuTableau."' ,";
							else
								echo "'".$caseDuTableau."'";
						};?>];			
		</script>
	</head>

	<body>
		<div id="titre">
			<h1>JEU DES PAIRES</h1>
		</div>
		<?php
			if(!isset($_SESSION["prenom"])){
				echo '<div id="formulairePrenom">
						<h2>Entrez votre pseudo</h2>
						<form method="post" action="index.php">
							<input type="text" name="prenom" id="prenom" required />
							<input type="submit" name="submit" id="submit" />
						</form>
					</div>';
			}
			if(isset($_SESSION["prenom"])){
				if(isset($_GET["victoire"])&&isset($_GET["time"])){
					$victoire = $_GET["victoire"];
					$time1 = $_GET["time"];
				}else{
					$victoire = false;
				}
				if($victoire == "true"){
					echo '<h1> Bravo '.$_SESSION["prenom"].', tu as gagné !</h1><br /><div class="boutton"><input type="button" class="restart" value="Recommencer" onClick="recommencer()");"></div>';
					$time2 = time();
					echo "<p>Vous avez réussi en ".($time2 - $time1)." secondes</p>";
				}else{	
					$time = time();
					echo "<p>Règles du jeu: Afficher toutes les paires pour gagner</p>
						  <p>Vous avez trouvé <span id='paires'>0</span> paires cachées</p>
						  <span id='chronotime'>00:00</span>";
					echo "<div id='photo'>";
					for($i=0; $i<=count($tab)-1; $i++) {
						echo '<img src="img/dos.png" class="photo" onclick="choisir('.$i.')" draggable="false">';
					}
					echo "</div>";
				}
			}		
			?>
		<script type="text/javascript">var time = <?php echo $time;?>;</script>
		<script type="text/javascript" src="js/script.js"></script>
		
	</body>
</html>
