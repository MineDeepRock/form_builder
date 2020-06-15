<?php


namespace form_builder\models\custom_form_elements;


class Dropdown extends CustomFormElement
{

    /**
     * @var string[]
     */
    protected $options;
    protected $defaultIndex;

    public function __construct(CustomFormElementType $type, string $text, array $options, int $defaultIndex = 0) {
        $this->options = $options;
        $this->defaultIndex = $defaultIndex;
        parent::__construct($type, $text);
    }

}