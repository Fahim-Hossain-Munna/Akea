<div wire:ignore.self class="modal fade" id="edit{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inventory of Category</h5>
          <button type="button" wire:click="resetInput" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">
                    Category Update
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <form wire:submit.prevent="updateCategory({{ $category_id }})">
                                <label for="exampleInputEmail1" class="form-label">Category Title</label>
                                <input type="text" class="form-control" wire:model="category_name">
                                <label for="exampleInputEmail1" class="form-label">Category Slug</label>
                                <input type="text" class="form-control" wire:model="category_slug">
                                <label for="exampleInputEmail1" class="form-label">Category Description</label>
                                <textarea class="form-control" rows="6" wire:model="category_description"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">submit</button>
                                </form>
                        </div>
                        <div class="col-5">

                           <img src="{{ asset('uploads/category') }}/{{ $category->category_image }}" style="width: 120px; height:120px; border-radius:50%;">
                           <br>

                            <form wire:submit.prevent="updateCategoryImage({{ $category_id }})" enctype="multipart/form-data">
                                <label for="exampleInputEmail1" class="form-label">Category Image {{ $test }}</label>
                                <input type="file" class="form-control" wire:model="category_image">
                                <button type="submit" class="btn btn-primary mt-3">submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
