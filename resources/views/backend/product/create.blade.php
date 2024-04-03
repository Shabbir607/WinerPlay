@extends('backend.layouts.master')

@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            <form method="post" action="{{ route('products.update', ['id' => $product->id]) }}">
                @csrf

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Product Name <span class="text-danger">*</span></label>
                    <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{$product->title}}" class="form-control">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="location" class="col-form-label">Location <span class="text-danger">*</span></label>
                    <input id="location" type="text" name="location" placeholder="Enter location" value="{{$product->location}}" class="form-control">
                    @error('location')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="summary" name="summary">{{$product->summary}}</textarea>
                    @error('summary')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price" placeholder="Enter price" value="{{$product->price}}" class="form-control">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock" class="col-form-label">Stock <span class="text-danger">*</span></label>
                    <input id="stock" type="number" name="stock" placeholder="Enter stock" value="{{$product->stock}}" class="form-control">
                    @error('stock')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="opening_date" class="col-form-label">Opening Date <span class="text-danger">*</span></label>
                    <input id="opening_date" type="date" name="opening_date" value="{{$product->opening_date}}" class="form-control">
                    @error('opening_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date" class="col-form-label">End Date <span class="text-danger">*</span></label>
                    <input id="end_date" type="date" name="end_date" value="{{$product->end_date}}" class="form-control">
                    @error('end_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price_per_share" class="col-form-label">Price per Share <span class="text-danger">*</span></label>
                    <input id="price_per_share" type="number" name="price_per_share" placeholder="Enter price per share" value="{{$product->price_per_share}}" class="form-control">
                    @error('price_per_share')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="discount" class="col-form-label">Discount (%)</label>
                    <input id="discount" type="number" name="discount" min="0" max="100" placeholder="Enter discount" value="{{$product->discount}}" class="form-control">
                    @error('discount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_featured" class="col-form-label">Is Featured</label><br>
                    <input type="checkbox" name="is_featured" id="is_featured" value="{{$product->is_featured}}" {{$product->is_featured ? 'checked' : ''}}> Yes
                </div>

                <div class="form-group">
                    <label for="tags" class="col-form-label">Tags</label>
                    <input id="tags" type="text" name="tags" placeholder="Enter tags" value="{{$product->tags}}" class="form-control">
                    @error('tags')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photo" class="col-form-label">Photo <span class="text-danger">*</span></label>
                    <input id="photo" type="file" name="photo" class="form-control-file">
                    @error('photo')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cat_id" class="col-form-label">Category</label>
                    <select name="cat_id" id="cat_id" class="form-control">
                        <option value="">--Select a category--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->cat_id == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('cat_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="child_cat_id" class="col-form-label">Sub Category</label>
                    <select name="child_cat_id" id="child_cat_id" class="form-control">
                        <option value="">--Select a sub-category--</option>
                        @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ $product->child_cat_id == $subCategory->id ? 'selected' : '' }}>
                                {{ $subCategory->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('child_cat_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="brand_id" class="col-form-label">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control">
                        <option value="">--Select a brand--</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control">
                        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>



@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    // $('#lfm').filemanager('image');

    $(document).ready(function() {
      $('#summary').summernote({
        placeholder: "Write short description.....",
          tabsize: 2,
          height: 100
      });
    });

    $(document).ready(function() {
      $('#description').summernote({
        placeholder: "Write detail description.....",
          tabsize: 2,
          height: 150
      });
    });
    // $('select').selectpicker();

</script>

<script>
  $('#cat_id').change(function(){
    var cat_id=$(this).val();
    // alert(cat_id);
    if(cat_id !=null){
      // Ajax call
      $.ajax({
        url:"/admin/category/"+cat_id+"/child",
        data:{
          _token:"{{csrf_token()}}",
          id:cat_id
        },
        type:"POST",
        success:function(response){
          if(typeof(response) !='object'){
            response=$.parseJSON(response)
          }
          // console.log(response);
          var html_option="<option value=''>----Select sub category----</option>"
          if(response.status){
            var data=response.data;
            // alert(data);
            if(response.data){
              $('#child_cat_div').removeClass('d-none');
              $.each(data,function(id,title){
                html_option +="<option value='"+id+"'>"+title+"</option>"
              });
            }
            else{
            }
          }
          else{
            $('#child_cat_div').addClass('d-none');
          }
          $('#child_cat_id').html(html_option);
        }
      });
    }
    else{
    }
  })
</script>
@endpush
