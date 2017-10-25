<?php 
	$title = "相簿|照片";
	$this->load->view('template/header',compact('title'));
	$this->load->view('template/nav');
 ?>
<main class="container row">
	<section class="col-lg-8 col-lg-offset-3">
		<?php if(count($album)): ?>
			<?php foreach($album as $row): ?>
			<table class="table">
				<tr>
					<td colspan="2" class="img">
						<img src="<?= $row->path; ?>" class="img"
							alt="<?= $row->title;  ?>" width="600" height="400">
					</td>
				</tr>
				<tr>
					<td class="caption">標題:</td>
					<td><?= $row->title; ?></td>
				</tr>
				<tr>
					<td class="caption">簡介:</td>
					<td><?= $row->intro; ?></td>
				</tr>
				<tr>
					<td class="caption">上傳日期:</td>
					<td><?= substr($row->created_at, 0 ,10); ?></td>
				</tr>
			</table>
			<?php endforeach; ?>
		<?php endif; ?>
	</section>
</main>

<?php $this->load->view('template/footer'); ?>
