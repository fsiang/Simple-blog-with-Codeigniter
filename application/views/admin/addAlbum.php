<?php 
	$title = '新增照片';
	$this->load->view('template/admin/header',compact('title'));
	$this->load->view('template/admin/nav');
 ?>

<main class="container">
	<section>
		<?php if (isset($error)) echo $error; ?>

		<?= form_open_multipart('admin/album/insert','class="form-horizontal"'); ?>
			<fieldset>
				<legend>新增照片</legend>		
				<div class="form-group row">
					<label class="col-lg-1 control-label" for="title">標題:</label>
					<div class="col-lg-10">
						<input class="form-control" id="title" name="title" type="text"
							value="<?= form_prep(set_value('title')); ?>" placeholder="title">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-1 control-label" for="intro">介紹:</label>
					<div class="col-lg-10">
						<textarea class="form-control" id="intro" name="intro" 
							type="text" rows="3" placeholder="intro"><?= form_prep(set_value('intro')); ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-1 control-label" for="path">路徑:</label>
					<div class="col-lg-10">
						<?= form_upload(['name'=>'path','class'=>'form-control']); ?>
					</div>
				</div>
				<div>
					<input name="created_at" type="hidden" value="<?= form_prep(date('Y-n-j H:i:s')); ?>">
				</div>
				<div class="col-lg-offset-1">
					<?= form_submit(['class'=>'btn btn-primary','name'=>'save','id'=>'save','value'=>'儲存',]); ?>
				</div>
			</fieldset>
		<?= form_close(); ?>
	</section>
</main>