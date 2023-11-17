<?php

declare(strict_types=1);

namespace Ibexa\ProductCatalogDateAttribute;

use Ibexa\Bundle\ProductCatalog\Validator\Constraints\AttributeValue;
use Ibexa\Contracts\ProductCatalog\Local\Attribute\ValueFormMapperInterface;
use Ibexa\Contracts\ProductCatalog\Values\AttributeDefinitionAssignmentInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

final class ValueFormMapper implements ValueFormMapperInterface
{
    public function createValueForm(
        string $name,
        FormBuilderInterface $builder,
        AttributeDefinitionAssignmentInterface $assignment,
        array $context = []
    ): void {
        $definition = $assignment->getAttributeDefinition();

        $options = [
            'disabled' => $context['translation_mode'] ?? false,
            'label' => $definition->getName(),
            'required' => $assignment->isRequired(),
            'constraints' => [
                new AttributeValue([
                    'definition' => $definition,
                ]),
            ],
            'widget' => 'single_text',
            'block_prefix' => 'date_attribute_value',
        ];

        if ($assignment->isRequired()) {
            $options['constraints'] = [
                new Assert\NotBlank(),
            ];
        }

        $builder->add($name, DateType::class, $options);
    }
}
