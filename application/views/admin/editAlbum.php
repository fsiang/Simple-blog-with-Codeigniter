<?php 
	$title = '編輯照片';
	$this->load->view('template/admin/header',compact('title'));
	$this->load->view('template/admin/nav');
 ?>

<main class="container">
	<section>
		<?php foreach ($album as $row): ?>
		<?= form_open_multipart("admin/album/edit/$row->id",'class="form-horizontal"'); ?>
			<fieldset>
				<legend>相簿</legend>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="id">編號:</label>
					<div class="col-lg-8">
						<input class="col-lg-8 form-control" id="id" type="text" name="id"
							value="<?= form_prep($row->id);?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="title">標題:</label>
					<div class="col-lg-8">
						<input class="col-lg-8 form-control" id="title" type="text" name="title"
							value="<?= form_prep($row->title);?>" placeholder="title">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="intro">介紹:</label>
					<div class="col-lg-8">
						<textarea class="col-lg-4 form-control" id="intro" name="intro" 
							rows="3" placeholder="intro"><?= form_prep($row->intro); ?></textarea>
					</div>	
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="path">路徑:</label>
					<div class="col-lg-4">
						<input class="form-control" id="path" type="text"
							value="<?= form_prep($row->path);?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="created_at">上傳日期:</label>
					<div class="col-lg-4">
						<input class="col-lg-4 form-control" id="created_at" type="text" name="created_at"
							value="<?= form_prep($row->created_at);?>" readonly>
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
