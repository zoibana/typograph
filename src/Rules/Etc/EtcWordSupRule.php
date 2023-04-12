<?php

namespace App\Helpers\Typograph\Rules\Etc;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class EtcWordSupRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Надстрочный текст после символа ^';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/((\s|&nbsp;|^)+)\^([a-zа-яё0-9.:,\-]+)(\s|&nbsp;|$|\.$)/ui',
			function ($m) {
				return $this->tag($this->tag($m[3], "small"), "sup") . $m[4];
			},
			$text);
	}
}