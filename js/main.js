var request;
var baseUrlRequest;
var baseUrl;
var movieReleases;
var path = 'http://api.themoviedb.org/3/';
var apiKey = '?api_key=9972a139c3fc6bb47b29fe4e263a4941';
var url =  path + 'movie/upcoming' + apiKey;
var config = path + 'configuration' + apiKey;

$(document).ready(function() {

    $( "#results" ).empty();

    if (baseUrlRequest) {
        baseUrlRequest.abort();
    }
    if($.cookie("baseUrl") === undefined) {
        baseUrlRequest = $.getJSON(config, null, function(apiInfo) {
        baseUrl = apiInfo.images.base_url;
        });

        baseUrlRequest.done(function (response, textStatus, jqXHR){
            // log a message to the console
            console.log("Hooray, it worked!");
        });

        // callback handler that will be called on failure
        baseUrlRequest.fail(function (jqXHR, textStatus, errorThrown){
            // log the error to the console
            console.error(
                "The following error occured: "+
                textStatus, errorThrown
            );
        });
        $.cookie('baseUrl', baseUrl, { expires: 7 });
    } else baseUrl = $.cookie("baseUrl");
    

    if (request) {
        request.abort();
    }
    if($.cookie("releases") === undefined) {
        request = $.getJSON(url, null, function(releases) {
            movieReleases = releases;
            for(var i in releases.results) {
                movie = releases.results[i];
                if(!movie.original_title) movie.original_title = "Engar upplýsingar";
                if(!movie.release_date) movie.release_date = "Engar upplýsingar";
                if(!movie.vote_average) movie.vote_average = "Engar upplýsingar";
                if(!movie.poster_path) movie.poster_path = "/";
                if(i % 2 === 0) $("#results").append('<div class="row">');
                $("#results").append('<div class="col-lg-6"><div class="thumbnail">' +
                    '<img src="'+ baseUrl + 'w185' + movie.poster_path +'" alt="movie poster">' +
                    '<div class="caption"><h3 class="text-center">' + movie.original_title +'</h3><dl class="dl-horizontal">' +
                    '<dt>Frumsýnd</dt><dd id="year">'+ movie.release_date +'</dd>' +
                    '<dt>Einkunn</dt><dd>'+ movie.vote_average +'</dd>' +
                    '<dt>Fjöldi atkvæða</dt><dd>'+ movie.vote_count +'</dd>' +
                    '</dl></div></div>');
                if(i % 2 === 0) $("#results").append('</div>');
                }
            }).fail(function(d) {
            $("#results").append( '<div class="alert alert-danger">' +
            'Ekki náðist samband við þjónustu.</div>');
        });
        // callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // log a message to the console
            console.log("Hooray, it worked!");
        });

        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // log the error to the console
            console.error(
                "The following error occured: "+
                textStatus, errorThrown
            );
        });
            
        $.cookie('releases', movieReleases);
    } else movieReleases = $.cookie("releases");
});