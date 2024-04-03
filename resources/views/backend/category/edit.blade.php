@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Category</h5>
    <div class="card-body">
      <form method="post" action="{{ route('category.update', ['id' => $category->id]) }}"enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$category->title}}" class="form-control">
          @error('title')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Summary</label>
          <textarea class="form-control" id="summary" name="summary">{{$category->summary}}</textarea>
          @error('summary')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

          <div class="form-group">
              <label for="is_parent">Is Parent</label><br>
              <input type="checkbox" name='is_parent' id='is_parent' value='1' checked> Yes
          </div>
          {{-- {{$parent_cats}} --}}

          <div class="form-group d-none" id='parent_cat_div'>
              <label for="parent_id">Parent Category</label>
              {{--          <select name="parent_id" class="form-control">--}}
              {{--              <option value="">--Select any category--</option>--}}
              {{--              @foreach($parent_cats as $key=>$parent_cat)--}}
              {{--                  <option value='{{$parent_cat->id}}'>{{$parent_cat->title}}</option>--}}
              {{--              @endforeach--}}
              {{--          </select>--}}
              <select name="parent_id" id="cat_id" class="form-control" disabled>
                  @foreach($parent_cats as $key=>$parent_cat)
                      <option value="{{$parent_cat->id}}">--Select any category--</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="cat_id_country">Country <span class="text-danger">*</span></label>
              <select name="country" id="cat_id_country" class="form-control">
                  <option value="">--Select any Country--</option>
                  @foreach($markets->unique('country.id') as $market)
                      <option value='{{ $market->country->id }}'>{{ $market->country->name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="cat_id_market">MarketPlace <span class="text-danger">*</span></label>
              <select name="market" id="cat_id_market" class="form-control" disabled>
                  <option value="">--Select any MarketPlace--</option>
              </select>
          </div>
          <script>
              document.getElementById('cat_id_country').addEventListener('change', function() {
                  var countryId = this.value;
                  var marketSelect = document.getElementById('cat_id_market');
                  marketSelect.innerHTML = '<option value="">--Select any MarketPlace--</option>';
                  var categorySelect = document.getElementById('cat_id');
                  categorySelect.innerHTML = '<option value="">--Select any category--</option>';

                  if (countryId !== '') {
                      // Filter markets based on selected country
                      var filteredMarkets = @json($markets->groupBy('country_id'))[countryId];
                      filteredMarkets.forEach(function(market) {
                          var option = document.createElement('option');
                          option.value = market.id;
                          option.textContent = market.name;
                          marketSelect.appendChild(option);
                      });
                      marketSelect.removeAttribute('disabled');
                  } else {
                      marketSelect.setAttribute('disabled', 'disabled');
                  }
              });

              document.getElementById('cat_id_market').addEventListener('change', function() {
                  var marketId = this.value;
                  var categorySelect = document.getElementById('cat_id');
                  categorySelect.innerHTML = '<option value="">--Select any category--</option>';

                  if (marketId !== '') {
                      // Filter categories based on selected marketplace
                      var filteredCategories = @json($categories->groupBy('market_id'))[marketId];
                      filteredCategories.forEach(function(category) {
                          var option = document.createElement('option');
                          option.value = category.id;
                          option.textContent = category.title;
                          categorySelect.appendChild(option);
                      });
                      categorySelect.removeAttribute('disabled');
                  } else {
                      categorySelect.setAttribute('disabled', 'disabled');
                  }
              });
          </script>
        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Photo</label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Choose
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$category->photo}}">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

          <div class="form-group">
              <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
              <select name="status" class="form-control" {{ $category->status !== 'active' ? 'disabled' : '' }}>
                  <option value="active" {{ $category->status === 'active' ? 'selected' : '' }}>Active</option>
                  <option value="inactive" {{ $category->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
              </select>
              @error('status')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>

          <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
<script>
  $('#is_parent').change(function(){
    var is_checked=$('#is_parent').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>
@endpush
