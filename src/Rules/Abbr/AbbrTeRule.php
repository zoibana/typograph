<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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