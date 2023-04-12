<?php

namespace zoibana\Typograph\Rules\Dash;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class DashIzZaRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка дефисов между из-за, из-под';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\s|&nbsp;|>|^)(из)(\040|\t|&nbsp;)-?(за|под)([.,!?:;]|\040|&nbsp;)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2] . "-" . $m[4] . ($m[5] === "&nbsp;" ? " " : $m[5]);
			},
			$text
		);
	}
}