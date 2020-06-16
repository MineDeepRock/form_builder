<?php


namespace form_builder\models\custom_form_elements;


class StepSlider extends CustomFormElement
{
    private $steps;
    private $default;

    public function __construct(string $text, array $steps, int $default) {
        $this->steps = $steps;
        $this->default = $default;
        parent::__construct(CustomFormElementType::StepSlider(), $text);
    }

    public function setResult($result): void {
        parent::setResult($this->steps[$result]);
    }

    function toArray(): array {
        return [
            "type" => $this->type->getText(),
            "text" => $this->text,
            "steps" => $this->steps,
            "default" => $this->default
        ];
    }

    /**
     * @return array
     */
    public function getSteps(): array {
        return $this->steps;
    }

    /**
     * @return int
     */
    public function getDefault(): int {
        return $this->default;
    }
}