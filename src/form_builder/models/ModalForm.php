<?php


namespace form_builder\models;


use form_builder\models\modal_form_elements\ModalFormButton;
use pocketmine\form\Form;
use pocketmine\Player;

abstract class ModalForm extends FormScheme implements Form
{
    /**
     * @var string
     */
    protected $content;
    /**
     * @var ModalFormButton
     */
    protected $button1;
    /**
     * @var ModalFormButton
     */
    protected $button2;

    public function __construct(string $title, string $content, ModalFormButton $button1, ModalFormButton $button2) {
        $this->content = $content;
        $this->button1 = $button1;
        $this->button2 = $button2;
        parent::__construct(FormType::Modal(), $title);
    }

    abstract public function onClickButton1(Player $player): void;

    abstract public function onClickButton2(Player $player): void;

    public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            $this->onClickCloseButton($player);
            return;
        }
        if ($data) {
            $this->onClickButton1($player);
        } else {
            $this->onClickButton2($player);
        }
    }

    public function jsonSerialize() {
        $json = parent::toArray();
        $json['content'] = $this->content;
        $json['button1'] = $this->button1->getText();
        $json['button2'] = $this->button2->getText();

        return $json;
    }
}