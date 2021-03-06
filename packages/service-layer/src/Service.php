<?php

namespace Broobe\Services;

use Broobe\Services\Contracts\ServiceInterface;
use Broobe\Services\Exceptions\ModelNotFoundException;

abstract class Service implements ServiceInterface
{
    /** @var string */
    protected $model;

    /**
     * Service constructor.
     *
     * @throws ModelNotFoundException
     */
    public function __construct()
    {
        $this->setModel();

        if (!$this->model || !class_exists($this->model)) {
            throw new ModelNotFoundException();
        }
    }

    /**
     * Set model class name.
     *
     * @return void
     */
    abstract protected function setModel(): void;

    public function getModel(): string
    {
        return $this->model;
    }
}
