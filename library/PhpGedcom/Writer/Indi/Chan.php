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
class Chan extends AbstractWrite
{
    public static function convert(\PhpGedcom\Record\Chan &$chan, $format, $level)
    {
        $output = null;
        parent::addGedcomEmptyTag($output, $level, parent::getCurrentTagName());
        $level++;
        parent::addGedcomIfNotNull($output, $level, "DATE", $chan->getDate());
        parent::addGedcomIfNotNull($output, $level, "TIME", $chan->getTime());

        return $output;
    }
}
