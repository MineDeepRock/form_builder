<?php


namespace form_builder\models;


use form_builder\models\custom_form_elements\CustomFormElement;
use pocketmine\form\Form;
use pocketmine\Player;

abstract class CustomForm extends FormScheme implements Form
{
    /**
     * @var CustomFormElement[]
     */
    protected $content;

    public function __construct(string $title, array $content) {
        $this->content = $content;
        parent::__construct(FormType::Custom(), $title);
    }

    abstract function onSubmit(Player $player): void;

    public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            $this->onClickCloseButton($player);
            return;
        }
        $index = 0;
        foreach ($data as $value) {
            $this->content[$index]->setResult($value);
            $index++;
        }

        $this->onSubmit($player);
    }

    public function jsonSerialize() {
        $json = parent::toArray();
        $json['content'] = [];

        foreach ($this->content as $customFormElement) {
            $json['content'][] = $customFormElement->toArray();
        }

        return $json;
    }
}