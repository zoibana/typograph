<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class AbbrTeRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Обработка т.е.';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(^|\s|&nbsp;)([тТ])\.? ?е\./u',
			function ($m) {
				return $m[1] . $this->tag($m[2] . ". е.", "span", ["class" => "nowrap"]);
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return ['nowrap' => 'word-spacing:nowrap;'];
	}
}