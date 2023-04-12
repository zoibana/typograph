<?php

namespace App\Helpers\Typograph\Rules\Etc;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class EtcNobrToNbspRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Преобразование nobr в nbsp';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		$thetag = $this->tag("###", 'span', ['class' => "nowrap"]);
		$arr = explode("###", $thetag);
		$b = preg_quote($arr[0], '/');
		$e = preg_quote($arr[1], '/');

		return preg_replace_callback(
			'/' . $b . '(.*?)' . $e . '/iu',
			static function ($m) {
				return str_replace(" ", "&nbsp;", $m[1]);
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return [
			'nowrap' => 'word-spacing:nowrap;',
		];
	}
}