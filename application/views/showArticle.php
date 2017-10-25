<?php 
	$title = "文章|內容";
	$this->load->view('template/header',compact('title'));
	$this->load->view('template/nav');
 ?>

<main class="container row">
	<section class="col-lg-9 col-lg-offset-3">
		<?php if (count($article)): ?>
			<?php foreach ($article as $row):?>
			<div class="article">
				<div class="article-header">
					<h1><?= $row->title; ?></h1>
					<p><?= $row->created_at; ?></p>
				</div>
				<div class="article-content">
					<?= $row->content; ?>
				</div>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</section>
</main>

<?php $this->load->view('template/footer'); ?>
