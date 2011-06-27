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
$plugins[0]->set('name','setLocale');
$plugins[0]->set('description','Sets locale according to the "context" property.');
$plugins[0]->set('plugincode', getSnippetContent($sources['plugins'] . 'plugin.setlocale.php'));
$plugins[0]->set('category', 1);

$properties = include $sources['build'].'properties/properties.setlocale.php';
$plugins[0]->setProperties($properties);
unset($properties);

$events = include $sources['events'].'events.setlocale.php';
if (is_array($events) && !empty($events)) {
    $plugins[0]->addMany($events);
    $modx->log(xPDO::LOG_LEVEL_INFO,'Packaged in '.count($events).' Plugin Events for setLocale.'); flush();
} else {
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Could not find plugin events for setLocale!');
}
unset($events);

return $plugins;