<?php

namespace zoibana\Typograph\Rules\Quotes;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

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