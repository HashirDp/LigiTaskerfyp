<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
class AdminServicesComponent extends Component
{
    use WithPagination;

    public function deleteService($service_id)
    {
        $service = Service::find($service_id);
        if($service->thumnail)
        {
            unlink('images/services/thubnails'. '/' . $service->thumbnail);
        }
        if($service->image)
        {
            unlink('images/services'. '/' . $service->image);
        }
        $service->delete();
        session()->flash('message','Service has been deleted successfully!');
    }

    public function render()
    {
        if(Auth::user()->utype === 'ADM'){
            $services = Service::paginate(10);
        }else{
            $services = Service::where('user_id',Auth::user()->id)->paginate(10);
        }
        return view('livewire.admin.admin-services-component',['services'=>$services])->layout('layouts.base');
    }
}
