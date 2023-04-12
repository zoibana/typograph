<?php

namespace App\Helpers\Typograph\Rules\Text;

use App\Helpers\Typograph\RuleInterface;
use App\Helpers\Typograph\Rules\AbstractBaseRule;

class TextNoRepeatWordsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Удаление повторяющихся слов';
	}

	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/([а-яё]{3,})( |\t|&nbsp;)\1/iu',
			static function ($matches) {
				return $matches[1];
			},
			$text
		);

		return preg_replace_callback(
			'/(\s|&nbsp;|^|\.|!|\?)(([А-ЯЁ])([а-яё]{2,}))( |\t|&nbsp;)(([а-яё])\4)/u',
			static function ($matches) {
				return $matches[1] . ($matches[7] === mb_strtolower($matches[3]) ? $matches[2] : $matches[2] . $matches[5] . $matches[6]);
			},
			$text
		);
	}
}