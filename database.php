
<?php
	$connessione = mysqli_connect("localhost", "root", "", "gelati");

	if(isset($_POST["richiesta"]))
	{
		

		switch($_POST["richiesta"])
		{
			case "elenco":
			{
				$raw = mysqli_query($connessione, "SELECT * FROM gelato");
				$risultato = array();

				while($riga = mysqli_fetch_array($raw))
				{
					array_push($risultato, $riga);
				}

				echo json_encode($risultato);
				break;
			}

			case "inserisci":
			{
				$nome = $_POST["nome"];
				$prezzo = $_POST["prezzo"];
				$produttore = $_POST["produttore"];
				
				if(mysqli_query($connessione, "INSERT INTO gelato (nome, prezzo, produttore) VALUES ('$nome',$prezzo,'$produttore')"))
				{
					echo "Gelato Aggiunto";
				}
				else
				{
					echo "Errore";
				}
				break;
			}
		}
	}

	mysqli_close($connessione);
?>
