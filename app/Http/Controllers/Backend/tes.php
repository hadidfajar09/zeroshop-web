<div class="form-group">
    <h5>Thumbnail<span class="text-danger">*</span></h5>
      <div class="custom-file">
        <input type="file" class="custom-file-input" name="product_thumbnail" id="product_thumbnail" onchange="mainThumbnail(this)" required="">
        <label class="custom-file-label" for="customFile">Choose Image</label> <br><br>
        <img src="" alt="" id="mainThumb">
        <br><br>
        @error('product_thumbnail')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
  </div>




  <div class="form-group">
    <h5>Multi Image<span class="text-danger">*</span></h5>
      <div class="custom-file">
        <input type="file" class="custom-file-input" name="multi_img[]" id="multiImg" required="" multiple="">
        <label class="custom-file-label" for="customFile">Choose Images</label>
        @error('multi_img')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <br><br>
        <div class="row" id="preview_img"></div>
        <br><br>
      </div>
  </div>


  <div class="form-group">
                                        <h5>Selling Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" class="form-control" required="" value="{{ $products->selling_price }}"> </div>
                                            @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>