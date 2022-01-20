<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Auth;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;

    public $service_category_id;
    public $price;

    public $image;
    public $thumbnail;



    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=> 'required',
            'slug'=> 'required',

            'service_category_id'=> 'required',
            'price'=> 'required',
            'image'=> 'required|mimes:jpeg,png',
            'thumbnail'=> 'required|mimes:jpeg,png',


        ]);
    }

    public function createService()
    {
        $this->validate([
            'name'=> 'required',
            'slug'=> 'required',

            'service_category_id'=> 'required',
            'price'=> 'required',
            'image'=> 'required|mimes:jpeg,png',
            'thumbnail'=> 'required|mimes:jpeg,png',


        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;

        $service->service_category_id = $this->service_category_id;
        $service->price = $this->price;



        $imageName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('services/thumbnails',$imageName);
        $service->thumbnail = $imageName;


        $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('services',$imageName2);
        $service->image = $imageName2;
        $service->user_id =Auth::user()->id;
        $service->save();
        $message='Service has been updated successfully!';

        if(Auth::user()->utype === 'SVP'){
            return redirect()->route('/sprovider/all_services')->with('message',$message);
        }else{
            return redirect()->route('/admin/all_services')->with('message',$message);
        }

    }

    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service-component',['categories'=>$categories])->layout('layouts.base');
    }
}
