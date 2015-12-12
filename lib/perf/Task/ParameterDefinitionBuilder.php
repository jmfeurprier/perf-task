<?php

namespace perf\Task;

/**
 *
 *
 */
class ParameterDefinitionBuilder
{

    /**
     *
     *
     * @var bool
     */
    private $required = true;

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
     * @param string $name
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     *
     *
     * @param bool $required
     * @return ParameterDefinitionBuilder Fluent return.
     */
    public function setRequired($required = true)
    {
        $this->required = $required;

        return $this;
    }

    /**
     *
     *
     * @return ParameterDefinitionBuilder Fluent return.
     */
    public function setOptional()
    {
        $this->required = false;

        return $this;
    }

    /**
     *
     *
     * @param mixed $defaultValue
     * @return ParameterDefinitionBuilder Fluent return.
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     *
     *
     * @param string $description
     * @return ParameterDefinitionBuilder Fluent return.
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     *
     *
     * @return ParameterDefinition
     */
    public function build()
    {
        return new ParameterDefinition(
            $this->required,
            $this->name,
            $this->defaultValue,
            $this->description
        );
    }
}
