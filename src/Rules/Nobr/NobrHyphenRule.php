<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class NobrHyphenRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Отмена переноса слова с дефисом';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(&nbsp;|\s|>|^)([a-zа-яё]+)((-([a-zа-яё]+)){1,2})(\s|\.|,|!|\?|&nbsp;|&hellip;|$)/ui',
			function ($m) {
				return $m[1] . $this->tag($m[2] . $m[3], "span", ["class" => "nowrap"]) . $m[6];
			},
			$text
		);
	}
}