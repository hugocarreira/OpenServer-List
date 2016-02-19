

<?php echo validation_errors(); ?>

<?php echo form_open('account/create') ?>

    <label for="Name">Name</label>
    <input type="text" name="name" /><br />

    <label for="Lastname">Lastname</label>
    <input type="text" name="lastname" /><br />

    <label for="Email">email</label>
    <input type="email" name="email" /><br />

    <label for="Password">Password</label>
    <input type="password" name="password" /><br />

    <input type="submit" name="submit" value="Create New Account" />

</form>