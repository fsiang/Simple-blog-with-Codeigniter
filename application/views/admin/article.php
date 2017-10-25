<?php 
	$title = '文章列表';
	$this->load->view('template/admin/header',compact('title'));
	$this->load->view('template/admin/nav');
 ?>

<main class="container">
	<section class="row">
		<div class="col-lg-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>編號</th>
						<th>標題</th>
						<th>內容</th>
						<th>上傳日期</th>
					</tr>
				</thead>
				<tbody>
				<?php if (count($article)):?>
					<?php
						$count = $this->uri->segment(3,1);
						$count = ($count - 1) * 5; 
					?>
					<?php foreach ($article as $row): ?>
					<tr>
						<th scope="row">
							<?= '#'.++$count; ?>
						</th>
						<td><?= $row->title; ?></td>
						<td><?= substr($row->content, 0, 21)."..."; ?></td>
						<td><?= substr($row->created_at,0,10); ?></td>
						<td>
						<div class="row">
							<div class="col-lg-2">
								<?= anchor("admin/article/edit/$row->id","編輯",'class="btn btn-secondary"'); ?>
							</div>
							<div class="col-lg-2">
								<?= 
									form_open("admin/article/delete/$row->id"),
									form_submit(['name'=>'submit','value'=>'刪除','class'=>'btn btn-danger']),
									form_close();
								?>
							</div>
						</div>
						</td>
					</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				</tbody>
			</table>
			<?= anchor("admin/article/insert","新增",'class="btn btn-primary"'); ?>
		</div>
		<div class="col-lg-8 col-lg-offset-1">
			<?= $this->pagination->create_links(); ?>
		</div>
	</section>
</main>
