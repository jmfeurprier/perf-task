<?php

namespace perf\Task;

/**
 *
 *
 */
class ParameterDefinitionCollectionBuilder
{

    /**
     *
     *
     * @var ParameterDefinitionBuilder[]
     */
    private $parameterDefinitionBuilders = array();

    /**
     *
     *
     * @param string $name
     * @return ParameterDefinitionBuilder
     */
    public function newParameter($name)
    {
        $parameterDefinitionBuilder = new ParameterDefinitionBuilder($name);

        $this->parameterDefinitionBuilders[] = $parameterDefinitionBuilder;

        return $parameterDefinitionBuilder;
    }

    /**
     *
     *
     * @return ParameterDefinitionCollection
     */
    public function build()
    {
        $parameterDefinitions = array();

        foreach ($this->parameterDefinitionBuilders as $parameterDefinitionBuilder) {
            $parameterDefinitions[] = $parameterDefinitionBuilder->build();
        }

        return new ParameterDefinitionCollection($parameterDefinitions);
    }
}
