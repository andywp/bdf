@extends('layouts.admin-panel')
@section('title','Add History')
@section('styles')

@endsection

@section('content')
    
    <div class="row ">
        <div class="col-md-12" >
            <h4 class="card-title mb-3" >Add History</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.history.store') }}" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
                <div class="row mb-3">
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
                
                    <div class="pt-2 d-flex">
                        @csrf
                        <input type="hidden" name="posts_author" value="{{ Auth::user()->name }}">
                        <button type="submit" class="btn btn-outline-primary  mx-3">Save</button>
                        <a  href="{{ route('admin.history.index') }}" class="btn btn-outline-danger " >Back</a>
                    </div>
                    
                </div>

            </form>
        </div>
    </div>
@endsection

@section('scripts')

<script src="{{ asset('assets/vendor/ckeditor4.6.2/ckeditor.js') }}"></script> 
<!-- <script src="{{ asset('assets/vendor/ckeditor4.6.2/config.js') }}"></script> -->
<!-- <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script> -->
<script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script type="text/javascript" >

       

    var CSRFToken = $('meta[name="csrf-token"]').attr('content');
   // console.log(CSRFToken,'CSRFToken');
     var options = {
        height: 150,
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: "{{route('ckeditor.upload') }}?_token={{csrf_token()}}&command=QuickUpload",
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+CSRFToken,
        filebrowserFlashUploadUrl: '/laravel-filemanager?type=Flash',
        filebrowserUploadMethod: 'form',
        removeButtons: 'PasteFromWord'
    };
    CKEDITOR.replace('editor', options);

    //var route_prefix = "/laravel-filemanager?type=Images";
   // $('#button_add_post_image').filemanager('image',{prefix: route_prefix});

   $('#fileupload').on('change', event => {
        $('#del').show();
        let input =event.currentTarget;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = event => {
                $('#preview_add_post_image').attr('src', event.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            //$('#banner_remove').val(0); 
        }
    });

    function removeFile_add_content_image(){
        $("#preview_add_content_image").html('');
        $("#file_add_content_image").val('');
        $("#btn_remove_add_content_image").hide();
        $("#btn_restore_add_content_image").show();
        return false;
    }
   /*  function restoreFile_add_content_image(){
        $("#preview_add_content_image").html('<img src="https://zando.id/content/uploads/modules/pages/thumbs/small/20211102045410.jpg">');
        $("#file_add_content_image").val("20211102045410.jpg");
        $("#btn_restore_add_content_image").hide();
        $("#btn_remove_add_content_image").show();
        return false;
    } */

</script>

<!-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('editor', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script> -->



@endsection
