<?php
/**
 * PHP Speller
 *
 * @copyright 2015, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author    Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license   http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Speller\Source\Filter;

/**
 * Filter interface
 *
 * Filters are used to filter out text, which does not require checking
 *
 * @since 1.2
 */
interface Filter
{
    /**
     * Filter string
     *
     * @param string $string string to be filtered
     *
     * @return string filtered string
     *
     * @since 1.2
     */
    public function filter($string);
}
