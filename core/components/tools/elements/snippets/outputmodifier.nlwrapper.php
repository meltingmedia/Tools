<?php
/*
 * A custom output modifier to wrap any input with a
 * custom html tag
 *
 * Usage example :
 * [[+placeholder:om.nlWrapper=`p`]]
 *
 * Will wrap [[+placeholder]] new lines with <p></p> tags
 */

$start = '<'.$options.'>';
$end = '</'.$options.'>';
$o = '';

$strings = explode("\n",$input);
foreach ($strings as $string) {
    $o .= $start.$string.$end."\n";
}

return $o;