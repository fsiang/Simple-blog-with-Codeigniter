<?php 
	$title = '新增文章';
	$this->load->view('template/admin/header',compact('title'));
	$this->load->view('template/admin/nav');
 ?>

<main class="container">
	<section>
		<?= form_open('admin/article/insert','class="form-horizontal"'); ?>
			<fieldset>
				<legend>新增文章</legend>
				<div class="form-group row">
					<label class="col-lg-1 control-label" for="title">標題:</label>
					<div class="col-lg-8">
						<input class="form-control" id="title" name="title" type="text"
							value="<?= form_prep(set_value('title')); ?>" placeholder="title">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-1 control-label" for="content">內容:</label>
					<div class="col-lg-8">
						<textarea class="form-control" id="content" name="content" 
							type="text" rows="5" value="<?= form_prep(set_value('content')); ?>" placeholder="content"></textarea>
					</div>
				</div>
				<div>
					<input name="created_at" type="hidden" value="<?= form_prep(date('Y-n-j H:i:s')); ?>">
				</div>
				<div class="col-lg-offset-1">
					<?= form_submit(['name'=>'insert','id'=>'insert','value'=>'新增','class'=>'btn btn-primary']); ?>
				</div>
			</fieldset>
		<?= form_close(); ?>
	</section>
</main>