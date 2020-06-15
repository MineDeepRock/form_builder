<?php


use form_builder\models\simple_form_elements\SimpleFormButton;
use form_builder\models\simple_form_elements\SimpleFormImage;
use form_builder\models\simple_form_elements\SimpleFormImageType;
use form_builder\models\SimpleForm;
use pocketmine\Player;

class SimpleFormSample extends SimpleForm
{
    public function __construct() {
        parent::__construct("Sample", "This is sample",
            [
                new SimpleFormButton("Apple",
                    new SimpleFormImage(SimpleFormImageType::Path(), "textures/items/apple.png"),
                    function (Player $player) {
                        $player->sendMessage("Select Apple");
                    }
                ),
                new SimpleFormButton("Beef",
                    new SimpleFormImage(SimpleFormImageType::Url(), "https://~~/~~/beef.png"),
                    function (Player $player) {
                        $player->sendMessage("Select Beef");
                    }
                ),
                new SimpleFormButton("No Image",
                    null,
                    function (Player $player) {
                        $player->sendMessage("No Image");
                    }
                )
            ],
            function (pocketmine\Player $player) {
                $player->sendMessage("Close The Form");
            });
    }

}