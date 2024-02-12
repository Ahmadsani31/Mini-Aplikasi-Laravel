<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public $active;
    public $icon;
    public $href;
    public function __construct($active, $icon, $href)
    {
        $this->active = $active;
        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
