<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class ImageUpload extends Component
{
    use WithFileUploads;
    public $image;
    public $id=1;
    function render()
    {
        return view('livewire.image-upload');
    }

     function save(){
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048,ratio=1/1',
        ]);
         $this->image->store('images', 'public');
         session()->flash('success', 'Image uploaded successfully');
         $this->resetImage();
     }
     function resetImage()
     {
        $this->reset('image');
        $this->id++;
        session()->flash('success', 'Image Has been Reset');
     }
}
