<?php

$data = $scriptProperties['context'];

if($modx->context->get('key') != "mgr") {
    setlocale(LC_ALL, $data. '.' . $modx->getOption('modx_charset'));
} else {
    // we are in the manager, do nothing
}