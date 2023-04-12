<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceAfterHellipRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Отсутстввие пробела после троеточия после открывающей кавычки';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(&laquo;|&bdquo;)( |&nbsp;)?&hellip;( |&nbsp;)?([a-zа-яё])/ui',
			'\1&hellip;\4',
			$text
		);
	}
}