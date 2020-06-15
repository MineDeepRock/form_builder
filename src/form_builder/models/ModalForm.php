<?php


namespace form_builder\models;


use Closure;
use form_builder\models\modal_form_elements\ModalFormButton;
use pocketmine\form\Form;
use pocketmine\Player;

class ModalForm extends FormScheme implements Form
{
    /**
     * @var string
     */
    protected $content;
    /**
     * @var ModalFormButton[]
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
        parent::__construct(FormType::Modal(), $title);
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

        $index = 0;
        foreach ($this->buttons as $button) {
            $json['button' . $index] = $button->getText();
            $index++;
        }

        return $json;
    }
}