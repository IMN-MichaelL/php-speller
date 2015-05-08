<?php
/**
 * PHP Speller
 *
 * @copyright 2015, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author    Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license   http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Speller\Helper;

/**
 * Map given list of language tags to supported ones
 *
 * For example some speller supports de_DE, en_US and ru_RU languages. But your application uses
 * short versions of language tags: de, en, ru. LanguageMapper maps your list of language tags
 * to supported by speller.
 *
 * @since 1.00
 */
class LanguageMapper
{
    /**
     * Preferred mappings
     *
     * @var array
     */
    private $preferred = [];

    /**
     * Map given list of language tags to supported ones
     *
     * @param string[] $requested list of requested languages
     * @param string[] $supported list of supported languages
     *
     * @return string[]
     *
     * @link  http://tools.ietf.org/html/bcp47
     * @since 1.00
     */
    public function map(array $requested, array $supported)
    {
        $index = [];
        foreach ($supported as $tag) {
            $key = strtolower(preg_replace('/_-\./', '', $tag));
            $index[$key] = $tag;
        }

        $result = [];
        foreach ($requested as $source) {

            if (array_key_exists($source, $this->preferred)) {
                $preferred = $this->preferred[$source];
                foreach ($preferred as $tag) {
                    if (in_array($tag, $supported, true)) {
                        $result []= $tag;
                        continue 2;
                    }
                }
            }

            if (in_array($source, $supported, true)) {
                $result []= $source;
                continue;
            }

            $tag = strtolower(preg_replace('/_-\./', '', $source));
            foreach ($index as $key => $target) {
                if (substr($key, 0, strlen($tag)) == $tag) {
                    $result []= $target;
                    break;
                }
            }
        }
        return $result;
    }

    /**
     * Set preferred mappings
     *
     * Examples:
     *
     * ```
     * $mapper->setPreferredMappings(['en' => ['en_US', 'en_GB']]);
     * ```
     *
     * @param array $mappings
     *
     * @since 1.01
     */
    public function setPreferredMappings(array $mappings)
    {
        foreach ($mappings as $language => $map) {
            if (!is_array($map)) {
                $map = [$map];
            }
            $this->preferred[$language] = $map;
        }
    }
}
