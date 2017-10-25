<?php 
	$title = "相簿";
	$this->load->view('template/header',compact('title'));
	$this->load->view('template/nav');
 ?>

<main class="container row">
	<div class="col-lg-offset-2">
		<?php if (count($album)): ?>
			<?php foreach($album as $row):?>
			<section class="col-lg-3">
				<figure class="figure">
					<a href='<?= base_url("album/show/$row->id"); ?>'>
						<img src="<?= $row->path; ?>" class="figure-img img-thumbnail"
							alt="<?= $row->title; ?>" >
						<figcaption class="figure-caption"><?= $row->title; ?></figcaption>
					</a>
				</figure>
			</section>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</main>
<?php $this->load->view('template/footer'); ?>
