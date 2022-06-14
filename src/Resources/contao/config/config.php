<?php

/*
 * This file is part of Jungbuettel.
 * 
 * (c) Armin Frey 2022 <webmaster@krettenweiber.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/freyar/contao-jugend-bundle
 */

use Arminfrey\ContaoJugendBundle\Model\JungbuettelModel;

/**
 * Backend modules
 */
$GLOBALS['BE_MOD']['jungbuettel_module']['jungbuettel_collection'] = array(
    'tables' => array('tl_jungbuettel')
);

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_jungbuettel'] = JungbuettelModel::class;
