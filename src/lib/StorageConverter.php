<?php
declare(strict_types=1);

namespace Ibexa\ProductCatalogDateAttribute;

use DateTimeInterface;
use Ibexa\Contracts\ProductCatalog\Local\Attribute\StorageConverterInterface;

final class StorageConverter implements StorageConverterInterface
{
    public function fromPersistence(array $data): ?DateTimeInterface
    {
        return $data[StorageSchema::COLUMN_VALUE];
    }

    public function toPersistence($value): array
    {
        return [
            StorageSchema::COLUMN_VALUE => $value,
        ];
    }
}
