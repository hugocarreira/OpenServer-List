<?php echo '<h1>'.$title_page.'</h1>'; ?>

<?php if(isset($error)) : ?>
	<?php echo '<h2>'.$error,'</h2>'; ?>
<?php endif; ?>

<?php if(isset($sucess)) : ?>
	<?php echo '<h2>'.$sucess.'</h2>'; ?>
<?php endif; ?>

<?php echo validation_errors(); ?>
<?php echo form_open('account/createserver') ?>
    
    <input type="hidden" name="id">

    <label for="Name">ServerName : </label>
    	<input type="name" name="name" /><br />

    <label for="Title">Title : </label>
    	<input type="title" name="title" /><br />

    <label for="IP">IP : </label>
    	<input type="ip" name="ip"/><br />

    <label for="Port">Port : </label>
    	<input type="port" name="port" /><br />

    <label for="Version">Version : </label>
	    <select name="version">
	    	<option></option>
    	<?php foreach($versions as $row) : ?>
    		<option><?=$row->version;?></option>
    	<?php endforeach; ?>
    	</select>
    	<br />

    <label for="Site">Site : </label>
    	<input type="site" name="site" /><br />

    <label for="Description">Description : </label>
    	<textarea name="description" /></textarea><br />

    <input type="submit" name="submit" value="Login" />

</form>