<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;

    public function render()
    {
        return view('livewire.admin.admin-add-service-category-component')->layout('layouts.base');
    }
public function generateslug()
{

    $this->slug = Str::slug($this->name,'-');
}
public function updated($fields)
{
	$this->validateOnly($fields,[
		'name' => 'required',
		'slug' => 'required',
		'image' => 'required|mimes:jpeg,png'
	]);
}
    public function createNewCategory()
    {
        $this->validate([
            'name' => 'required',
             'slug' => 'required',
         'image' => 'required|mimes:jpeg,png'
         ]);

        $scategory = new ServiceCategory();
        $scategory->name = $this->name;
        $scategory->slug = $this->slug;
        $imageName = $this->slug .'-'. Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $scategory->image = $imageName;
        $scategory->save();
        session()->flash('message','Category has been created successfully!');
    }


}
