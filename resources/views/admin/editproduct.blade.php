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
                    <h3 class="box-title">ویرایش محصول</h3>

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
                    <form role="form" method="POST" action="{{route('editproductcheck',['id'=>$id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">نام محصول</label>
                                <input name="title" type="text" class="form-control" id="title" value="{{ $products->name }}">
                            </div>
                            <div class="form-group">
                                <label for="author">قیمت (تومان)</label>
                                <input name="author" type="number" class="form-control author" id="author" value="{{$products->price}}">
                            </div>
                            <div class="form-group">
                                <label for="title">دسته بندی</label>
                                <select class="form-control" name="reciver" id="reciver">
                                    <option value="{{$products->cat}}">{{$products->cat}}</option>
                                    @foreach($cats as $cat)

                                    <option value="{{$cat->id}}">{{$cat->name}}</option>

                                    @endforeach
                                </select>

                            </div>
                            <br>

                            <div class="form-group">
                                <label for="title">توضیحات محصول</label>
                                <textarea style="resize: none;" rows="4" class="form-control" name="desc">{{ $products->desc }}</textarea>

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

ویرایش محصول : {{$products->name}}

@endsection