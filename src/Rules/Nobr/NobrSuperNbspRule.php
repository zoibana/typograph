<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class NobrSuperNbspRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка союзов и предлогов к написанным после словам';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\s|^|&(la|bd)quo;|>|\(|&mdash;&nbsp;)([a-zа-яё]{1,2}\s+)([a-zа-яё]{1,2}\s+)?([a-zа-яё0-9\-]{2,}|\d)/ui',
			static function ($m) {
				return $m[1] . trim($m[3]) . "&nbsp;" . ($m[4] ? trim($m[4]) . "&nbsp;" : "") . $m[5];
			},
			$text
		);
	}
}