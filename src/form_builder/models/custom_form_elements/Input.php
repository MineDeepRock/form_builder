<?php


namespace form_builder\models\custom_form_elements;


class Input extends CustomFormElement
{
    /**
     * @var string
     */
    protected $placeholder;
    /**
     * @var string
     */
    protected $default;

    public function __construct(string $text, string $placeholder, string $default) {
        $this->placeholder = $placeholder;
        $this->default = $default;
        parent::__construct(CustomFormElementType::Input(), $text);
    }
}