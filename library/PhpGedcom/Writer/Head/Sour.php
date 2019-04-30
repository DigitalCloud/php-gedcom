<?php

/**
 * php-gedcom
 *
 * php-gedcom is a library for parsing, manipulating, importing and exporting
 * GEDCOM 5.5 files in PHP 5.3+.
 *
 * @author          Kristopher Wilson <kristopherwilson@gmail.com>
 * @copyright       Copyright (c) 2010-2013, Kristopher Wilson
 * @package         php-gedcom
 * @license         GPL-3.0
 * @link            http://github.com/mrkrstphr/php-gedcom
 */
namespace PhpGedcom\Writer\Head;

use PhpGedcom\Writer\Head\Sour\Corp;
use PhpGedcom\Writer\AbstractWrite;

/**
 */
class Sour extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Head\Sour $sour
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Head\Sour &$sour, $format, $level) {
		$output = null;

		parent::addGedcomIfNotNull( $output, $level, "SOUR", $sour->getSour() );
		$level ++;
		parent::addGedcomIfNotNull( $output, $level, "VERS", $sour->getVers() );
        parent::addGedcomIfNotNull( $output, $level, "NAME", $sour->getName() );

		$corp = $sour->getCorp();

		if ($corp != null)
			$output .= Corp::convert( $corp, $format, $level );

		return $output;
	}
}
