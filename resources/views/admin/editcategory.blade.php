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
                    <h3 class="box-title">ویرایش دسته بندی</h3>

                </div>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
                @elseif(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
                @endif

                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{route('editcategorycheck',['id'=>$id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">عنوان دسته بندی</label>
                                <input name="title" type="text" class="form-control" id="title" value="{{ $cat->name }}">
                            </div>



                            <div class="form-group">
                                <label for="title">عکس </label>
                                <p>نکته : سایز تصویر 560 در 350 باشد</p>
                                <input type="file" name="file">

                            </div>

                        </div>
                        <!-- /.box-body -->


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">ارسال فایل</button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- /.box -->
        </div>
    </div>
</section>

@endsection

@section('title')

ویرایش دسته بندی : {{$cat->name}}

@endsection