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

use PhpGedcom\Writer\Indi\Name;
use PhpGedcom\Writer\Indi\Attr;
use PhpGedcom\Writer\Indi\Even;
use PhpGedcom\Writer\Indi\Famc;
use PhpGedcom\Writer\Indi\Fams;

/**
 */
class Indi extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Indi $indi
	 * @param string $format
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Indi &$indi, $format) {
		$level = 0;
		$output = null;

		parent::addGedcomEmptyTag( $output, $level, parent::getCurrentTagName(), '@' . $indi->getId() . '@' );

		$level ++;
		foreach ( $indi->getName() as $name ) {
			$output .= Name::convert( $name, $format, $level );
		}

		foreach ( $indi->getAllAttr() as $attrs ) {
			foreach ( $attrs as $attr ) {
				$output .= Attr::convert( $attr, $format, $level );
			}
		}

		foreach ( $indi->getAllEven() as $even ) {
			$output .= Even::convert( $even, $format, $level );
		}

		parent::addGedcomIfNotNull( $output, $level, "SEX", $indi->getSex() );

		foreach ( $indi->getFamc() as $famc ) {
			$output .= Famc::convert( $famc, $format, $level );
		}

		foreach ( $indi->getFams() as $fams ) {
			$output .= Fams::convert( $fams, $format, $level );
		}

		// FAMS
		// FAMC

		return $output;
	}
}
