<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class NobrIPRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Объединение IP-адресов';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\s|&nbsp;|^)(\d{0,3}\.\d{0,3}\.\d{0,3}\.\d{0,3})/i',
			function ($m) {
				return $m[1] . $this->nowrap_ip_address($m[2]);
			},
			$text
		);
	}


	/**
	 * Объединение IP-адрессов в неразрывные конструкции (IPv4 only)
	 * @throws \Exception
	 */
	protected function nowrap_ip_address($triads)
	{
		$triad = explode('.', $triads);
		$addTag = true;

		foreach ($triad as $value) {
			$value = (int)$value;

			if ($value > 255) {
				$addTag = false;
				break;
			}
		}

		if (true === $addTag) {
			$triads = $this->tag($triads, 'span', ['class' => "nowrap"]);
		}

		return $triads;
	}

	public function getClasses(): array
	{
		return [
			'nowrap' => 'word-spacing:nowrap;',
		];
	}
}