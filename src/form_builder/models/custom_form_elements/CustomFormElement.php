<?php


namespace form_builder\models\custom_form_elements;


use form_builder\models\FormElement;

class CustomFormElement extends FormElement
{

    /**
     * @var string
     */
    protected $id;
    /**
     * @var CustomFormElementType
     */
    protected $type;
    protected $text;

    public function __construct(CustomFormElementType $type, string $text) {
        $this->id = uniqid();
        $this->type = $type;
        $this->text = $text;
    }

    /**
     * @return CustomFormElementType
     */
    public function getType(): CustomFormElementType {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }
}