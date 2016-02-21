<?php echo '<h1>'.$title_page.'</h1>'; ?>

<?php if(isset($error)) : ?>
	<?php echo $error; ?>
<?php endif; ?>

<?php echo validation_errors(); ?>
<?php echo form_open('account/admin/createserver') ?>
    <label for="Email">Email : </label>
    <input type="email" name="email" /><br />

    <label for="Password">Password : </label>
    <input type="password" name="password" /><br />
    <input type="submit" name="submit" value="Login" />

</form>