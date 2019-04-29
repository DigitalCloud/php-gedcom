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

namespace PhpGedcomTest;

use PhpGedcom\Writer;

/**
 * Class ParserTest
 * @package PhpGedcomTest
 */
class WriteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PhpGedcom\Writer
     */
    protected $writer = null;

    /**
     * @var \PhpGedcom\Gedcom
     */
    protected $gedcom = null;

    /**
     *
     */
    public function setUp()
    {
        $this->writer = new Writer();
    }

    public function testNoErrors()
    {
    }
}
