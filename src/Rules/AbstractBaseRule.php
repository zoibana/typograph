<?php

namespace App\Helpers\Typograph\Rules;

use App\Helpers\Typograph\EntitiesHelper;

class AbstractBaseRule
{
	public const QUOTE_FIRS_OPEN = '&laquo;';
	public const QUOTE_FIRS_CLOSE = '&raquo;';
	public const QUOTE_CRAWSE_OPEN = '&bdquo;';
	public const QUOTE_CRAWSE_CLOSE = '&ldquo;';

	public const BASE64_PARAGRAPH_TAG = 'cA===';

	public int $style_mode = EntitiesHelper::LAYOUT_STYLE;

	protected array $class_names = [];
	protected array $classes = [];

	/**
	 * Создание защищенного тега с содержимым
	 *
	 * @throws \Exception
	 */
	protected function tag(string $content, string $tag = 'span', array $attribute = []): string
	{
		if (isset($attribute['class'])) {
			$classname = $attribute['class'];

			if ($classname === "nowrap") {
				$tag = "nobr";
				$attribute = [];
				$classname = "";
			}

			if (isset($this->classes[$classname])) {
				$style_inline = $this->classes[$classname];

				if ($style_inline) {
					$attribute['__style'] = $style_inline;
				}
			}

			$classname = ($this->class_names[$classname] ?? $classname);

			$attribute['class'] = $classname;
		}

		return EntitiesHelper::buildSafeTag($content, $tag, $attribute, $this->style_mode);
	}

	public function getClasses(): array
	{
		return [];
	}
}