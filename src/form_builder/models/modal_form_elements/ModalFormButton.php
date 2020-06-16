<?php


namespace form_builder\models\modal_form_elements;


use form_builder\models\FormElement;

class ModalFormButton extends FormElement
{
    /**
     * @var string
     */
    private $text;

    public function __construct(string $text) {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}