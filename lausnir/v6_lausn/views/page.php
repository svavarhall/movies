<!doctype html>
<html lang="is">
	<head>
		<meta charset="utf-8">
		<title>Bíóbíó</title>
		<link rel="stylesheet" href="css/movies.css">
		<link href="css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="js/movies.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<h1>Skellum okkur í bíó!</h1>

			<?php if (is_array($movies) && sizeof($movies) > 0): ?>

			<div class="filters">
				<h2>Sýning byrjar milli kl. <span class="slider_from">13</span> og <span class="slider_to">24</span>:</h2>
				<div id="slider"></div>
				<p class="total"><?php echo sizeof($movies); ?> <?php echo pluralize(sizeof($movies), 'kvikmynd', 'kvikmyndir'); ?></p>
			</div>

			<div class="movies">

			
			<?php foreach($movies as $movie): ?>
				
				<section class="movie">
					<div class="meta">
						<h2><?php echo $movie['title']; ?> (<?php echo $movie['released']; ?>)</h2>
						<p class="restriction"><?php echo $movie['restricted']; ?></p>
						<ul class="theaters">
							<?php foreach ($movie['showtimes'] as $showtime): ?>

							<li class="theater">
								<span><?php echo $showtime['theater']; ?></span>

								<ul class="showtimes">
								<?php foreach ($showtime['schedule'] as $schedule): ?>

									<li class="showtime" data-starts="<?php echo substr($schedule, 0, 2); ?>"><?php echo $schedule; ?></li>
								<?php endforeach; ?>

								</ul>
							</li>
							<?php endforeach; ?>

						</ul>
					</div>
					<div class="poster"><img src="<?php echo $movie['image']; ?>" alt="Plakat fyrir <?php echo $movie['title']; ?>"></div>
				</section>
			<?php endforeach; ?>
			<?php endif; ?>

			<?php if (!is_array($movies) || sizeof($movies) == 0): ?>

				<p>Engar bíómyndir!</p>

			<?php endif; ?>

			</div>
		</div>
	</body>
</html>