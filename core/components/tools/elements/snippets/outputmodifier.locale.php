<?php
/*
 * A custom output modifier overiding any previously
 * locale. This is useful for generating valid RSS Feeds
 * from a context not using en_EN locale.
 *
 * $input must be in unix timestamp format.
 * $options being the date() format
 * (see http://www.php.net/manual/en/function.date.php for more details)
 *
 * Usage example [[+placeholder]] being an unix timestamp :
 * [[+placeholder:om.locale=`Y M`]]
 */

setlocale(LC_ALL, 'en_EN.'. $modx->getOption('modx_charset'));
$o = date($options, $input);
return $o;