<?php

namespace zoibana\Typograph\Rules\Etc;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class EtcAcuteAccentRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Акцент';
	}

	public function apply(string $text): string
	{
		return preg_replace('/([уеыаоэяиюё])`(\w)/ui', '\1&#769;\2', $text);
	}
}