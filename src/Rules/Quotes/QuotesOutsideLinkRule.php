<?php

namespace App\Helpers\Typograph\Rules\Quotes;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class QuotesOutsideLinkRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Кавычки вне тэга <a>';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(<%%__[^>]+>)\"(.+?)\"(<\/%%__[^>]+>)/s',
			'"\1\2\3"',
			$text
		);
	}
}