<?php

namespace perf\Task;

/**
 *
 *
 */
abstract class TaskBase implements Task
{

    /**
     *
     *
     * @var ParameterCollection
     */
    private $parameters;

    /**
     *
     *
     * @var {string:mixed}
     */
    private $resultValues = array();

    /**
     *
     *
     * @param {string:mixed} $parameters
     * @return TaskResult
     */
    public function execute(array $parameterValues = array())
    {
        $parameterDefinitionCollectionBuilder = new ParameterDefinitionCollectionBuilder();

        $this->defineParameters($parameterDefinitionCollectionBuilder);

        $parameterDefinitionCollection = $parameterDefinitionCollectionBuilder->build();

        $this->parameters = $parameterDefinitionCollection->bindValues($parameterValues);

        $this->resultValues = array();

        $this->run();

        return new TaskResult($this->resultValues);
    }

    /**
     *
     * Default implementation.
     *
     * @param ParameterDefinitionCollectionBuilder $builder
     * @return void
     */
    protected function defineParameters(ParameterDefinitionCollectionBuilder $builder)
    {
    }

    /**
     *
     *
     * @return void
     */
    abstract protected function run();

    /**
     *
     *
     * @param string $key
     * @return mixed
     * @throws \DomainException
     */
    protected function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    /**
     *
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    protected function setResultValue($key, $value)
    {
        $this->resultValues[$key] = $value;
    }

    /**
     *
     *
     * @param string $key
     * @return mixed
     * @throws \DomainException
     */
    protected function getResultValue($key)
    {
        return $this->resultValues[$key];
    }
}
