<?php

namespace zoibana\Typograph\Rules\Symbols;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SymbolsDegreeFRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Градусы по Фаренгейту';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\d+)F($|\s|\.|,|;|:|&nbsp;|\?|!)/u',
			function ($m) {
				return $this->tag($m[1] . " &deg;F", "span", ["class" => "nowrap"]) . $m[2];
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