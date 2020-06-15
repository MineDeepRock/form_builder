<?php


namespace form_builder\models;


class FormType
{
    private $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    static function Modal() : FormType {
        return new FormType("modal");
    }

    static function Simple() : FormType {
        return new FormType("form");
    }

    static function Custom() : FormType {
        return new FormType("custom_form");
    }


    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}