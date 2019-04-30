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
class Subm extends AbstractWrite
{

    /**
     *
     * @param \PhpGedcom\Record\Subm $subm
     * @param string $format
     * @param int $level
     * @return string
     */
    public static function convert(\PhpGedcom\Record\Subm &$subm, $format)
    {
        $level = 0;
        $output = null;

        parent::addGedcomEmptyTag($output, $level, parent::getCurrentTagName(), '@' . $subm->getSubm() . '@');
        $level++;

        parent::addGedcomIfNotNull($output, $level, "NAME", $subm->getName());

        if ($addr = $subm->getAddr()) {
            $output .= Addr::convert($addr, $format, $level);
        }

        foreach ($subm->getPhon() as $phone) {
            $output .= Phon::convert($phone, $format, $level);
        }

        return $output;
    }
}
