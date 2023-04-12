<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceBeforeOpenQuoteRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Неразрывный пробел перед открывающей кавычкой';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(^|\040|\t|>)([a-zа-яё]{1,2})\040(&laquo;|&bdquo;)/u',
			'\1\2&nbsp;\3',
			$text
		);
	}
}