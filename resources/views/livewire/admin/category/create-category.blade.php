<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Add New Game Category</h3>
    </div>
    <div class="block-content">
        <!-- Category Creation Form -->
        <form wire:submit.prevent="createCategory">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" wire:model="name" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" wire:model="description" required></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
