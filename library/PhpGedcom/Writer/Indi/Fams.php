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

use PhpGedcom\Writer\AbstractWrite;

/**
 */
class Fams extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Indi\Fams $fams
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Indi\Fams &$fams, $format, $level) {
		$output = null;
		parent::addGedcomIfNotNull( $output, $level, "FAMS", '@'.$fams->getFams().'@' );
		return $output;
	}
}
