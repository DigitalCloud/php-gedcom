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
class Gedc extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Head\Gedc $sour
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Head\Gedc &$gedc, $format, $level) {
		$output = null;
		$outputpre = null;
		$level ++;
		parent::addGedcomIfNotNull( $outputpre, $level, "VERS", $gedc->getVers() );
		parent::addGedcomIfNotNull( $outputpre, $level, "FORM", $gedc->getForm() );
		if ($outputpre != null) {
			$level --;
			parent::addGedcomEmptyTag( $output, $level, parent::getCurrentTagName() );
			$output .= $outputpre;
		}
		return $output;
	}
}
