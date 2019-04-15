<?php

namespace EloquentSearch\EloquentSearch;

/**
 * Class Sample
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Sample
{

    /**
     * @var  \EloquentSearch\EloquentSearch\Config
     */
    private $config;

    /**
     * Sample constructor.
     *
     * @param \EloquentSearch\EloquentSearch\Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param $name
     *
     * @return  string
     */
    public function sayHello($name)
    {
        $greeting = $this->config->get('greeting');

        return $greeting.' '.$name;
    }

}
