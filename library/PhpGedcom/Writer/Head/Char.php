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
namespace PhpGedcom\Writer\Head;

use PhpGedcom\Writer\AbstractWrite;

/**
 */
class Char extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Head\Char $sour
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Head\Char &$char, $format, $level) {
		$output = null;
		parent::addGedcomIfNotNull( $output, $level, "CHAR", $char->getChar() );
		$level ++;
		parent::addGedcomIfNotNull( $output, $level, "VERS", $char->getVers() );
		return $output;
	}
}
