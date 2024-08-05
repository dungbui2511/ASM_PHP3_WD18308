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
                    <div class="form-group row">
                            <label for="file" class="col-sm-2 col-form-lable">Tag Name</label>
                            <div class="col-sm-10">
                            <input disabled value="{{$row->name}}" type="text" class="form-control" placeholder="Tag name" name="name"> <br>
                            </div>
                        </div>
                    <br style="clear: both;">
                        @csrf
                        <input class="btn btn-danger" type="submit" value="Delete">
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

