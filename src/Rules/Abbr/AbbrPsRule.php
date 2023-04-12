<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class AbbrPsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Объединение сокращений P.S., P.P.S.';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(^|\040|\t|>|\r|\n)(p\.\040?)(p\.\040?)?(s\.)([^<])/i',
			function ($m) {
				return $m[1] . $this->tag(trim($m[2]) . " " . ($m[3] ? trim($m[3]) . " " : "") . $m[4], "span", ["class" => "nowrap"]) . $m[5];
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return ['nowrap' => 'word-spacing:nowrap;'];
	}
}