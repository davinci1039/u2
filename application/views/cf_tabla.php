<table class='bordered highlight'>
	<thead>
		<th>UAS</th>
		<th>KKS</th>
		<th>Número</th>
		<th>CF</th>
		<th>Ver plano</th>
	</thead>
	<tbody>
		<?php
		foreach ($complejosFuncionales as $cf)
		{
			echo "<tr>";
				echo "<td>".$cf->uas."</td>";
				echo "<td>".$cf->kks."</td>";
				echo "<td>".$cf->numero."</td>";
				echo "<td>".$cf->cf."</td>";
				if ($cf->link == "Anulado") {
					echo "<td><i class='fa fa-window-close-o' aria-hidden='true'></i> Anulado</td>";
				}
				else
				{
					echo "<td><a class='waves-effect waves-light' href='".base_url()."abrir/cf/".$cf->id."' target='_blank'> <i class='fa fa-eye' aria-hidden='true'></i> Ver ".$cf->uas."</a></td>";
				}
			echo "</tr>";
		}
		?>
	</tbody>
</table>
<?php echo $this->pagination->create_links(); ?>