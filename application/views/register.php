<?php 
	$title = "相簿";
	$this->load->view('template/header',compact('title'));
	$this->load->view('template/nav');


$form_data = array(
	'key' => array(
		'0' => 'user',
		'1' => 'password',
		'2' => 'passconf',
		'3' => 'name',
		'4' => 'phone',
		'5' => 'address',
		'6' => 'Email',
		'7' => 'birthday'
	),
	'type' => array(
		'0' => 'text',
		'1' => 'password',
		'2' => 'password',
		'3' => 'text',
		'4' => 'text',
		'5' => 'text',
		'6' => 'mail',
		'7' => 'date'
	),
	'alias' => array(
		'0' => '帳號:',
		'1' => '密碼:',
		'2' => '密碼確認:',
		'3' => '姓名:',
		'4' => '電話:',
		'5' => '地址:',
		'6' => 'EMail:',
		'7' => '生日:'
	)
);

$len = count($form_data['key']);
?>
<main class="container row">
	<section class="col-lg-8 col-lg-offset-3">
			<?= form_open('auth/register/formValidation','class="form-horizontal"'); ?>
				<fieldset>
	    		<legend>會員註冊</legend>
				<?php for ($i=0; $i < $len; $i++): ?>
					<div class="form-group">	
						<label class="col-lg-2 control-label" for="<?= $form_data['key'][$i]; ?>">
							<?= $form_data['alias'][$i]; ?></label>
						<div class="col-lg-6">
							<input class="form-control" id="<?= $form_data['key'][$i]; ?>" 
								name="<?= $form_data['key'][$i]; ?>"
								type="<?= $form_data['type'][$i]; ?>"
								placeholder="<?= $form_data['key'][$i]; ?>"
								value="<?= form_prep(set_value($form_data['key'][$i])); ?>">
						</div>
						<span class="text-danger"><?= form_error($form_data['key'][$i]); ?></span>
					</div>
				<?php endfor; ?>
				
				<div class="form-group">
					<label for="gender" class="col-lg-2 control-label">性別:</label>
					<div class="col-lg-10 form-check form-check-inline">
							<label class="form-check-label">
			   					<input class="form-check-input" type="radio" name="gender"
			   						id="gender" value="<?= form_prep('Male'); ?>" checked> 男
			   				</label>
			   				<label class="form-check-label">
			   					<input class="form-check-input" type="radio" name="gender"
			   						id="gender" value="<?= form_prep('FeMale'); ?>"> 女
			  				</label>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="col-lg-offset-2">
					<?= form_submit(['name'=>'submit','value'=>'送出','class'=>'btn btn-primary']); ?>
				</div>
			</fieldset>
			<?= form_close(); ?>
	</section>
</main>

<?php $this->load->view('template/footer'); ?>
