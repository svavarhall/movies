<?php
header('Content-Type: text/html; charset=utf-8');

// Things we might want to change
const DEBUG = false;
const CACHE_TIME = 600;
const CACHE_FS = 'cache/';
const WS_URL = 'http://apis.is/cinema';

// Our dependencies
$logger = require('log.php');
$cache = require('cache.php');
require('restclient.class.php');

// Track how long we're doing all of this
$logger->Log("Starting");

$rest = new RestClient($cache, $logger);

try
{
	$data = $rest->Get(WS_URL, true);
}
catch (Exception $e)
{
	// if we couldn't get any data, set it to false, the view knows how to handle it
	$data = false;
}

// helper function to pluralize in Icelandic
function pluralize($n, $singular, $plural)
{
	return ($n % 10 === 1) && ($n-11 % 11 !== 0) ? $singular : $plural;
}

// set a variable the page view expects and "render" it
$movies = $data["results"];
include('views/page.php');

// How long have been?
$logger->Log("Finished!");

// for fun - always include debug info
if (true)
{
	include('views/debug.php');
}