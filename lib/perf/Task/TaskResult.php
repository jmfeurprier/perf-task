<?php

namespace perf\Task;

/**
 *
 *
 */
class TaskResult
{

    /**
     *
     *
     * @var {string:mixed}
     */
    private $values = array();

    /**
     * Constructor.
     *
     * @param {string:mixed} $values
     * @return void
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     *
     *
     * @param string $key
     * @return mixed
     * @throws \DomainException
     */
    public function getValue($key)
    {
        if ($this->hasValue($key)) {
            return $this->values[$key];
        }

        throw new \DomainException("Result value '{$key}' not defined.");
    }

    /**
     *
     *
     * @param string $key
     * @return bool
     */
    public function hasValue($key)
    {
        return array_key_exists($key, $this->values);
    }
}
