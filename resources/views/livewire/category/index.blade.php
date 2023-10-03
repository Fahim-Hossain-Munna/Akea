<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>Category</h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    Categories List
                </div>
                <div class="card-body">


                        <table class="table responsive">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>
                                        <img src="{{ asset('uploads/category') }}/{{ $category->category_image }}" style="width: 80px; height:80px;">
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#info{{ $category->id }}">Info</button>
                                        <button wire:click="modalcategory({{ $category->id  }})" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $category->id }}">Edit</button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="info{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Inventory of Category</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row d-flex justify-content-center">
                                            <img src="{{ asset('uploads/category') }}/{{ $category->category_image }}" style="width: 80px; height:80px;">
                                          </div>
                                          <h3 class="mt-5">Category Title - <span class="text-primary">{{ $category->category_name }}</span></h3>
                                          <h3 class="mt-1">Category Slug - <span class="text-primary">{{ $category->category_slug }}</span></h3>
                                          <h3 class="mt-1">Category Description - <span class="text-primary">{{ $category->category_description }}</span></h3>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  @include('livewire.category.category_edit_modal')

                                @endforeach
                            </tbody>
                        </table>


                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-header">
                    Category Update
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="insert_category" enctype="multipart/form-data">
                    <label for="exampleInputEmail1" class="form-label">Category Title</label>
                    <input type="text" class="form-control" wire:model="category_name">
                    <label for="exampleInputEmail1" class="form-label">Category Slug</label>
                    <input type="text" class="form-control" wire:model="category_slug">
                    <label for="exampleInputEmail1" class="form-label">Category Description</label>
                    <textarea class="form-control" rows="6" wire:model="category_description"></textarea>
                    <label for="exampleInputEmail1" class="form-label">Category Image</label>
                    <input type="file" class="form-control" wire:model="category_image">

                    <button type="submit" class="btn btn-primary mt-3">submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


</div>
