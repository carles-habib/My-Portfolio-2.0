<form action="#" method="post">
    @csrf
    {{ method_field('PUT') }}

<div class="form-group">
        <label class="form-label">permission title</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars(old('title')); ?>" class="form-control" id="permission-title" placeholder="Permission Title" required>
    </div>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
</form>
