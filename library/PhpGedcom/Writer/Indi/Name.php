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
class Name extends AbstractWrite {

	/**
	 *
	 * @param \PhpGedcom\Record\Indi\Name $name
	 * @param string $format
	 * @param int $level
	 * @return string
	 */
	public static function convert(\PhpGedcom\Record\Indi\Name &$name, $format, $level) {
		$output = null;
		parent::addGedcomIfNotNull( $output, $level, "NAME", $name->getName() );
		$level ++;
		parent::addGedcomIfNotNull( $output, $level, "NPFX", $name->getNpfx() );
		parent::addGedcomIfNotNull( $output, $level, "GIVN", $name->getGivn() );
		parent::addGedcomIfNotNull( $output, $level, "NICK", $name->getNick() );
		parent::addGedcomIfNotNull( $output, $level, "SPFX", $name->getSpfx() );
		parent::addGedcomIfNotNull( $output, $level, "SURN", $name->getSurn() );
		parent::addGedcomIfNotNull( $output, $level, "NSFX", $name->getNsfx() );
		return $output;
	}
}
