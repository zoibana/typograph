<?php

namespace App\Helpers\Typograph\Rules\Text;

use App\Helpers\Typograph\RuleInterface;
use App\Helpers\Typograph\Rules\AbstractBaseRule;

class TextAutoLinksRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Выделение ссылок из текста';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\s|^)(http|ftp|mailto|https)(:\/\/)([^\s,!<]{4,})(\s|\.|,|!|\?|<|$)/iu',
			function ($matches) {
				$lastChar = substr($matches[4], -1);
				$link = $lastChar === "." ? substr($matches[4], 0, -1) : $matches[4];
				$url = $matches[2] . $matches[3] . $link;

				$tag = $this->tag($url, 'a', ['href' => $url, 'target' => '_blank']);

				return $matches[1]
					. $tag
					. ($lastChar === "." ? "." : "")
					. $matches[5];
			},
			$text
		);
	}
}