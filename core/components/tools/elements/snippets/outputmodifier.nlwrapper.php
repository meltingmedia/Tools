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

if ($input != '' && $options != '') {

    $start = '<'.$options.'>';
    $end = '</'.$options.'>';
    $o = '';

    $strings = explode("\n",$input);
    foreach ($strings as $string) {
        $o .= $start.$string.$end."\n";
    }

    return $o;
} else {
    return $input;
}