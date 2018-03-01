<?php

/**
	Return real media name
 */

// Field method
field::$methods['medianame'] = function($field) {
	$field->value = medianame($field);
	return $field;
};

// Convert tag name to slug (url)
function medianame($text){

	switch ($text) {
		case 'edito':
			$text = 'Images by';
			break;
		case 'interview':
			$text = 'Interview of';
			break;
		case 'essay':
			$text = 'Words by';
			break;
		default:
			return 'n-a';
			break;
	}

	return $text;
}

?>
