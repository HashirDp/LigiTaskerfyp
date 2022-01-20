<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;
//use Livewire\WithPagination;


class ServiceCategoriesComponent extends Component
{
   // use WithPaginations;
    public function render()
    {
        $scategories = ServiceCategory::paginate(20);
        return view('livewire.service-categories-component', ['scategories' => $scategories])->layout('layouts.base');
    }
}
