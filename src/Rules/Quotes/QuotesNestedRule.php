<?php

namespace zoibana\Typograph\Rules\Quotes;

use zoibana\Typograph\EntitiesHelper;
use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class QuotesNestedRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Внутренние кавычки-лапки и дюймы';
	}

	public function apply(string $text): string
	{
		$end = strpos($text, "\r\n") !== false ? "\r\n\r\n" : "\n\n";
		$exp = strpos($text, "</cA===>") !== false ? "</cA===>" : $end;

		$texts_in = explode($exp, $text);

		$texts_out = [];

		foreach ($texts_in as $part) {

			$okposstack = ['0'];
			$okpos = 0;
			$level = 0;
			$off = 0;

			while (true) {
				$p = EntitiesHelper::strposEx($part, ["&laquo;", "&raquo;"], $off);

				if ($p === false) {
					break;
				}

				if ($p['str'] === "&laquo;") {
					if (($level > 0)) {
						$part = $this->inject_in($p['pos'], self::QUOTE_CRAWSE_OPEN, $part);
					}
					$level++;
				}

				if ($p['str'] === "&raquo;") {
					$level--;
					if ($level > 0) {
						$part = $this->inject_in($p['pos'], self::QUOTE_CRAWSE_CLOSE, $part);
					}
				}

				$off = $p['pos'] + strlen($p['str']);

				if ($level === 0) {
					$okpos = $off;
					$okposstack[] = $okpos;
				} elseif ($level < 0) {
					do {
						$lokpos = array_pop($okposstack);
						$k = substr($part, $lokpos, $off - $lokpos);
						$k = str_replace([self::QUOTE_CRAWSE_OPEN, self::QUOTE_CRAWSE_CLOSE], [self::QUOTE_FIRS_OPEN, self::QUOTE_FIRS_CLOSE], $k);

						$amount = 0;
						$__ax = preg_match_all("/(^|\D)(\d+)&raquo;/ui", $k);

						if ($__ax) {
							$k = preg_replace_callback("/(^|\D)(\d+)&raquo;/ui",
								static function ($m) {

									global $__ax, $__ay;

									$__ay++;

									if ($__ay === $__ax) {
										return $m[1] . $m[2] . "&Prime;";
									}

									return $m[0];
								},
								$k);
							$amount = 1;
						}


					} while (($amount === 0) && count($okposstack));

					// успешно сделали замену
					if ($amount === 1) {
						// заново просмотрим содержимое
						$part = substr($part, 0, $lokpos) . $k . substr($part, $off);
						$off = $lokpos;
						$level = 0;

						continue;
					}

					// иначе просто заменим последнюю явно на &quot; от отчаяния
					// говорим, что всё в порядке
					$level = 0;
					$part = substr($part, 0, $p['pos']) . '&quot;' . substr($part, $off);
					$off = $p['pos'] + strlen('&quot;');
					$okposstack = [$off];
				}
			}

			// не совпало количество, отменяем все подкавычки
			// закрывающих меньше, чем надо
			if ($level > 0) {
				$k = substr($part, $okpos);
				$k = str_replace([self::QUOTE_CRAWSE_OPEN, self::QUOTE_CRAWSE_CLOSE], [self::QUOTE_FIRS_OPEN, self::QUOTE_FIRS_CLOSE], $k);
				$part = substr($part, 0, $okpos) . $k;
			}

			$texts_out[] = $part;
		}

		return implode($exp, $texts_out);
	}

	protected function inject_in($pos, $text, $altText)
	{
		for ($i = 0, $iMax = strlen($text); $i < $iMax; $i++) {
			$altText[$pos + $i] = $text[$i];
		}

		return $altText;
	}
}