<?php


namespace form_builder\models;


use Closure;
use form_builder\models\simple_form_elements\SimpleFormButton;
use pocketmine\form\Form;
use pocketmine\Player;

abstract class SimpleForm extends FormScheme implements Form
{
    /**
     * @var string
     */
    protected $content;
    /**
     * @var SimpleFormButton[]
     */
    protected $buttons;


    public function __construct(string $title, string $content, array $buttons) {
        $this->content = $content;
        $this->buttons = $buttons;
        parent::__construct(FormType::Simple(), $title);
    }

    public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            $this->onClickCloseButton($player);
            return;
        }
        $this->buttons[$data]->click($player);
    }

    public function jsonSerialize() {
        $json = parent::toArray();
        $json['content'] = $this->content;
        $json['buttons'] = [];

        foreach ($this->buttons as $button) {
            $json['buttons'][] = $button->toArray();
        }

        return $json;
    }
}