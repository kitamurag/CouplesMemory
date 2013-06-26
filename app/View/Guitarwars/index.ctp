<h1>index.ctp</h1>
<?php var_dump($guitarwars); ?>
<table>
	<tr>
		<th>id</th>
		<th>name</th>
		<th>screenshot</th>
	</tr>
	<?php foreach($guitarwars as $row): ?>
	<tr>
		<td><?php echo $this->Html->link($row['Guitarwar']['id'],array('action'=>'view'),$row['Guitarwar']['id']); ?></td>
		<td><?php echo $row['Guitarwar']['name']; ?></td>
		<td><?php echo $row['Guitarwar']['screenshot']; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
