

<?php echo validation_errors(); ?>
<?php echo form_open('account/login') ?>
    <label for="Email">email</label>
    <input type="email" name="email" /><br />

    <label for="Password">Password</label>
    <input type="password" name="password" /><br />
    <input type="submit" name="submit" value="Login" />

</form>