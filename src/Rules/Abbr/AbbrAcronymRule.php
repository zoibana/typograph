<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class AbbrAcronymRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка пробелов перед сокращениями гл., стр., рис., илл., ст., п.';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\s|^|>|\()(гл|стр|рис|илл?|ст|п|с)\.([ \t])*(\d+)(&nbsp;|\s|\.|,|\?|!|$)/iu',
			"\1\2.&nbsp;\4\5",
			$text
		);
	}
}