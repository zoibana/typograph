<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceAfterHellipsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Неразрывный перед 2х символьной аббревиатурой';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([a-zA-ZА-яёЁ])([ \t])+([A-ZА-ЯЁ]{2})([\s;.?!:(\"]|&(ra|ld)quo;|$)/u',
			'\1&nbsp;\3\4',
			$text
		);
	}
}