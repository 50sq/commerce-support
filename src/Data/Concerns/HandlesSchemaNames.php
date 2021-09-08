<?php

namespace FiftySq\Commerce\Support\Data\Concerns;

trait HandlesSchemaNames
{
    protected string $delimiter = '_';

    /**
     * HandlesSchemaNames constructor.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTableName();
    }

    /**
     * Set table name.
     *
     * @return void
     */
    public function setTableName()
    {
        $table = parent::getTable();

        if (strlen(config('commerce.table_prefix')) > 0) {
            $table = $this->prefix($table);
        }

        $this->setTable($table);
    }

    /**
     * Return foreign key.
     *
     * @return string
     */
    public function getForeignKey(): string
    {
        $key = parent::getForeignKey();

        if (strlen(config('commerce.table_prefix')) === 0) {
            return $key;
        }

        return $this->prefix($key);
    }

    /**
     * Prefix tables and foreign keys with Commerce prefix.
     *
     * @param $name
     * @return string
     */
    protected function prefix($name): string
    {
        return implode($this->delimiter, [config('commerce.table_prefix'), $name]);
    }
}
