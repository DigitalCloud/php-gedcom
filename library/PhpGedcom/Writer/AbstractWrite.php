<?php

namespace PhpGedcom\Writer;

abstract class AbstractWrite {

	protected static function addGedcomIfNotNull(&$output, $level, $tag, $data) {
		if ($data != null)
			$output .= "{$level} {$tag} {$data}\n";
	}

	protected static function addGedcom(&$output, $level, $tag, $data) {
		if ($data == null)
			throw new \Exception( "Data must not be empty for {$tag}" );

		$output .= "{$level} {$tag} {$data}\n";
	}

	protected static function addGedcomEmptyTag(&$output, $level, $tag, $prefix = null) {
		if ($prefix != null)
			$output .= "{$level} {$prefix} {$tag}\n";
		else
			$output .= "{$level} {$tag}\n";
	}

	protected static function getCurrentTagName() {
		$classNameWithNamespace = get_called_class();
		return strtoupper( substr( $classNameWithNamespace, strrpos( $classNameWithNamespace, '\\' ) + 1 ) );
	}

	protected static function parseDate($dateStr) {
		return $dateStr;
	}
}