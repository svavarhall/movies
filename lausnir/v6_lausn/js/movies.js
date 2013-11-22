$(document).ready(function()
{
	// helper function for Icelandic pluralization
	function pluralize(n, singular, plural)
	{
		return n % 10 === 1 && n-11 % 11 !== 0 ? singular : plural;
	}

	// we include a whole lot of stuff just for this slider here.. he better do his stuff
	$("#slider").slider({
		range: true,
		min: 13,
		max: 24,
		step: 1,	// we look at hours, so the steps are one hour each
		values: [ 13, 24 ],	// most movies don't start earlier than 13:00
		slide: function(e, ui)
		{
			var from = ui.values[0];
			var to = ui.values[1];

			// update the text of the slider legend
			$('.slider_from').text(from);
			$('.slider_to').text(to);

			filter(from, to);
		}
	});

	// filters our movies and only shows those that start between from and to
	function filter(from, to)
	{
		// lazieness.. show each and every showtime, theater and movie so that :visible isn't confused
		$('li.showtime').each(function() { $(this).show(); });
		$('li.theater').each(function() { $(this).show(); });
		$('section.movie').each(function() { $(this).show(); });

		// remove all the showtimes that aren't applicable
		$('li.showtime').each(function()
		{
			var starts = $(this).data('starts');

			if (from > starts || starts > to)
			{
				$(this).hide();
			}
		});

		// are there any theaters per movie that doesn't have a showtime? Hide it!
		$('li.theater').each(function()
		{
			if ($(this).find('li:visible').length == 0)
			{
				$(this).hide();
			}
		})

		// ditto for the movie, hide those we don't have any theaters for
		$('section.movie').each(function()
		{
			if ($(this).find('li.theater:visible').length == 0)
			{
				$(this).hide();
			}
		})

		// update our counter of visible movies
		var n = $('section.movie:visible').length;
		$('p.total').text(n + " " + pluralize(n, 'kvikmynd', 'kvikmyndir'));
	}
});