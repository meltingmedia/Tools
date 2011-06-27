<?php
/*
 * Returns the actual unix timestamp.
 * Useful for testing caching with getCache.
 *
 * Usage
 * [[!now]]
 *
 * [[!now:date=`%Y %b %d`]]
 */
$time = time();
return $time;