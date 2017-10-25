<?php 
	$title = "文章";
	$this->load->view('template/header',compact('title'));
	$this->load->view('template/nav');
 ?>

<main class="container row">
	<?php if (count($article)): ?>
		<?php foreach($article as $row):?>
		<section class="col-lg-8 col-lg-offset-3">
			<div class="card">
				<div class="card-header">
					<h4 >#<?= $row->id; ?></h4>
				</div>
				<div class="card-body">
			    	<h4 class="card-title"><?= $row->title; ?></h4>
			    	<p class="card-text"><?= substr($row->content, 0, 102)."..."; ?></p>
			    	<a href='<?= base_url("article/show/$row->id"); ?>'
			    		class="btn btn-primary">繼續閱讀..</a>
			  </div>
			</div>
		</section>
		<?php endforeach; ?>
	<?php endif; ?>
</main>

<?php $this->load->view('template/footer'); ?>
