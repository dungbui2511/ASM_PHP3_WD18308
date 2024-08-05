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
                        </div>
                        @endforeach
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                        @endif
                    <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-lable">Tag Name</label>
                            <div class="col-sm-10">
                            <input value="{{$row->name}}" id="tag" type="text" class="form-control" placeholder="Tag" name="name"> <br>
                            </div>
                        </div>
                    <br style="clear: both;">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Save">
                        <a href="{{url('admin/tags')}}">
                            <input class="btn btn-success" style="float: right;" type="button" value="Back">
                        </a>
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
