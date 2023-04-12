<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class AbbrOrgRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка сокращений форм собственности к названиям организаций';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([^a-zA-ZА-яёЁ]|^)(ООО|ЗАО|ОАО|НИИ|ПБОЮЛ) ([a-zA-ZА-яёЁ]|\"|&laquo;|&bdquo;|<)/ui',
			'\1\2&nbsp;\3',
			$text
		);
	}
}