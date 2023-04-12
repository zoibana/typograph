<?php

namespace App\Helpers\Typograph\Rules\Space;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class Space2symAbbrRule extends AbstractBaseRule implements RuleInterface
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