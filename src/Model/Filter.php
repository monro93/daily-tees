<?php

namespace App\Model;

use Symfony\Component\Serializer\Annotation\Groups;

class Filter
{
    const TYPE_INPUT = 'input';
    const TYPE_SELECT = 'select';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_DATE_RANGE = 'date_range';

    /**
     * @var string
     * @Groups("filter")
     */
    private $property;

    /**
     * @var string
     * @Groups("filter")
     */
    private $type;

    /**
     * @var string
     * @Groups("filter")
     */
    private $label;

    /**
     * @var array
     * @Groups("filter")
     */
    private $options = [];

    public function __construct(string $property, string $label, string $type, $options = [])
    {
        $this->property = $property;
        $this->label = $label;
        $this->type = $type;
        $this->options = $options;
    }
    /**
     * @return string
     */
    public function getProperty(): string
    {
        return $this->property;
    }

    /**
     * @param string $property
     */
    public function setProperty(string $property)
    {
        $this->property = $property;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(?string $label)
    {
        $this->label = $label;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }


}