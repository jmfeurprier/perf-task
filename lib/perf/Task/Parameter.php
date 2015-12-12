<?php

namespace perf\Task;

/**
 *
 *
 */
class Parameter
{

    /**
     *
     *
     * @var ParameterDefinition
     */
    private $definition;

    /**
     *
     *
     * @var mixed
     */
    private $value;

    /**
     * Constructor.
     *
     * @param ParameterDefinition $definition
     * @param mixed $value
     * @return void
     */
    public function __construct(ParameterDefinition $definition, $value)
    {
        $this->definition = $definition;
        $this->value      = $value;
    }

    /**
     *
     *
     * @return ParameterDefinition
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     *
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
