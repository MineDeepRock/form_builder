<?php


use form_builder\models\modal_form_elements\ModalFormButton;
use form_builder\models\ModalForm;
use pocketmine\Player;

class ModalFormSample extends ModalForm
{
    public function __construct() {
        parent::__construct("ModalFormSample", "Do you like apple?",
            new ModalFormButton("Yes",function (Player $player){
                $player->sendMessage("Me too!");
            }),
            new ModalFormButton("No",function (Player $player){
                $player->sendMessage("Why?");
            }),
            function(Player $player){
                $player->sendMessage("Close The Form");
            });
    }
}