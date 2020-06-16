<?php


namespace form_builder\models\custom_form_elements;


class Toggle extends CustomFormElement
{
    private $default;

    public function __construct(string $text, bool $default) {
        parent::__construct(CustomFormElementType::Toggle(), $text);
        $this->default = $default;
    }

    function toArray(): array {
        return [
            "type" => $this->type->getText(),
            "text" => $this->text,
            "default" => $this->default
        ];
    }

    /**
     * @return bool
     */
    public function isDefault(): bool {
        return $this->default;
    }
}