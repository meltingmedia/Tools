<?php
/**
 * Package in plugins
 * 
 * @package tools
 * @subpackage build
 */
$plugins = array();

/* create the plugin object */
$plugins[0] = $modx->newObject('modPlugin');
$plugins[0]->set('id',1);
$plugins[0]->set('name','setLocales');
$plugins[0]->set('description','Sets locales to french UTF-8.');
$plugins[0]->set('plugincode', getSnippetContent($sources['plugins'] . 'plugin.setLocales.php'));
//$plugins[0]->set('category', 1);

$events = include $sources['events'].'events.setLocales.php';
if (is_array($events) && !empty($events)) {
    $plugins[0]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events for setLocales.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events for setLocales!');
}
unset($events);

return $plugins;