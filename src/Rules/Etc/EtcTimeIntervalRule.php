<?php

namespace zoibana\Typograph\Rules\Etc;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class EtcTimeIntervalRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Тире и отмена переноса между диапозоном времени';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/([^\d>]|^)(\d{1,2}:\d{2})(-|&mdash;|&minus;)(\d{1,2}:\d{2})([^\d<]|$)/ui',
			function ($m) {
				return $m[1] . $this->tag($m[2] . "&mdash;" . $m[4], "span", ["class" => "nowrap"]) . $m[5];
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