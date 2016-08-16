<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<div class="card card-container">


<div class="modal-header">
	<legend class="text-center">Login</legend>
</div>
      
<div class="form-group row">
<input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
</div>
<div class="form-group row">
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
</div>
<div class="form-group row">
<button class="btn btn-primary btn-block btn-signin" type="submit">Sign in</button>
</div>

<p class="message">Not registered? <a href="#">Create an account</a></p></div>
<?= $this -> Form -> end() ?>