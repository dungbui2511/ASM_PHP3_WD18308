@include('admin.header')
<link href="{{url('summernote/summernote-lite.min.css')}}" rel="stylesheet"/>
<style>
    .table {
    width: 100%;
    table-layout: fixed; /* Makes the table cells fixed-width */
}

.table th, .table td {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap; /* Prevents the text from wrapping */
}

.table td.content {
    white-space: normal; /* Allows the content cell to wrap */
    max-height: 150px; /* Set a max height for the content cell */
    overflow-y: auto; /* Adds a vertical scrollbar if content is too long */
}

.table td.action {
    text-align: center; /* Center align the action buttons */
}

</style>
@include('admin.sidebar')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>{{$page_title}}</h2>
                     <a href="{{url('admin/posts/add')}}">
                     <button class="btn btn-primary btn-sm" style="float: right;"><i class="fa fa-plus"></i>Add Post</button>
                     </a>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr><th>Title</th><th>Content</th><th>Category</th><th>Tag</th><th>Image</th><th>Date</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            @if($rows)
                            @foreach($rows as $row)
                            <tr>
                                <td>
                                    {{$row->title}}
                                </td>
                                <td>
                                    <?=$row->content?>
                                </td>
                                <td>{{ $row->tag_names }}</td>
                                <td>
                                    <img src="{{url('uploads/'.$row->image)}}" style="width: 150px;" alt="">
                                </td>
                                <td>
                                    {{date("jS M, Y",strtotime($row->created_at))}}
                                </td>
                                <td>
                                    {{$row->created_at}}
                                </td>
                                <td>
                                    <a href="{{url('admin/posts/edit/'.$row->id)}}">
                                    <button class="btn-sm btn btn-success"><i class="fa fa-edit"></i>Edit</button>
                                    </a>
                                    <a href="{{url('admin/posts/delete/'.$row->id)}}">
                                    <button class="btn-sm btn btn-warning"><i class="fa fa-times"></i>Delete</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    @include('pagination')
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
        $('#summernote').summernote();
    });
  </script>