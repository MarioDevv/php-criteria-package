<?php
declare (strict_types = 1);

namespace Mariodevv\EloquentCriteriaPackage\Domain\Criteria;


class Filter
{
    public function __construct(
        public readonly FilterField $field,
        public readonly FilterOperator $operator,
        public readonly FilterValue $value,
        public readonly array $relations = []
    ) {}

    public static function fromValues(string $field, string $operator, ?string $value, array $relations): self
    {

        return new self(
            new FilterField($field),
            new FilterOperator(Operator::from($operator)),
            new FilterValue($value),
            $relations
        );
    }

    public function hasRelations(): bool
    {
        return !empty($this->relations);
    }

    public function toArray(): array
    {
        return [
            'field' => $this->field->value,
            'operator' => $this->operator->value,
            'value' => $this->value->value,
        ];
    }

}
