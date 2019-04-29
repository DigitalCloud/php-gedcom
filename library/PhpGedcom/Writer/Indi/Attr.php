<?php

/**
 * php-gedcom
 *
 * php-gedcom is a library for parsing, manipulating, importing and exporting
 * GEDCOM 5.5 files in PHP 5.3+.
 *
 * @author          Oliver Lehmann <lehmann@ans-netz.de>
 * @copyright       Copyright (c) 2018, Oliver Lehmann
 * @package         php-gedcom
 * @license         GPL-3.0
 * @link            http://github.com/OlliL/php-gedcom
 */
namespace PhpGedcom\Writer\Indi;

/**
 */
class Attr extends AbstractEven {

	/**
	 *
	 * @param \PhpGedcom\Record\Indi\Attr $attr
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Indi\Attr &$attr, $format, $level) {
		$output = null;

		$_attr = $attr->get_Attr();
		if ($_attr == null) {
			parent::addGedcomEmptyTag( $output, $level, $attr->getType() );
		} else {
			parent::addGedcomIfNotNull( $output, $level, $attr->getType(), $attr->get_Attr() );
		}
		$level ++;
		$output .= parent::baseConvert( $attr, $format, $level );
		return $output;
	}
}
