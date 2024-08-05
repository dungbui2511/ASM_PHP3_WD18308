@include('admin.header')
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
                            <label for="file" class="col-sm-2 col-form-lable">Add tag</label>
                            <div class="col-sm-10">
                            <input value="{{old('name')}}" type="text" class="form-control" placeholder="Tag" name="name"> <br>
                            </div>
                    </div>
                    <br style="clear: both;">
                        @csrf
                        <input class="btn btn-primary" type="submit" value="Save">
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

