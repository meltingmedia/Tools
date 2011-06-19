<?php
/**
 * Tools
 *
 * Copyright 2011 by Romain Tripault // Melting Media <romain@melting-media.com>
 *
 * Tools is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Tools is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Tools; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package tools
 */
/**
 * Add snippets to build
 * 
 * @package tools
 * @subpackage build
 */
$snippets = array();

$snippets[0]= $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => 'Executioner',
    'description' => 'Quickly check execution time of a particular Snippet or Chunk.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.executioner.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.executioner.php';
$snippets[0]->setProperties($properties);
unset($properties);

$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'inc',
    'description' => 'Includes & process files (chunks/templates/php).',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.inc.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.inc.php';
$snippets[1]->setProperties($properties);
unset($properties);

$snippets[2]= $modx->newObject('modSnippet');
$snippets[2]->fromArray(array(
    'id' => 2,
    'name' => 'now',
    'description' => 'Return actual unix timestamp.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.now.php'),
),'',true,true);
/*$properties = include $sources['build'].'properties/properties.tools.php';
$snippets[2]->setProperties($properties);
unset($properties);*/

return $snippets;