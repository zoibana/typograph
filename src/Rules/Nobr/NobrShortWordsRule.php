<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class NobrShortWordsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Обрамление пятисимвольных слов разделенных дефисом в неразрывные блоки';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(&nbsp;|\s|>|^)([a-zа-яё]-[a-zа-яё]{4}|[a-zа-яё]{2}-[a-zа-яё]{3}|[a-zа-яё]{3}-[a-zа-яё]{2}|[a-zа-яё]{4}-[a-zа-яё]{1}|когда-то|кое-как|кой-кого|вс[её]-таки|[а-яё]+-(кась|ка|де))(\s|\.|,|!|\?|&nbsp;|&hellip;|$)/ui',
			function ($m) {
				return $m[1] . $this->tag($m[2], "span", ["class" => "nowrap"]) . $m[4];
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