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
 * Properties for the setLocales plugin.
 *
 * @package tools
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'category',
        'desc' => 'Constant name affecting the locale setting',
        'type' => 'list',
        'options' => array(
            array('name' => 'LC_ALL','LC_ALL'),
            array('name' => 'LC_COLLATE','LC_COLLATE'),
            array('name' => 'LC_CTYPE','LC_CTYPE'),
            array('name' => 'LC_MONETARY','LC_MONETARY'),
            array('name' => 'LC_NUMERIC','LC_NUMERIC'),
            array('name' => 'LC_TIME','LC_TIME'),
            array('name' => 'LC_MESSAGES','LC_MESSAGES'),
        ),
        'value' => 'LC_ALL',
        //'lexicon' => 'tools:properties',
    ),
);

return $properties;