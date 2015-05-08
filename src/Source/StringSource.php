<?php
/**
 * PHP Speller
 *
 * @copyright 2015, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Mekras\Speller\Source;

/**
 * String as a text source
 *
 * @since x.xx
 */
class StringSource implements Source
{
    /**
     * Source text
     *
     * @var string
     */
    private $text;

    /**
     * Create text source from string
     *
     * @param string $text
     *
     * @since x.xx
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Return text as one string
     *
     * @return string
     *
     * @since x.xx
     */
    public function getAsString()
    {
        return (string) $this->text;
    }
}
