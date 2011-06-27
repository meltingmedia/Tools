<?php
/*
 * inc
 *
 * Includes & returns chunks, templates, snippets…
 *
 * Usage
 *
 * [[!inc?
 *      &file=`[[++assets_path]]web/chunk.tpl`
 * ]]
 *
 * [[!inc?
 *      &file=`[[++core_path]]components/name/elements/snippets/snippet.php`
 *      &type=`php`
 *      [other snippet params…]
 * ]]
 */
if (empty($file)) return '';
$o = '';
$modx->parser->processElementTags('',$file,true,true);

$file = str_replace(array(
   '{core_path}',
   '{base_path}',
   '{assets_path}',
),array(
   $modx->getOption('core_path'),
   $modx->getOption('base_path'),
   $modx->getOption('assets_path'),
),$file);

if (file_exists($file)) {
    switch ($type) {
        case 'php':
            $o = include $file;
            break;
        default:
            $o = file_get_contents($file);
            break;
    }
    return $o;

} else { return 'File not found: '.$file; } // @TODO: i18n