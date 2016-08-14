<?php

/**
 * Created by IntelliJ IDEA.
 * User: bulent
 * @author Bulent Kocaman
 * @author Bulent Kocaman <hi@bulentkocaman.com>
 */

namespace Daft\Search;

/**
 * Interface QueryInterface
 * @package Daft\Search
 */
interface QueryInterface
{
    /**
     * {@inheritdoc}
     * @return array
     */
    public function getQuery();

    /**
     * {@inheritdoc}
     * @param $text string
     * @return self
     */
    public function setQuery($text);
}