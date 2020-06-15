<?php


namespace form_builder\models;


class FormScheme
{
    /**
     * @var FormType
     */
    protected $type;
    /**
     * @var string
     */
    protected $title;

    public function __construct(FormType $type, string $title) {
        $this->type = $type;
        $this->title = $title;
    }

    public function toArray(): array {
        return [
            'type' => $this->type->getText(),
            'title' => $this->title,
        ];
    }
}