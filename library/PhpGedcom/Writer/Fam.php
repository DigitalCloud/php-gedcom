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
namespace PhpGedcom\Writer;

use PhpGedcom\Writer\Fam\Even;

/**
 */
class Fam extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Fam $fam
	 * @param string $format
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Fam &$fam, $format) {
		$level = 0;
		$output = null;

		parent::addGedcomEmptyTag( $output, $level, parent::getCurrentTagName(), '@' . $fam->getId() . '@' );
		$level ++;
		if ($fam->getHusb() != null)
			parent::addGedcomIfNotNull( $output, $level, "HUSB", '@' . $fam->getHusb() . '@' );
		if ($fam->getWife() != null)
			parent::addGedcomIfNotNull( $output, $level, "WIFE", '@' . $fam->getWife() . '@' );

		foreach ( $fam->getAllEven() as $even ) {
			$output .= Even::convert( $even, $format, $level );
		}

		foreach ( $fam->getChil() as $chil ) {
			parent::addGedcomIfNotNull( $output, $level, "CHIL", '@' . $chil . '@' );
		}

		return $output;
	}
}
