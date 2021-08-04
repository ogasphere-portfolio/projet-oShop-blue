<section>
	<div class="container-fluid">

		</div>
		<div class="row mx-0">
			<?php foreach ($category as $key => $cat) :	?>
					<div class="col-lg-4">
						<div class="card border-0 text-center text-white"><img src="<?= $cat->getPicture() ?>" alt="Card image" class="card-img">
							<div class="card-img-overlay d-flex align-items-center">
								<div class="w-100">
									<h2 class="display-4 mb-4"><?= $cat->getName() ?></h2><a href="<?= $altoRouter->generate('catalog-category', ['id' => $cat->getId()]) ?>" class="btn btn-link text-white"><?= $cat->getSubtitle() ?>
										<i class="fa-arrow-right fa ml-2"></i></a>
								</div>
							</div>
						</div>
					</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>