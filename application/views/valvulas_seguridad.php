<table class='bordered highlight'>
	<thead>
		<th>KKS</th>
		<th>Valor de Disparo</th>
		<th>Recinto</th>
		<th>Ver FDP</th>
	</thead>
	<tbody>
		<?php
		foreach ($valvulas_seguridad as $vs)
		{
			echo "<tr>";
				echo "<td>".$vs->kks."</td>";
				echo "<td>".$vs->presion_disparo."</td>";
				echo "<td>".$vs->raumarm."</td>";
				echo "<td>"."Ver FDP"."</td>";
				//if ($cf->link == "Anulado") {
				//	echo "<td><i class='fa fa-window-close-o' aria-hidden='true'></i> Anulado</td>";
				//}
				//else
				//{
				//	echo "<td><a class='waves-effect waves-light' href='".base_url()."abrir/cf/".$cf->id."' target='_blank'> <i class='fa fa-eye' aria-hidden='true'></i> Ver ".$cf->uas."</a></td>";
				//}
			echo "</tr>";
		}
		?>
	</tbody>
</table>
	<?php 	
		echo $this->pagination->create_links();
		if(isset($affected_rows))
		{
			echo "Cantidad en búsqueda: ".$affected_rows." válvulas.<br>";
		}
	?>
Cantidad total: <?=$total_rows?> válvulas.