<?php


namespace form_builder\models;


class SimpleForm extends FormScheme
{
    protected $buttons;
    public function __construct(string $title) {
        parent::__construct(FormType::Simple(), $title);
    }
}