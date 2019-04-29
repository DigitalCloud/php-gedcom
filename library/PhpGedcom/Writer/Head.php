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
namespace PhpGedcom\Writer;

use PhpGedcom\Writer\Head\Gedc;
use PhpGedcom\Writer\Head\Sour;
use PhpGedcom\Writer\Head\Char;

/**
 */
class Head extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Head $head
	 * @param string $format
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Head &$head, $format) {
		$level = 0;
		$output = null;

		parent::addGedcomEmptyTag( $output, $level, parent::getCurrentTagName() );

		$level ++;
		$sour = $head->getSour();
		$output .= Sour::convert( $sour, $format, $level );

		parent::addGedcomIfNotNull( $output, $level, "DATE", date( "d M Y" ) );
		parent::addGedcomIfNotNull( $output, $level, "TIME", date( "H:i:s" ) );

		$gedc = $head->getGedc();
		$output .= Gedc::convert( $gedc, $format, $level );
		$char = $head->getChar();
		$output .= Char::convert( $char, $format, $level );

		return $output;
	}
}
