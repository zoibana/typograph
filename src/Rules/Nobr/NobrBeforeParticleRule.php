<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\RuleInterface;
use App\Helpers\Typograph\Rules\AbstractBaseRule;

class NobrBeforeParticleRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Неразрывный пробел перед частицей';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/([ \t])+(ли|бы|б|же|ж)(&nbsp;|\.|,|:|;|&hellip;|\?|\s)/iu',
			static function ($m) {
				return "&nbsp;" . $m[2] . ($m[3] === "&nbsp;" ? " " : $m[3]);
			},
			$text
		);
	}
}