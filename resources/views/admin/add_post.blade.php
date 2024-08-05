@include('admin.header')
<link href="{{url('summernote/summernote-lite.min.css')}}" rel="stylesheet"/>
@include('admin.sidebar')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$page_title}}</h2>
                    </div>
                    <div class="container-fluid col-lg-10">
                    <form method="post" enctype="multipart/form-data">
                    @if(count($errors->all())>0)
                        <div class="alert alert-danger text-center">
                    @foreach($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                    </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-lable">Post title</label>
                            <div class="col-sm-10">
                            <input value="{{old('title')}}" type="text" class="form-control" placeholder="Title" name="title"> <br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-lable">Featured image</label>
                            <div class="col-sm-10">
                            <input type="file" id="file" class="form-control" name="file"> <br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-lable">Post Category</label>
                            <div class="col-sm-10">
                            <select id="category_id" name="category_id" class="form-control"> <br>
                            <option value="">--Select a Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                             @endforeach
                        </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-lable">Post Tag</label>
                            <div class="col-sm-10">
                            <select id="tag" name="tag_id" class="form-control"> <br>
                            <option value="">--Select a Tag</option>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                             @endforeach
                            </select>
                            </div>
                        </div>
                    <br style="clear: both;">
                        @csrf
                        <h3>Post content</h3>
                        <textarea id="summernote" name="content" style="min-height: 400px;">{{old('content')}}</textarea>
                        <div class="form-group now">
                       <div class="col-sm-12">
                       <input class="btn btn-primary" type="submit" value="Post">
                        <a href="{{ url('admin/posts') }}">
                                <input class="btn btn-success" style="float: right;" type="button" value="Back">
                         </a>
                       </div>
                        </div>
                    </div>
                </form>
                </div>
                 <!-- /. ROW  -->
                  <hr />
                 <!-- /. ROW  -->
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
@include('admin.footer')
<script src="{{url('summernote/summernote-lite.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({height:400});
    });
  </script>
