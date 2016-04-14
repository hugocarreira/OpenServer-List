
<div class="row">
	<?php echo '<h1>'.$title_page.'</h1>'; ?>
	<?php echo validation_errors(); ?>
	<?php $attributes = array('class' => 'col s12'); ?>
	<?php echo form_open('account/create', $attributes) ?>
		<div class="row">
			<div class="input-field col s6">
				<i class="material-icons prefix">account_circle</i>
		        <input id="first_name" name="name" type="text" class="validate" required="" aria-required="true">
		        <label for="first_name">First Name <font color="red">*</font></label>
	        </div>
	        <div class="input-field col s6">
			    <input id="first_name" name="lastname" type="text" class="validate" required="" aria-required="true"/>
			    <label for="last_name">Last name <font color="red">*</font></label>
			</div>
			<div class="input-field col s12">
			<i class="material-icons prefix">email</i>
			    <input id="email" name="email" type="email" class="validate" required="" aria-required="true"/>
			    <label for="email">Email <font color="red">*</font></label>
			</div>
			<div class="input-field col s12">
				<i class="material-icons prefix">lock</i>
			    <input id="password" name="password" type="password" class="validate" required="" aria-required="true"/>
			    <label for="password">Password <font color="red">*</font></label>
			</div>
			<div class="input-field col s12">
				<button class="btn waves-effect waves-light" type="submit" name="action" value="Create New Account">Create New Account
				    <i class="material-icons right">send</i>
				 </button>
			</div>
	    </div>
	</form>
</div>