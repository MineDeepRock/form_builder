<?php


namespace form_builder\models\simple_form_elements;


class SimpleFormImageType
{
    private $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    static function Path() : SimpleFormImageType {
        return new SimpleFormImageType("path");
    }

    static function Url() : SimpleFormImageType {
        return new SimpleFormImageType("url");
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}