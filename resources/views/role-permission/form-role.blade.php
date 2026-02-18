<form action="#" method="post">
<div class="form-group">
        <label class="form-label">role title</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars(old('title')); ?>" class="form-control" id="role-title" placeholder="Role Title" required>
    </div>
    <label class="form-label">Status</label>
    <div class="form-check">
        <input type="radio" name="status" value="1" <?php if(old('status') == '1') echo 'checked'; ?> class="form-check-input" id="roleassigned">
        <label class="form-check-label" for="roleassigned">yes</label>
    </div>
    <div class="mb-3 form-check">
        <input type="radio" name="status" value="0" <?php if(old('status') == '0') echo 'checked'; ?> class="form-check-input" id="roleassigned">
        <label class="form-check-label" for="rolenotassigned">no</label>
    </div>
    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
</form>
