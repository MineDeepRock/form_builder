<?php


namespace form_builder\models\custom_form_elements;


use form_builder\models\FormElement;

abstract class CustomFormElement extends FormElement
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

    protected $result;

    public function __construct(CustomFormElementType $type, string $text) {
        $this->id = uniqid();
        $this->type = $type;
        $this->text = $text;
    }

    abstract function toArray(): array;

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

    /**
     * @return mixed
     */
    public function getResult() {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result): void {
        $this->result = $result;
    }
}