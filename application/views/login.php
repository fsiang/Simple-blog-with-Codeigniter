<?php 
	$title = "登入";
	$this->load->view('template/header',compact('title'));
	$this->load->view('template/nav');
 ?>

<main class="container row">
	<section class="col-lg-6 col-lg-offset-4">
		<?= form_open('auth/login/formValidation','class="form-horizontal"'); ?>
		<fieldset>
			<legend>會員登入</legend>
			<div class="form-group row">
				<label class="col-lg-2 control-label" for="user">帳號:</label>
				<div class="col-lg-6">
					<input class="form-control" id="user" name="user" type="text"
						placeholder="user" value="<?= form_prep(set_value('user')); ?>">
				</div>
				<span class="text-danger"><?= form_error('user'); ?></span>
			</div>
			<div class="form-group row">
				<label class="col-lg-2 control-label" for="password">密碼:</label>
				<div class="col-lg-6">
					<input class="form-control" id="password" name="password" type="password"
						placeholder="password" value="<?= form_prep(set_value('password')); ?>">
				</div>
				<span class="text-danger"><?= form_error('password'); ?></span>
			</div>
			<div class="col-lg-offset-2">	
				<?= form_submit('login','登入','class="btn btn-primary"'); ?>
				<span class="text-danger"><?= $this->session->flashdata('error'); ?></span>
			</div>
		</fieldset>
		<?= form_close(); ?>
	</section>
</main>

<?php $this->load->view('template/footer'); ?>