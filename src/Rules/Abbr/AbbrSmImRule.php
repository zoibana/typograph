<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class AbbrSmImRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка пробелов перед сокращениями см., им.';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\s|^|>|\()(см|им)\.([ \t])*([а-яё0-9a-z]+)(\s|\.|,|\?|!|$)/iu',
			"\1\2.&nbsp;\4\5",
			$text
		);
	}
}