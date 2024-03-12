<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    protected string $status;
    
    /**
     * Create a new component instance.
     */
    public function __construct(string $status)
    {
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $color = 'blue';
        $color = $this->status === 'C' ? 'green' : $color;
        $color = $this->status === 'P' ? 'red' : $color;
        $textStatus = getStatusSupport($this->status);

        return view('components.status-support', compact('textStatus', 'color'));
    }
}
