<?php

namespace FiftySq\Commerce\Data;

use FiftySq\Commerce\Commerce;
use FiftySq\Commerce\Data\Models\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommerceMigration extends Migration
{
    /**
     * Defines the product columns to add if they don't exist.
     *
     * columnName: [type, default, nullable]
     *
     * @var array
     */
    public static array $productColumns = [
        'title' => ['string'],
        'description' => ['text'],
        'slug' => ['string'],
        'type' => ['string', null, true],
        'is_enabled' => ['boolean', false],
        'is_shippable' => ['boolean', false],
        'is_taxable' => ['boolean', true],
        'has_free_shipping' => ['boolean', false],
        'channel' => ['string', 'local'],
        'external_channel_id' => ['string'],
        'gateway' => ['string'],
        'external_gateway_id' => ['string'],
    ];

    /**
     * Defines the product foreign keys to add if they don't exist.
     *
     * columnName: [relation, nullable]
     *
     * @var array|array[]
     */
    public static array $productForeignKeys = [
        'category_id' => ['categories', true],
    ];

    /**
     * Return name of Products table.
     *
     * @return string
     */
    public function productTable(): string
    {
        return static::model()->getTable();
    }

    /**
     * Return foreign key of Products table.
     *
     * @return string
     */
    public function productTableForeignKey()
    {
        return static::model()->getForeignKey();
    }

    /**
     * The sellable model.
     */
    public static function model()
    {
        return Commerce::sellable();
    }

    /**
     * Add defined columns to the table.
     *
     * @param Blueprint $table
     */
    public function addProductTableColumns(Blueprint $table)
    {
        foreach (static::$productForeignKeys as $key => $config) {
            if (! Schema::hasColumn(static::productTable(), $key)) {
                $table->foreignId(static::prefix($key))->index()->nullable(
                    count($config) > 1 ? last($config) : false
                )->constrained();
            }
        }

        foreach (static::$productColumns as $columnName => $schema) {
            if (! Schema::hasColumn(static::productTable(), $columnName)) {
                tap($table->{head($schema)}($columnName), fn ($column) => $this->setColumnProperties($column, ...$schema));
            }
        }
    }

    /**
     * Set column properties.
     *
     * @param $columnName
     * @param $columnType
     * @param  null  $default
     * @param  bool  $nullable
     * @return mixed
     */
    protected function setColumnProperties($columnName, $columnType, $default = null, bool $nullable = true)
    {
        switch ($columnType) {
            case 'boolean':
                $columnName->default((bool) $default);
                break;
            case 'datetime':
            case 'integer':
            case 'string':
            case 'text':
                if ($default) {
                    $columnName->default($default);
                }

                $columnName->nullable((bool) $nullable);
                break;
        }

        return $columnName;
    }

    /**
     * @param $tableName
     * @return string
     */
    protected static function prefix($tableName): string
    {
        return Commerce::prefix($tableName);
    }
}
