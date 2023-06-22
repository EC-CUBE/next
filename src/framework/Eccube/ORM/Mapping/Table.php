<?php

declare(strict_types=1);

namespace Eccube\ORM\Mapping;

use Attribute;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;
use Doctrine\ORM\Mapping\MappingAttribute;

/**
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("CLASS")
 */
#[Attribute(Attribute::TARGET_CLASS)]
final class Table implements MappingAttribute
{
    /**
     * @var string|null
     * @readonly
     */
    public $name;

    /**
     * @var string|null
     * @readonly
     */
    public $schema;

    /**
     * @var array<Index>|null
     * @readonly
     */
    public $indexes;

    /**
     * @var array<UniqueConstraint>|null
     * @readonly
     */
    public $uniqueConstraints;

    /**
     * @var array<string,mixed>
     * @readonly
     */
    public $options = [];

    /**
     * @param array<Index>            $indexes
     * @param array<UniqueConstraint> $uniqueConstraints
     * @param array<string,mixed>     $options
     */
    public function __construct(
        ?string $name = null,
        ?string $schema = null,
        ?array $indexes = null,
        ?array $uniqueConstraints = null,
        array $options = []
    ) {
        $this->name              = $name;
        $this->schema            = $schema;
        $this->indexes           = $indexes;
        $this->uniqueConstraints = $uniqueConstraints;
        $this->options           = $options;
    }
}