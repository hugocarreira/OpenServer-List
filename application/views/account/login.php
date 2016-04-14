
<div class="row">
	<?php echo '<h1>'.$title_page.'</h1>'; ?>
	<?php if(isset($error)) : ?>
		<div class="error">
			<?php echo $error; ?>
		</div>
	<?php endif; ?>
	<?php echo validation_errors(); ?>
	<?php $attributes = array('class' => 'col s12'); ?>
	<?php echo form_open('account/login', $attributes) ?>
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">email</i>
			    <input type="email" name="email" id="email" class="validate" required="" aria-required="true" /><br />
			    <label for="email">Email :</label>
		    </div>
	        <div class="input-field col s6">
	        	<i class="material-icons prefix">lock</i>
			    <input type="password" name="password" id="password" class="validate" required="" aria-required="true" /><br />
			    <label for="password">Password :</label>
			</div>
			<div class="input-field col s12">
				<button class="btn waves-effect waves-light" type="submit" name="submit" value="Login">Login
				    <i class="material-icons right">send</i>
				 </button>
			</div>
		</div>
	</form>
</div>