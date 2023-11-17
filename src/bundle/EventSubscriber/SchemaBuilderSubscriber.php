<?php
declare(strict_types=1);

namespace Ibexa\Bundle\ProductCatalogDateAttribute\EventSubscriber;

use Ibexa\Contracts\DoctrineSchema\Event\SchemaBuilderEvent;
use Ibexa\Contracts\DoctrineSchema\SchemaBuilderEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class SchemaBuilderSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            SchemaBuilderEvents::BUILD_SCHEMA => ['onBuildSchema', 200],
        ];
    }

    public function onBuildSchema(SchemaBuilderEvent $event): void
    {
        $schemaBuilder = $event->getSchemaBuilder();
        $schemaBuilder->importSchemaFromFile(__DIR__ . '/../../bundle/Resources/config/schema.yaml');
    }
}
