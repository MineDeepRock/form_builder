<?php


namespace form_builder\models\modal_form_elements;


use Closure;
use form_builder\models\FormElement;
use pocketmine\Player;

class ModalFormButton extends FormElement
{
    /**
     * @var string
     */
    private $text;
    /**
     * @var Closure
     */
    private $onClicked;

    public function __construct(string $text, Closure $onClicked) {
        $this->text = $text;
        $this->onClicked = $onClicked;
    }

    public function click(Player $player): void {
        ($this->onClicked)($player);
    }

    /**
     * @return string
     */
    public function getText(): string {
        return $this->text;
    }
}