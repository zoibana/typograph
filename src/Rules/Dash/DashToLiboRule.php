<?php

namespace zoibana\Typograph\Rules\Dash;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class DashToLiboRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Автоматическая простановка дефисов в обезличенных местоимениях и междометиях';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\s|^|&nbsp;|>)(кто|кем|когда|зачем|почему|как|что|чем|где|чего|кого)-?(\040|\t|&nbsp;)-?(то|либо|нибудь)([.,!?;]|\040|&nbsp;|$)/ui',
			static function ($m) {
				return ($m[1] === "&nbsp;" ? " " : $m[1]) . $m[2] . "-" . $m[4] . ($m[5] === "&nbsp;" ? " " : $m[5]);
			},
			$text
		);
	}
}