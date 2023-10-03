<div wire:ignore.self class="modal fade" id="edittag{{ $tag->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inventory of Tags</h5>
          <button type="button" wire:click="resetInput" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">
                    Category Update
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form wire:submit.prevent="updateTag({{ $tag_id }})" >
                                <label for="exampleInputEmail1" class="form-label">Tag Title</label>
                                <input type="text" class="form-control" wire:model="tag_name">
                                <label for="exampleInputEmail1" class="form-label">Tag Slug</label>
                                <input type="text" class="form-control" wire:model="tag_slug">
                                <label for="exampleInputEmail1" class="form-label">Tag Description</label>
                                <textarea class="form-control" rows="6" wire:model="tag_description"></textarea>
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
