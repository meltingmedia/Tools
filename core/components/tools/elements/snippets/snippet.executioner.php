<?php
/*
 * Executioner
 *
 * Author: Jason Coward
 * http://www.jasoncoward.com/technology/2010/10/the-executioner-snippet.html
 *
 * Usage
 *
 * [[!Executioner?
 *      &tElementClass=`modSnippet`
 *      &tElement=`getResources`
 *      [other getResources params…]
 * ]]
 */
$output = '';
$tElementClass = !empty($tElementClass) ? $tElementClass : 'modSnippet';

$tStart = $modx->getMicroTime();
if (!empty($tElement)) {
    switch ($tElementClass) {
        case 'modChunk':
            $output = $modx->getChunk($tElement, $scriptProperties);
            break;
        case 'modSnippet':
            $output = $modx->runSnippet($tElement, $scriptProperties);
            break;
        default:
            $tElementObj = $modx->getObject($tElementClass, array('name' => $tElement));
            if ($tElementObj && $tElementObj instanceof modElement) {
                $tElementObj->setCacheable(false);
                $output = $tElementObj->process($scriptProperties);
            } else {
                $modx->log(modX::LOG_LEVEL_ERROR, "{$tElementClass}: {$tElement} is not a valid MODx Element");
            }
            break;
    }
}
$tEnd = $modx->getMicroTime();

$modx->log(modX::LOG_LEVEL_ERROR, "{$tElementClass}: {$tElement} executed in " . sprintf("%2.4f s", $tEnd - $tStart));

return $output;