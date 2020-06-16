<?php


use form_builder\models\modal_form_elements\ModalFormButton;
use form_builder\models\ModalForm;
use pocketmine\Player;

class ModalFormSample extends ModalForm
{
    public function __construct() {
        parent::__construct(
            "ModalFormSample",
            "Do you like apple?",
            new ModalFormButton("Yes"),
            new ModalFormButton("No"));
    }

    public function onClickButton1(Player $player): void {
        $player->sendMessage("Me too!");
    }

    public function onClickButton2(Player $player): void {
        $player->sendMessage("Why");
    }

    public function onClickCloseButton(Player $player): void {
        $player->sendMessage("Close");
    }
}