@extends('admin.layout.menu')

@section('content')

<section class="content">
    <div class="row">

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست تمام دسته بندی ها</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>شماره</th>
                            <th>عنوان دسته بندی</th>
                            <th>عکس</th>
                            <th>تغییرات</th>
                        </tr>


                        @foreach($categorys as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td><a href="{{url('icons')}}/{{$category->img}}" target="_blank">نمایش</a></td>
                            <td><a href="{{route('deletecategory',['id'=>$category->id])}}">حذف</a> / <a href="{{route('editcategory',['id'=>$category->id])}}">ویرایش</a></td>
                        </tr>

                        @endforeach


                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@endsection

@section('title')

لیست دسته بندی ها

@endsection