<?php


namespace form_builder\models\custom_form_elements;


class Label extends CustomFormElement
{
    public function __construct(string $text) {
        parent::__construct(CustomFormElementType::Label(), $text);
    }

    function toArray(): array {
        return [
            "type" => $this->type->getText(),
            "text" => $this->getText(),
        ];
    }
}