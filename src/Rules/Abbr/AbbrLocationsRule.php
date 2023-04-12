<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class AbbrLocationsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка пробелов в сокращениях г., ул., пер., д.';
	}

	public function apply(string $text): string
	{
		$patterns = [
			'/(\s|^|>)(г|ул|пер|просп|пл|бул|наб|пр|ш|туп)\.(\040|\t)*([а-яё0-9a-z]+)(\s|\.|\,|\?|!|$)/iu' => '\1\2.&nbsp;\4\5',
			'/(\s|^|>)(б\-р|пр\-кт)(\040|\t)*([а-яё0-9a-z]+)(\s|\.|\,|\?|!|$)/iu' => '\1\2&nbsp;\4\5',
			'/(\s|^|>)(д|кв|эт)\.(\040|\t)*(\d+)(\s|\.|\,|\?|!|$)/iu' => '\1\2.&nbsp;\4\5',
		];

		foreach ($patterns as $pattern => $replacement) {
			$text = preg_replace($pattern, $replacement, $text);
		}

		return $text;
	}
}