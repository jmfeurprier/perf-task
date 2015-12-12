<?php

namespace perf\Task;

/**
 *
 *
 */
interface Task
{

    /**
     *
     *
     * @param {string:mixed} $parameters
     * @return void
     */
    public function execute(array $parameters = array());
}
