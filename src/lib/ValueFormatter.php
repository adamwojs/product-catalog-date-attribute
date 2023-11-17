<?php
declare(strict_types=1);

namespace Ibexa\ProductCatalogDateAttribute;

use DateTimeInterface;
use Ibexa\Contracts\ProductCatalog\Local\Attribute\ValueFormatterInterface;
use Ibexa\Contracts\ProductCatalog\Values\AttributeInterface;

final class ValueFormatter implements ValueFormatterInterface
{
    public function formatValue(AttributeInterface $attribute, array $parameters = []): ?string
    {
        /** @var \DateTimeInterface|null $value */
        $value = $attribute->getValue();
        if ($value === null) {
            return null;
        }

        return $value->format(DateTimeInterface::RFC3339);
    }
}
