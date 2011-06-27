<?php
/*
 * Set the locale for all context other than "mgr"
 * http://php.net/manual/en/function.setlocale.php
 *
 * TODO: allow per context definition + charset
 *
 */

$locale = $scriptProperties['context'];
//$category = $scriptProperties['category'];

if($modx->context->get('key') != "mgr") {
    setlocale(LC_ALL, $locale. '.' .$modx->getOption('modx_charset'));
} else {
    // we are in the manager, do nothing
}