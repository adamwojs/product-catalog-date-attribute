<?php

declare(strict_types=1);

namespace Ibexa\ProductCatalogDateAttribute;

use Doctrine\DBAL\Types\Types;
use Ibexa\Contracts\ProductCatalog\Local\Attribute\StorageDefinitionInterface;

final class StorageDefinition implements StorageDefinitionInterface
{
    public function getColumns(): array
    {
        return [
            StorageSchema::COLUMN_VALUE => Types::DATE_MUTABLE,
        ];
    }

    public function getTableName(): string
    {
        return StorageSchema::TABLE_NAME;
    }
}
