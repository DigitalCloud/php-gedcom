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

/**
 */
class Addr extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Addr $addr
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Addr &$addr, $format, $level) {
		$addrs = explode( "\n", $addr->getAddr() );

		parent::addGedcomIfNotNull( $output, $level, 'ADDR', $addrs [0] );

		array_shift( $addrs );
		$level ++;

		foreach ( $addrs as $cont ) {
			parent::addGedcomIfNotNull( $output, $level, 'CONT', $cont );
		}

		parent::addGedcomIfNotNull( $output, $level, 'ADR1', $addr->getAdr1() );
		parent::addGedcomIfNotNull( $output, $level, 'ADR2', $addr->getAdr2() );
		parent::addGedcomIfNotNull( $output, $level, 'CITY', $addr->getCity() );
		parent::addGedcomIfNotNull( $output, $level, 'STAE', $addr->getStae() );
		parent::addGedcomIfNotNull( $output, $level, 'POST', $addr->getPost() );
		parent::addGedcomIfNotNull( $output, $level, 'CTRY', $addr->getCtry() );

		return $output;
	}
}
