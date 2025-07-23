<style>
    #previewContainer img {
        width: 120px;
        height: 90px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ddd;
        position: relative;
    }

    .preview-box {
        position: relative;
    }

    .remove-image {
        position: absolute;
        top: -8px;
        right: -8px;
        background: red;
        color: #fff;
        border: none;
        border-radius: 50%;
        font-size: 12px;
        width: 20px;
        height: 20px;
        text-align: center;
        cursor: pointer;
        z-index: 10;
    }
</style>
@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">🏠 Add / Edit Property Listing</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Listing</h4>
                    <div>
                        <a href="{{ route('admin.developers.listings') }}" class="btn btn-sm btn-outline-dark">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Developer is auto-attached behind the scenes -->
                        <div class="row">
                            <!-- Title -->
                            <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Property Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Oakwood Villa" required>
                            </div>
                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="House">House</option>
                                <option value="Land">Land</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Villa">Villa</option>
                            </select>
                            </div>

                            <!-- Price -->
                            <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price (₦)</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="e.g., 20000000" required>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            </div>

                            <!-- Description -->
                            <div class="col-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe the property here..." required></textarea>
                            </div>

                            <!-- Upload Images -->
                            <div class="col-12 mb-4">
                                <label for="images" class="form-label">Upload Property Images (Max 5)</label>
                                <input type="file" class="form-control" id="imageUpload" name="images[]" multiple accept="image/*">
                                <small class="text-muted">You can upload up to 5 images (jpg, png, jpeg).</small>

                                <!-- Preview Area -->
                                <div id="previewContainer" class="d-flex flex-wrap gap-3 mt-3"></div>
                            </div>

                            <!-- Mark as Featured or Sold -->
                            <div class="col-md-3 mb-3">
                                <div class="form-check form-check-flat form-check-warning">
                                    <label class="form-check-label" for="is_featured">
                                        <input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured">
                                        Mark as Featured
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3 ">
                                <div class="form-check form-check-flat form-check-warning">
                                    <label class="form-check-label" for="is_sold"> 
                                        <input class="form-check-input" type="checkbox" value="1" id="is_sold" name="is_sold">
                                        Mark as Sold
                                    </label>
                                </div>
                            </div>
                            

                            <!-- Submit -->
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-warning">Save Listing</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <script>
      const imageUpload = document.getElementById('imageUpload');
      const previewContainer = document.getElementById('previewContainer');
      let imageFiles = [];

      imageUpload.addEventListener('change', (event) => {
          const files = Array.from(event.target.files);
          const totalImages = imageFiles.length + files.length;

          if (totalImages > 5) {
          alert("You can only upload a maximum of 5 images.");
          imageUpload.value = '';
          return;
          }

          files.forEach(file => {
          const reader = new FileReader();

          reader.onload = (e) => {
              const previewBox = document.createElement('div');
              previewBox.classList.add('preview-box', 'position-relative');

              const img = document.createElement('img');
              img.src = e.target.result;

              const removeBtn = document.createElement('button');
              removeBtn.innerText = '×';
              removeBtn.classList.add('remove-image');

              removeBtn.onclick = () => {
              previewBox.remove();
              imageFiles = imageFiles.filter(f => f !== file);
              // Reset input
              imageUpload.value = '';
              };

              previewBox.appendChild(removeBtn);
              previewBox.appendChild(img);
              previewContainer.appendChild(previewBox);

              imageFiles.push(file);
          };

          reader.readAsDataURL(file);
          });
      });
    </script>
@endsection 