<?php


namespace form_builder\models\custom_form_elements;


class Slider extends CustomFormElement
{
    private $min;
    private $max;
    private $default;

    public function __construct(string $text, int $min, int $max, int $default) {
        $this->min = $min;
        $this->max = $max;
        $this->default = $default;
        parent::__construct(CustomFormElementType::Slider(), $text);
    }

    function toArray(): array {
        return [
            "type" => $this->type->getText(),
            "text" => $this->text,
            "min" => $this->min,
            "max" => $this->max,
            "default" => $this->default
        ];
    }

    /**
     * @return int
     */
    public function getMin(): int {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getMax(): int {
        return $this->max;
    }

    /**
     * @return int
     */
    public function getDefault(): int {
        return $this->default;
    }
}