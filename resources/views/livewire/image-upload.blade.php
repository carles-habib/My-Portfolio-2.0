<div class="offset- col-6">

<h1>Image Upload</h1>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if($image)
        <img width="500" height="500" src="{{$image->temporaryUrl()}}" alt="">
    @endif
    <div class="mb-3">
        <input type="file" id="upload{{$id}}" wire:model="image" class="form-control">
        @error('image')
        <span class="text-danger">{{$message}}</span>
        @enderror
        @if($image)
        <button wire:click="resetImage" class="btn btn-secondary">Reset</button>
        @endif
            <button wire:click="save" class="btn btn-primary">Save</button>
    </div>
</div>
