<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceAfterPeriodRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Пробел после точки';
	}

	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\040|\t|&nbsp;|^)([a-zа-яё0-9]+)(\040|\t|&nbsp;)?\.([а-яёa-z]{5,})($|[^a-zа-яё])/iu',
			static function ($m) {
				return $m[1] . $m[2] . "." . ($m[5] === "." ? "" : " ") . $m[4] . $m[5];
			},
			$text
		);

		return preg_replace_callback(
			'/(\040|\t|&nbsp;|^)([a-zа-яё0-9]+)\.([а-яёa-z]{1,4})($|[^a-zа-яё])/iu',
			static function ($m) {
				return $m[1] . $m[2] . ". " . $m[3] . $m[4];
			},
			$text
		);
	}
}