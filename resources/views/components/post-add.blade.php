<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="validationTooltip01" class="form-label">Title</label>
                <input type="text" name="post_title" class="form-control form-control-sm @error('post_title') is-invalid @enderror" id="validationTooltip01" value="{{ old('post_title') }}">
                @error('post_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <label class="form-label">Content Text</label>
                <textarea id="editor" class="form-control  form-control-sm @error('post_content') is-invalid @enderror" name="post_content" required> {{ old('post_content') }}</textarea>
                @error('post_content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername" class="form-label">Description</label>
                <textarea rows="4" name="post_description" class="form-control form-control-sm @error('post_description') is-invalid @enderror" id="exampleInputUsername">{{ old('post_description')}}</textarea>
                
                @error('post_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
            </div>
            <div class="mb-3">
                <label for="validationTooltip03" class="form-label">Tag <small class="text-warning"> Pisahkan Dengan Tanda Koma</small></label>
                <input type="text" name="post_tag" class="form-control form-control-sm @error('post_tag') is-invalid @enderror" id="validationTooltip03" value="{{ old('post_tag') }}">
                @error('post_tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card h-auto">
        <div class="card-header">
            <h5 class="card-title mb-0">Featured Image</h5>
        </div>
        <div class="card-body">
            
            <div class="upload-file">
                <div class="preview">
                    <div><img  id="preview_add_post_image" src="{{ asset('assets/images/default.jpg') }}"></div>
                </div>
                <div class="upload-file-input">	
                    <!-- <a id="btn_remove_add_content_image" href="javascript:void(0)" class="delFile" onclick="return removeFile_add_content_image()"><i class="fa fa-trash"></i></a> -->
                    <a id="btn_restore_add_content_image" href="javascript:void(0)" class="restoreFile" onclick="return restoreFile_add_content_image()" style="display:none"><i class="fa fa-reply"></i></a>
                    <p class="button">
                    <button type="button" id="button_add_post_image" data-input="thumbnail"  data-preview="preview_add_post_image" class="off position-relative">
                    <i class="fa fa-upload"></i>
                    <input 
                            id="fileupload" 
                            data-default-src="{{ asset('assets/images/default.jpg') }}" 
                            type="file" name="post_image" 
                
                            class="upload-input" 
                            readonly accept="image/*">    
                    </button>
                    </p>		
                </div>
                <input id="thumbnail" class="form-control" type="hidden" name="filepath">
            </div>
        </div>
    </div>

    <!-- publish -->
    <div class="card h-auto">
        <div class="card-header">
            <h5 class="card-title mb-0">Publish</h5>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-6">
                    <label class="control-label mt-2">Publish</label>
                </div>
                <div class="col-6 flot-end">
                    <input type="hidden" name="publish" value="0">
                    <input type="checkbox" name="publish" value="1" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="md" data-width="100">
                </div>
            </div>
        </div>

    </div>
</div>