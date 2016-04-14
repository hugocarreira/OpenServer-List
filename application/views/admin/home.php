<?php echo '<h1>'.$title_page.'</h1>'; ?>

<a href="createserver">Create Server</a> <br />
<a href="logout">Logout Account</a>

<p>
	<?php foreach($servers->result() as $row) : ?>
		<?php echo $row->name; ?> - <a href="editserver/<?=$row->id;?>">Editar</a>
	<?php endforeach; ?>