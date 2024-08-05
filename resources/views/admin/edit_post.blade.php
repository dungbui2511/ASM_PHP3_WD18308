@include('admin.header')
<link href="{{ url('summernote/summernote-lite.min.css') }}" rel="stylesheet"/>
@include('admin.sidebar')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_title }}</h2>
            </div>
            <div class="container-fluid col-lg-10">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger text-center">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                        <div class="col-sm-10">
                            <input value="{{ old('title', $post->title) }}" type="text" class="form-control" placeholder="Title" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">Featured Image</label>
                        <div class="col-sm-10">
                            <input type="file" id="file" class="form-control" name="file">
                            @if ($post->image)
                                <img src="{{ url('uploads/' . $post->image) }}" style="width: 200px;" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-sm-2 col-form-label">Post Category</label>
                        <div class="col-sm-10">
                            <select id="category_id" name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tag_id" class="col-sm-2 col-form-label">Post Tag</label>
                        <div class="col-sm-10">
                            <select id="tag_id" name="tag_id" class="form-control">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ $tag->id == $post->tag_id ? 'selected' : '' }}>
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">Post Content</label>
                        <div class="col-sm-10">
                            <textarea id="summernote" name="content" class="form-control" style="min-height: 400px;">{{ old('content', $post->content) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" value="Save">
                            <a href="{{ url('admin/posts') }}">
                                <input class="btn btn-success" style="float: right;" type="button" value="Back">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
<script src="{{ url('summernote/summernote-lite.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400
        });
    });
</script>
