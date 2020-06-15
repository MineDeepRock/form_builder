<?php


namespace form_builder\models;


use Closure;
use form_builder\models\simple_form_elements\SimpleFormButton;
use pocketmine\Player;

class SimpleForm extends FormScheme
{
    /**
     * @var string
     */
    protected $content;
    /**
     * @var SimpleFormButton[]
     */
    protected $buttons;
    /**
     * @var Closure
     */
    protected $onClosed;

    public function __construct(string $title, string $content, array $buttons, Closure $onClosed) {
        $this->content = $content;
        $this->buttons = $buttons;
        $this->onClosed = $onClosed;
        parent::__construct(FormType::Simple(), $title);
    }

    public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            ($this->onClosed)($player);
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