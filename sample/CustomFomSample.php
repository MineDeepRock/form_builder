<?php

use form_builder\models\custom_form_elements\Dropdown;
use form_builder\models\custom_form_elements\Input;
use form_builder\models\custom_form_elements\Label;
use form_builder\models\custom_form_elements\Slider;
use form_builder\models\custom_form_elements\StepSlider;
use form_builder\models\custom_form_elements\Toggle;
use form_builder\models\CustomForm;
use pocketmine\Player;
use pocketmine\Server;

class CustomFomSample extends CustomForm
{

    private $server;

    private $description;
    private $name;
    private $speciality;
    private $age;
    private $job;
    private $isPublic;

    public function __construct(Server $server, Player $player) {
        $this->server = $server;

        $this->description = new Label("自己紹介をしてください");
        $this->name = new Input("名前", "名前", $player->getName());
        $this->speciality = new Dropdown("特技", ["サッカー", "バトミントン", "水泳"]);
        $this->age = new Slider("年齢", 0, 100, 30);
        $this->job = new StepSlider("職業", ["学生", "飲食", "コンビニ", "講師", "無職", "その他"], 0);
        $this->isPublic = new Toggle("自己紹介をチャットに送信しますか？", false);

        parent::__construct("自己紹介",
            [
                $this->description,
                $this->speciality,
                $this->name,
                $this->age,
                $this->job,
                $this->isPublic,
            ]
        );
    }

    function onClickCloseButton(Player $player): void {
        // TODO: Implement onClickCloseButton() method.
    }

    function onSubmit(Player $player): void {
        $name = $this->name->getResult();
        $speciality = $this->speciality->getResult();
        $age = $this->age->getResult();
        $job = $this->job->getResult();
        $public = $this->isPublic->getResult();

        $text = "{$name}、{$age}歳です\n特技は{$speciality}です。職業は{$job}です。";
        if ($public) {
            foreach ($this->server->getOnlinePlayers() as $onlinePlayer) {
                $onlinePlayer->sendMessage($text);
            }
        } else {
            $player->sendMessage($text);
        }
    }
}