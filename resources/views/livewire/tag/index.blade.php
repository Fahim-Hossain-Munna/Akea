<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Tags</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    Tags List
                </div>
                <div class="card-body">


                        <table class="table responsive">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tags as $tag)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>

                                    <td>{{ $tag->tag_name }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#infotag{{ $tag->id }}">Info</button>
                                        <button wire:click="modaltag({{ $tag->id  }})" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edittag{{ $tag->id }}">Edit</button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="infotag{{ $tag->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Inventory of Tags</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                          <h3 class="mt-5">Category Title - <span class="text-primary">{{ $tag->tag_name }}</span></h3>
                                          <h3 class="mt-1">Category Slug - <span class="text-primary">{{ $tag->tag_slug }}</span></h3>
                                          <h3 class="mt-1">Category Description - <span class="text-primary">{{ $tag->tag_description }}</span></h3>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  @include('livewire.tag.edit_modal')

                                @endforeach
                            </tbody>
                        </table>


                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    Tags Update
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="insert_tag" enctype="multipart/form-data">
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
