<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use illuminate\support\Facades\DB;

class SproviderDashboardComponent extends Component
{


    public function render()
    {

        return view('livewire.sprovider.sprovider-dashboard-component')->layout('livewire.sprovider.sprovider-dashboard-component');
    }
}
