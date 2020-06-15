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
     * @var ModalFormButton
     */
    protected $button1;
    /**
     * @var ModalFormButton
     */
    protected $button2;
    /**
     * @var Closure
     */
    protected $onClosed;

    public function __construct(string $title, string $content, ModalFormButton $button1, ModalFormButton $button2, Closure $onClosed) {
        $this->content = $content;
        $this->button1 = $button1;
        $this->button2 = $button2;
        $this->onClosed = $onClosed;
        parent::__construct(FormType::Modal(), $title);
    }

    public function handleResponse(Player $player, $data): void {
        if ($data === null) {
            ($this->onClosed)($player);
        }
        if ($data) {
            $this->button1->click($player);
        } else {
            $this->button2->click($player);
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