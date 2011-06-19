<?php
/**
 * Adds events to setLocales plugin
 * 
 * @package tools
 * @subpackage build
 */
$events = array();

$events['OnInitCulture']= $modx->newObject('modPluginEvent');
$events['OnInitCulture']->fromArray(array(
    'event' => 'OnInitCulture',
    'priority' => 0,
    'propertyset' => 0,
),'',true,true);

return $events;