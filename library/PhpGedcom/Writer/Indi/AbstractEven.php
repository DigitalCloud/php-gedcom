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
use PhpGedcom\Writer\Indi\Even\Plac;
use PhpGedcom\Writer\Addr;
use PhpGedcom\Writer\Phon;

/**
 */
abstract class AbstractEven extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Indi\Even $even
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function baseConvert(\PhpGedcom\Record\Indi\Even &$even, $format, $level) {
		$output = null;

		parent::addGedcomIfNotNull( $output, $level, "DATE", $even->getDate() );

		$plac = $even->getPlac();
		if ($plac != null)
			$output .= Plac::convert( $plac, $format, $level );

		parent::addGedcomIfNotNull( $output, $level, "CAUS", $even->getCaus() );
		parent::addGedcomIfNotNull( $output, $level, "AGE", $even->getAge() );

		$addr = $even->getAddr();
		if ($addr != null)
			$output .= Addr::convert( $addr, $format, $level );

		foreach ( $even->getPhon() as $phon ) {
			$output .= Phon::convert( $phon->getPhon(), $format, $level + 1 );
		}

		parent::addGedcomIfNotNull( $output, $level, "AGNC", $even->getAgnc() );

		// REF
		// OBJE
		// SOUR
		// NOTE
		// CHAN
		return $output;
	}
}
