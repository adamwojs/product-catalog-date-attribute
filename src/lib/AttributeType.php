<?php
declare(strict_types=1);

namespace Ibexa\ProductCatalogDateAttribute;

use Ibexa\Contracts\ProductCatalog\Values\AttributeTypeInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

final class AttributeType implements AttributeTypeInterface
{
    private TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function getIdentifier(): string
    {
        return 'date';
    }

    public function getName(): string
    {
        return $this->translator->trans(
            /** @Desc("Date") */
            'attribute_type',
            [],
            'ibexa_product_catalog_date_attribute'
        );
    }
}
