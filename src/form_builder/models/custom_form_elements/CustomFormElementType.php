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

    static function Label() : CustomFormElementType {
        return new CustomFormElementType("label");
    }

    static function Slider() : CustomFormElementType {
        return new CustomFormElementType("slider");
    }

    static function StepSlider() : CustomFormElementType {
        return new CustomFormElementType("step_slider");
    }

    static function Toggle() : CustomFormElementType {
        return new CustomFormElementType("toggle");
    }


    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}