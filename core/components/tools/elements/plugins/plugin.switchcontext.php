<?php
/*
 * Switch the context according to the domain/subdomain
 *
 */
if ($modx->context->get('key') == 'mgr') {
    return;
}

switch(strtolower(MODX_HTTP_HOST)) {
    case 'dns.tld1:80':
    case 'dns.tld1':
        $modx->initialize('ctx1');
    break;

    case 'dns.tld2:443':
    case 'dns.tld2:80':
    case 'dns.tld2':
        $modx->initialize('ctx2');
    break;

    default:
        $modx->initialize('web');
    break;
}