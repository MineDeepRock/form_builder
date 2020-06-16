<?php


namespace form_builder\models\custom_form_elements;


class Dropdown extends CustomFormElement
{

    /**
     * @var string[]
     */
    protected $options;
    protected $defaultIndex;

    public function __construct(string $text, array $options, int $defaultIndex = 0) {
        $this->options = $options;
        $this->defaultIndex = $defaultIndex;
        parent::__construct(CustomFormElementType::Dropdown(), $text);
    }

    public function setResult($result): void {
        parent::setResult($this->options[$result]);
    }

    function toArray(): array {
        return [
            "type" => $this->type->getText(),
            "text" => $this->text,
            'options' => $this->options,
            "default" => $this->defaultIndex
        ];
    }
}