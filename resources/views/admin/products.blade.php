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
                    <h3 class="box-title">لیست تمام محصولات</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>شماره</th>
                            <th>نام محصول</th>
                            <th>توضیحات محصول</th>
                            <th>دسته بندی</th>
                            <th>عکس</th>
                            <th>تغییرات</th>
                        </tr>


                        @foreach($products as $product)

                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->desc}}</td>
                            <td>@foreach($cats as $cat) @if($product->cat==$cat->id) {{$cat->name}} @endif @endforeach</td>
                            <td><a href="{{url('products')}}/{{$product->img}}" target="_blank">نمایش</a></td>
                            <td><a href="{{route('deleteproduct',['id'=>$product->id])}}">حذف</a> / <a href="{{route('editproduct',['id'=>$product->id])}}">ویرایش</a></td>
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

لیست محصولات

@endsection