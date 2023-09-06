<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">
        <div class="modal-body">
            <div class="mb-3">
                <label>Select Category</label>
                <select wire:model.defer="category_id" required class="form-select">
                    @foreach ($categories as $catItem)
                    <option value="{{$catItem->id}}">{{$catItem->name}}</option>
                    @endforeach

                </select>
                @error('category_id') <small class="text-danger"> {{ $message }} </small> @enderror
            </div>
          <div class="mb-3">
            <label>Brand Name</label>
            <input type="text" wire:model.defer="name" class="form-control"/>
            @error('name') <small class="text-danger"> {{ $message }} </small> @enderror
          </div>
          <div class="mb-3">
            <label>Slug</label>
            <input type="text" wire:model.defer="slug" class="form-control"/>
            @error('slug') <small class="text-danger"> {{ $message }} </small> @enderror
          </div>
          <div class="mb-3">
            <label>Status</label><br/>
            <input type="checkbox" wire:model.defer="status"/>
            @error('status') <small class="text-danger"> {{ $message }} </small> @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Brand Update modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Brands</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading>
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">
                    Loading..
                </span>
            </div>

        </div>
        <div wire:loading.remove>
        <form wire:submit.prevent="updateBrand">
        <div class="modal-body">
            <div class="mb-3">
                <label>Select Category</label>
                <select wire:model.defer="category_id" required class="form-select">
                    @foreach ($categories as $catItem)
                    <option value="{{$catItem->id}}">{{$catItem->name}}</option>
                    @endforeach

                </select>
                @error('category_id') <small class="text-danger"> {{ $message }} </small> @enderror
            </div>
          <div class="mb-3">
            <label>Brand Name</label>
            <input type="text" wire:model.defer="name" class="form-control"/>
            @error('name') <small class="text-danger"> {{ $message }} </small> @enderror
          </div>
          <div class="mb-3">
            <label>Slug</label>
            <input type="text" wire:model.defer="slug" class="form-control"/>
            @error('slug') <small class="text-danger"> {{ $message }} </small> @enderror
          </div>
          <div class="mb-3">
            <label>Status</label><br/>
            <input type="checkbox" wire:model.defer="status"/>
            @error('status') <small class="text-danger"> {{ $message }} </small> @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
        </div>
        </form>
        </div>
    </div>
    </div>
</div>

 <!-- Brand delete modal -->
  <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete brand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading>
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">
                    Loading..
                </span>
            </div>

        </div>
        <div wire:loading.remove>
        <form wire:submit.prevent="destroyBrand">
        <div class="modal-body">
          <h4> Are you sure you want to delete this data?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirm</button>
        </div>
        </form>
        </div>
    </div>
    </div>
</div>

