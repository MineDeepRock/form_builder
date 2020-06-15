<?php


namespace form_builder\models\simple_form_elements;


use Closure;
use form_builder\models\FormElement;
use pocketmine\Player;

class SimpleFormButton extends FormElement
{
    /**
     * @var string
     */
    protected $text;
    /**
     * @var SimpleFormImage
     */
    protected $image;
    /**
     * @var Closure
     */
    private $onClicked;

    public function __construct(string $text, ?SimpleFormImage $image, Closure $onClicked) {
        $this->text = $text;
        $this->image = $image;
        $this->onClicked = $onClicked;
    }

    public function click(Player $player): void {
        ($this->onClicked)($player);
    }

    public function toArray(): array {
        $json = ['text' => $this->text];
        if ($this->image !== null) {
            $json['image'] = $this->image->toArray();
        }

        return $json;
    }
}