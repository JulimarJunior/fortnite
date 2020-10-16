<?php require_once('php/header.php'); ?>
<?php require_once('php/loadAPI.php'); ?>

	<?php $shop = loadShop() ?>
	<div class="top-navbar">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h1>Loja Fortnite</h1>
				</div>
				<div class="col-6 text-right">
					Nova loja em
					<br>
					<b><span class="timer">Aguarde...</span></b>
				</div>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col shop-btns text-center active" id="btn-featured" onclick="showShop('featured')">
						Destaque
					</div>
					<div class="col shop-btns text-center" id="btn-daily" onclick="showShop('daily')">
						Diária
					</div>
					<div class="col shop-btns text-center" id="btn-specialFeatured" onclick="showShop('specialFeatured')">
						Especiais
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container shop-items" id="shop-featured">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<?php
					foreach ($shop['featured'] as $item) {
						?>
							<div class="col-md-3 col-6">
								<div class="item-shop">
									<div class="item <?php echo $item['rarity'] ?>">
										<img src="<?php echo $item['icon'] ?>" alt="">
										<div class="infos-item row ">
											<h1 class="my-auto mx-auto"><?php echo $item['name'] ?></h1>
										</div>
									</div>
									<h2><img src="https://image.fnbr.co/misc/5ab28272ca60ff5b5d8a3e72/icon.png" alt=""><?php echo $item['price'] ?></h2>
								</div>
							</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container shop-items" id="shop-daily" style="display: none;">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<?php
					foreach ($shop['daily'] as $item) {
						?>
							<div class="col-md-3 col-6">
								<div class="item-shop">
									<div class="item <?php echo $item['rarity'] ?>">
										<img src="<?php echo $item['icon'] ?>" alt="">
										<div class="infos-item row ">
											<h1 class="my-auto mx-auto"><?php echo $item['name'] ?></h1>
										</div>
									</div>
									<h2><img src="https://image.fnbr.co/misc/5ab28272ca60ff5b5d8a3e72/icon.png" alt=""><?php echo $item['price'] ?></h2>
								</div>
							</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="container shop-items" id="shop-specialFeatured" style="display: none;">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<?php
					foreach ($shop['specialFeatured'] as $item) {
						?>
							<div class="col-md-3 col-6">
								<div class="item-shop">
									<div class="item <?php echo $item['rarity'] ?>">
										<img src="<?php echo $item['icon'] ?>" alt="">
										<div class="infos-item row ">
											<h1 class="my-auto mx-auto"><?php echo $item['name'] ?></h1>
										</div>
									</div>
									<h2><img src="https://image.fnbr.co/misc/5ab28272ca60ff5b5d8a3e72/icon.png" alt=""><?php echo $item['price'] ?></h2>
								</div>
							</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>

<?php require_once('php/footer.php');?>

<script>
</script>