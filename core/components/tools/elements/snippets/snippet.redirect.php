<?php
/*
 * redirect
 *
 * Redirects to a given resource
 *
 * Usage
 *
 * [[!redirect?
 *      &target=`0`
 *      &type=`id`
 * ]]
 *
 * [[!redirect?
 *      &target=`http://modx.com`
 *      &type=`url`
 * ]]
 */
if (empty($target)) return '';
switch($type) {
    case 'url':
        $url = $target;
        break;
    case 'resource':
    case 'res':
    case 'id':
    default:
        $url = $modx->makeUrl($target);
        break;
}
$modx->sendRedirect($url);