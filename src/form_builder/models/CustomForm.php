<?php


namespace form_builder\models;


class CustomForm extends FormScheme
{
    public function __construct(string $title) {
        parent::__construct(FormType::Custom(), $title);
    }

}