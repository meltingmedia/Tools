<?php
if($modx->context->get('key') != "mgr") {
    // @TODO: make use of the "category" property + allow language selection
    setlocale(LC_ALL, 'fr_FR.' . $modx->getOption('modx_charset'));
} else {
    // we are in the manager, do not change locales
}