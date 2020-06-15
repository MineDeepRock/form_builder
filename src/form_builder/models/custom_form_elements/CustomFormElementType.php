<?php


namespace form_builder\models\custom_form_elements;


class CustomFormElementType
{
    private $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    static function Dropdown() : CustomFormElementType {
        return new CustomFormElementType("dropdown");
    }

    static function Input() : CustomFormElementType {
        return new CustomFormElementType("input");
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}