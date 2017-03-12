<?php
/**
 * PHP Speller.
 *
 * @copyright 2017, Михаил Красильников <m.krasilnikov@yandex.ru>
 * @author    Михаил Красильников <m.krasilnikov@yandex.ru>
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace Mekras\Speller\Source;

/**
 * Base class for meta sources.
 *
 * @since x.x
 */
abstract class MetaSource implements EncodingAwareSource
{
    /**
     * Wrapped source.
     *
     * @var EncodingAwareSource
     */
    protected $source;

    /**
     * Create wrapper source.
     *
     * @param EncodingAwareSource $source Original source.
     *
     * @since x.x
     */
    public function __construct(EncodingAwareSource $source)
    {
        $this->source = $source;
    }

    /**
     * Return source text encoding.
     *
     * @return string
     *
     * @since x.x
     */
    public function getEncoding()
    {
        return $this->source->getEncoding();
    }
}
