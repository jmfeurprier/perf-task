<?php

namespace perf\Task;

/**
 *
 *
 */
class ParameterDefinition
{

    /**
     *
     *
     * @var bool
     */
    private $required;

    /**
     *
     *
     * @var string
     */
    private $name;

    /**
     *
     *
     * @var mixed
     */
    private $defaultValue;

    /**
     *
     *
     * @var null|string
     */
    private $description;

    /**
     * Constructor.
     *
     * @param bool $required
     * @param string $name
     * @param mixed $defaultValue
     * @param null|string $description
     * @return void
     */
    public function __construct($required, $name, $defaultValue, $description)
    {
        $this->required     = $required;
        $this->name         = $name;
        $this->defaultValue = $defaultValue;
        $this->description  = $description;
    }

    /**
     *
     *
     * @return bool
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     *
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     *
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     *
     *
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     *
     * @param mixed $value
     * @return Parameter
     */
    public function bindValue($value)
    {
        return new Parameter($this, $value);
    }
}
