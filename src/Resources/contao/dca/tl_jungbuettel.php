<?php

declare(strict_types=1);

/*
 * This file is part of Jungbuettel.
 * 
 * (c) Armin Frey 2022 <webmaster@krettenweiber.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/freyar/contao-jugend-bundle
 */

use Contao\Backend;
use Contao\DC_Table;
use Contao\Input;

/**
 * Table tl_jungbuettel
 */
$GLOBALS['TL_DCA']['tl_jungbuettel'] = array(

    // Config
    'config'      => array(
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'sql'              => array(
            'keys' => array(
                'id' => 'primary'
            )
        ),
    ),
    'edit'        => array(
        'buttons_callback' => array(
            array('tl_jungbuettel', 'buttonsCallback')
        )
    ),
    'list'        => array(
        'sorting'           => array(
            'mode'        => 2,
            'fields'      => array('lastname'),
            'flag'        => 1,
            'panelLayout' => 'filter;sort,search,limit'
        ),
	'label' => array
	(
		'fields'                  => array('lastname', 'firstname', 'guardian'),
		'showColumns'             => true,
		'label_callback'          => array('tl_jungbuettel', 'addIcon')
	),
        'global_operations' => array(
            'all' => array(
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations'        => array(
            'edit'   => array(
                'label' => &$GLOBALS['TL_LANG']['tl_jungbuettel']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.svg'
            ),
            'copy'   => array(
                'label' => &$GLOBALS['TL_LANG']['tl_jungbuettel']['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.svg'
            ),
            'delete' => array(
                'label'      => &$GLOBALS['TL_LANG']['tl_jungbuettel']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.svg',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show'   => array(
                'label'      => &$GLOBALS['TL_LANG']['tl_jungbuettel']['show'],
                'href'       => 'act=show',
                'icon'       => 'show.svg',
                'attributes' => 'style="margin-right:3px"'
            ),
        )
    ),
    // Palettes
    'palettes'    => array(
        'default'      => '{first_legend},firstname,lastname,dateOfBirth,gender,guardian'
    ),
    // Fields
    'fields'      => array(
        'id'             => array(
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp'         => array(
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'firstname' => array
	(
		'exclude'                 => true,
		'search'                  => true,
		'sorting'                 => true,
		'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC,
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'lastname' => array
	(
		'exclude'                 => true,
		'search'                  => true,
		'sorting'                 => true,
		'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC,
		'inputType'               => 'text',
		'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'dateOfBirth' => array
	(
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'date', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
		'sql'                     => "varchar(11) NOT NULL default ''"
	),
        'gender' => array
	(
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => array('male', 'female', 'other'),
		'reference'               => &$GLOBALS['TL_LANG']['MSC'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
        'guardian'    => array
	(
            'inputType' => 'select',
            'exclude'   => true,
            'search'    => true,
            'filter'    => true,
            'sorting'   => true,
            //'foreignKey'            => 'tl_member.CONCAT(firstname," ",lastname)',
	    'foreignKey' =>  'tl_member.CONCAT(lastname,", ",firstname)',
            'eval'      => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
            'sql'       => "varchar(255) NOT NULL default ''"
            //'relation'  => array('type' => 'hasOne', 'load' => 'lazy')
        )
    )
);

/**
 * Class tl_jungbuettel
 */
class tl_jungbuettel extends Backend
{
    /**
     * @param $arrButtons
     * @param  DC_Table $dc
     * @return mixed
     */
    public function buttonsCallback($arrButtons, DC_Table $dc)
    {
        if (Input::get('act') === 'edit')
        {
            $arrButtons['customButton'] = '<button type="submit" name="customButton" id="customButton" class="tl_submit customButton" accesskey="x">' . $GLOBALS['TL_LANG']['tl_jungbuettel']['customButton'] . '</button>';
        }

        return $arrButtons;
    }
}
