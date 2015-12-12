<?php

namespace perf\Task;

/**
 *
 *
 */
class ParameterDefinitionCollection
{

    /**
     *
     *
     * @var ParameterDefinition[]
     */
    private $parameterDefinitions = array();

    /**
     * Constructor.
     *
     * @param ParameterDefinition[] $parameterDefinitions
     * @return void
     */
    public function __construct(array $parameterDefinitions)
    {
        foreach ($parameterDefinitions as $parameterDefinition) {
            $this->addParameterDefinition($parameterDefinition);
        }
    }

    /**
     *
     *
     * @param ParameterDefinition $parameterDefinition
     * @return void
     */
    private function addParameterDefinition(ParameterDefinition $parameterDefinition)
    {
        $this->parameterDefinitions[] = $parameterDefinition;
    }

    /**
     *
     *
     * @param {string:mixed} $parameterValues
     * @return ParameterCollection
     */
    public function bindValues(array $parameterValues)
    {
        $parameters = array();

        foreach ($this->parameterDefinitions as $parameterDefinition) {
            $name = $parameterDefinition->getName();

            if (array_key_exists($name, $parameterValues)) {
                $value = $parameterValues[$name];
            } else {
                if ($parameterDefinition->isRequired()) {
                    throw new \RuntimeException("Missing required parameter '{$name}'.");
                }

                $value = $parameterDefinition->getDefaultValue();
            }

            $parameters[] = $parameterDefinition->bindValue($value);
        }

        return new ParameterCollection($parameters);
    }
}
