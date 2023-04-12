<?php

namespace App\Helpers\Typograph\Rules\Etc;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class EtcCenturyPeriodRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Тире между диапозоном веков';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\040|\t|&nbsp;|^)([XIV]{1,5})(-|&mdash;)([XIV]{1,5})(( |&nbsp;)?(в\.в\.|вв\.|вв|в\.|в))/ui',
			function ($m) {
				return $m[1] . $this->tag($m[2] . "&mdash;" . $m[4] . " вв.", "span", ["class" => "nowrap"]);
			},
			$text);
	}

	public function getClasses(): array
	{
		return [
			'nowrap' => 'word-spacing:nowrap;',
		];
	}
}