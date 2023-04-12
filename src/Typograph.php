<?php

namespace App\Helpers\Typograph;

use App\Helpers\Typograph\Groups\AbbrRuleGroup;
use App\Helpers\Typograph\Groups\DashRuleGroup;
use App\Helpers\Typograph\Groups\DateRuleGroup;
use App\Helpers\Typograph\Groups\EtcRuleGroup;
use App\Helpers\Typograph\Groups\NobrRuleGroup;
use App\Helpers\Typograph\Groups\NumberRuleGroup;
use App\Helpers\Typograph\Groups\OpticalAlignRuleGroup;
use App\Helpers\Typograph\Groups\PunctuationRuleGroup;
use App\Helpers\Typograph\Groups\QuoteRuleGroup;
use App\Helpers\Typograph\Groups\SpaceRuleGroup;
use App\Helpers\Typograph\Groups\SymbolsRuleGroup;
use App\Helpers\Typograph\Groups\TextRuleGroup;
use RuntimeException;

/**
 * Основной класс типографа Евгения Муравьёва
 * реализует основные методы запуска и работы типографа
 */
class Typograph
{
	private string $text = "";

	/** @var \App\Helpers\Typograph\RuleGroupInterface[] */
	protected array $traits = [];

	protected array $safe_blocks = [];

	public function __construct(array $traits = null)
	{
		$traits = $traits ?? [
			AbbrRuleGroup::class,
			DashRuleGroup::class,
			DateRuleGroup::class,
			EtcRuleGroup::class,
			NobrRuleGroup::class,
			NumberRuleGroup::class,
			OpticalAlignRuleGroup::class,
			PunctuationRuleGroup::class,
			QuoteRuleGroup::class,
			SpaceRuleGroup::class,
			SymbolsRuleGroup::class,
			TextRuleGroup::class,
		];

		foreach ($traits as $trait) {
			$this->traits[$trait] = $this->createObject($trait);
		}

		$this->addSageTag('pre');
		$this->addSageTag('script');
		$this->addSageTag('style');
		$this->addSageTag('notg');
		$this->addSafeBlock('span-notg', '<span class="_notg_start"></span>', '<span class="_notg_end"></span>');
	}

	/**
	 * Добавление защищенного блока
	 *
	 * @param string $id идентификатор
	 * @param string $open начало блока
	 * @param string $close конец защищенного блока
	 * @param string $tag тэг
	 * @return  void
	 */
	private function appendSafeBlock(string $id, string $open, string $close, string $tag): void
	{
		$this->safe_blocks[] = [
			'id' => $id,
			'tag' => $tag,
			'open' => $open,
			'close' => $close,
		];
	}

	/**
	 * Список защищенных блоков
	 */
	public function getSafeBlocks(): array
	{
		return $this->safe_blocks;
	}

	/**
	 * Удаленного блока по его номеру ключа
	 *
	 * @param string $id идентифиактор защищённого блока
	 * @return  void
	 */
	public function removeSafeBlock(string $id): void
	{
		foreach ($this->safe_blocks as $k => $block) {
			if ($block['id'] === $id) {
				unset($this->safe_blocks[$k]);
			}
		}
	}


	/**
	 * Добавление защищенного блока
	 *
	 * @param string $tag тэг, который должен быть защищён
	 */
	public function addSageTag(string $tag): bool
	{
		$open = preg_quote("<", '/') . $tag . "[^>]*?" . preg_quote(">", '/');
		$close = preg_quote("</$tag>", '/');

		$this->appendSafeBlock($tag, $open, $close, $tag);

		return true;
	}


	/**
	 * Добавление защищенного блока
	 *
	 * @param string $open начало блока
	 * @param string $close конец защищенного блока
	 * @param bool $quoted специальные символы в начале и конце блока экранированы
	 */
	public function addSafeBlock(string $id, string $open, string $close, bool $quoted = false): bool
	{
		$open = trim($open);
		$close = trim($close);

		if (empty($open) || empty($close)) {
			return false;
		}

		if (!$quoted) {
			$open = preg_quote($open, '/');
			$close = preg_quote($close, '/');
		}

		$this->appendSafeBlock($id, $open, $close, "");

		return true;
	}


	/**
	 * Сохранение содержимого защищенных блоков
	 */
	public function safeBlocks(string $text, bool $way): string
	{
		if ($this->safe_blocks) {
			$safeblocks = $way ? $this->safe_blocks : array_reverse($this->safe_blocks);

			foreach ($safeblocks as $block) {
				$text = preg_replace_callback(
					"/({$block['open']})(.+?)({$block['close']})/s",
					static function ($m) use ($way) {
						$safeType = $way ? EntitiesHelper::encryptTag($m[2]) : stripslashes(EntitiesHelper::decryptTag($m[2]));

						return $m[1] . $safeType . $m[3];
					},
					$text
				);
			}
		}

		return $text;
	}


	/**
	 * Декодирование блоков, которые были скрыты в момент типографирования
	 */
	public function decodeInternalBlocks(string $text): string
	{
		return EntitiesHelper::decodeInternalBlocks($text);
	}

	private function createObject(string $trait)
	{
		if (!class_exists($trait)) {
			throw new RuntimeException("Class $trait not found");
		}

		return new $trait();
	}

	/**
	 * Задаём текст для применения типографа
	 */
	public function setText(string $text): self
	{
		$this->text = $text;

		return $this;
	}

	/**
	 * Запустить типограф на выполнение
	 */
	public function apply(): string
	{
		$text = $this->safeBlocks($this->text, true);
		$text = EntitiesHelper::safeTagChars($text, true);
		$text = EntitiesHelper::clearSpecialChars($text);

		foreach ($this->traits as $trait) {
			$text = $trait->apply($text);
		}

		$text = $this->decodeInternalBlocks($text);

		EntitiesHelper::convert_html_entities_to_unicode($text);

		$text = EntitiesHelper::safeTagChars($text, false);

		$text = $this->safeBlocks($text, false);

		$text = str_replace(['<notg>', '</notg>'], "", $text);

		return trim($text);
	}

	/**
	 * Получить содержимое <style></style> при использовании классов
	 */
	public function getStyleContent(): string
	{
		$res = [];

		foreach ($this->traits as $trait) {
			$res = array_merge($res, $trait->getClasses());
		}

		$str = "";
		foreach ($res as $k => $v) {
			$str .= ".$k { $v }\n";
		}

		return $str;
	}
}