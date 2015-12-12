<?php

namespace perf\Task;

/**
 *
 *
 */
class ParameterCollection
{

    /**
     *
     *
     * @var {string:Parameter}
     */
    private $parameters = array();

    /**
     * Constructor.
     *
     * @param Parameter[] $parameter
     * @return void
     * @throws \InvalidArgumentException
     */
    public function __construct(array $parameters)
    {
        foreach ($parameters as $parameter) {
            $this->addParameter($parameter);
        }
    }

    /**
     *
     * @param Parameter $parameter
     * @return void
     * @throws \InvalidArgumentException
     */
    private function addParameter(Parameter $parameter)
    {
        $name = $parameter->getDefinition()->getName();

        if (array_key_exists($name, $this->parameters)) {
            throw new \InvalidArgumentException("Parameter '{$name}' provided multiple times.");
        }

        $this->parameters[$name] = $parameter;
    }

    /**
     *
     *
     * @param string $name
     * @return mixed
     * @throws \DomainException
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $this->parameters[$name]->getValue();
        }

        throw new \DomainException("Parameter '{$name}' not set.");
    }

    /**
     *
     *
     * @param string $name
     * @param mixed $defaultValue
     * @return mixed
     */
    public function tryGet($name, $defaultValue = null)
    {
        if ($this->has($name)) {
            return $this->parameters[$name]->getValue();
        }

        return $defaultValue;
    }

    /**
     *
     *
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return array_key_exists($name, $this->parameters);
    }
}
