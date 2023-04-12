<?php

namespace zoibana\Typograph\Rules\Etc;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class EtcExpandNoNbspInNobrRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Удаление nbsp в nobr/nowrap тэгах';
	}

	public function apply(string $text): string
	{
		$thetag = $this->tag("###", 'span', ['class' => "nowrap"]);
		$arr = explode("###", $thetag);
		$b = preg_quote($arr[0], '/');
		$e = preg_quote($arr[1], '/');

		$match = '/(^|[^a-zа-яё])([a-zа-яё]+)&nbsp;(' . $b . ')/iu';

		do {
			$text = preg_replace($match, '\1\3\2 ', $text);
		} while (preg_match($match, $text));

		$match = '/(' . $e . ')&nbsp;([a-zа-яё]+)($|[^a-zа-яё])/iu';

		do {
			$text = preg_replace($match, ' \2\1\3', $text);
		} while (preg_match($match, $text));

		return preg_replace_callback(
			'/' . $b . '.*?' . $e . '/iu',
			static function ($m) {
				return str_replace("&nbsp;", " ", $m[0]);
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