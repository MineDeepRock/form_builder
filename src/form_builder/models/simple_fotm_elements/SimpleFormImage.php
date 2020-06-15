<?php


namespace form_builder\models\simple_form_elements;


class SimpleFormImage
{
    /**
     * @var SimpleFormImageType
     */
    private $type;
    /**
     * @var string
     */
    private $data;

    public function __construct(SimpleFormImageType $type, string $data) {
        $this->type = $type;
        $this->data = $data;
    }

    public function toArray(): array {
        return [
            'type' => $this->type->getText(),
            'data' => $this->data
        ];
    }
}