<?php 
	$title = '編輯文章';
	$this->load->view('template/admin/header',compact('title'));
	$this->load->view('template/admin/nav');
 ?>

<main class="container row">
	<section class="col-lg-8 col-lg-offset-3">
		<?php foreach ($article as $row): ?>
		<?= form_open("admin/article/edit/$row->id",'class="form-horizontal"'); ?>
			<fieldset>
				<legend>文章</legend>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="id">ID編號:</label>
					<div class="col-lg-8">
						<input class="form-control" id="id" type="text" name="id"
							value="<?= form_prep($row->id); ?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="title">標題:</label>
					<div class="col-lg-8">
						<input class="form-control" id="title" type="text" name="title"
							value="<?= form_prep($row->title); ?>" placeholder="title">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="content">內容:</label>
					<div class="col-lg-8">
						<textarea class="form-control" id="content" name="content" 
							rows="5" placeholder="content"><?= form_prep($row->content); ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="created_at">上傳日期:</label>
					<div class="col-lg-8">
						<input class="col-lg-8 form-control" id="created_at" type="text" name="created_at"
							value="<?= form_prep($row->created_at); ?>" readonly>
					</div>
				</div>
				<div class="col-lg-offset-2">
					<?= form_submit(['name'=>'save','value'=>'儲存','class'=>'btn btn-primary']); ?>
				</div>
			</fieldset>
		<?= form_close(); ?>
		<?php endforeach; ?>
	</section>
</main>
