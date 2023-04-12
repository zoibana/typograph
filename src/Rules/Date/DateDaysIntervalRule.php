<?php

namespace App\Helpers\Typograph\Rules\Date;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class DateDaysIntervalRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка тире и объединение в неразрывные периоды дней';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/([^>]|^)(\d+)(-|&minus;|&mdash;)(\d+)( |&nbsp;)(января|февраля|марта|апреля|мая|июня|июля|августа|сентября|октября|ноября|декабря)([^<]|$)/ui',
			function ($m) {
				return $m[1] . $this->tag($m[2] . "&mdash;" . $m[4] . " " . $m[6], "span", ["class" => "nowrap"]) . $m[7];
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