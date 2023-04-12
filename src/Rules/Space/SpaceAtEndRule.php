<?php

namespace App\Helpers\Typograph\Rules\Space;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class SpaceAtEndRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Удаление пробелов в конце текста';
	}

	public function apply(string $text): string
	{
		return rtrim($text, " ");
	}
}