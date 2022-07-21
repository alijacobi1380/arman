<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = DB::table('products')->orderBy('id', 'DESC')->get();
        $cats = DB::table('categorys')->get();
        return view('admin.products', compact('products', 'cats'));
    }


    public function addproduct()
    {
        $cats = DB::table('categorys')->get();
        return view('admin.addproduct', compact('cats'));
    }

    public function addproductcheck(Request $request)
    {
        $message = [
            'title.required' => 'لطفا نام محصول را وارد نمایید',
            'desc.required' => 'لطفا توضیحات محصول را وارد نمایید',
            'file.required' => 'لطفا عکس محصول را آپلود نمایید',
            'file.mimes' => 'فرمت فایل مشکل دارد',
            'author.required' => 'لطفا قیمت محصول را وارد نمایید',
            'author.integer' => 'لطفا قیمت محصول را به صورت عدد وارد نمایید',
            'reciver.required' => 'دسته بندی یافت نشد'
        ];
        $val = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png',
            'author' => 'required|integer',
            'reciver' => 'required'
        ], $message);



        $title = $request->title;
        $desc = $request->desc;
        $filename = sha1(time());
        $file = $request->file('file');
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $file->move('products', $filename . "." . $extension);



        DB::table('products')->insert(
            [
                'name' => $title,
                'img' => $filename . "." . $extension,
                'desc' => $desc,
                'price' => $request->author,
                'cat' => $request->reciver,
            ]
        );



        return redirect()->back()->with('message', 'محصول با موفقیت ثبت شد');
    }

    public function editproduct($id)
    {
        $products = DB::table('products')->where('id', '=', $id)->first();
        $cats = DB::table('categorys')->get();
        return view('admin.editproduct', compact('products', 'cats', 'id'));
    }


    public function editproductcheck($id, Request $request)
    {
        $message = [
            'title.required' => 'لطفا نام محصول را وارد نمایید',
            'desc.required' => 'لطفا توضیحات محصول را وارد نمایید',
            'file.mimes' => 'فرمت فایل مشکل دارد',
            'author.required' => 'لطفا قیمت محصول را وارد نمایید',
            'author.integer' => 'لطفا قیمت محصول را به صورت عدد وارد نمایید',
            'reciver.required' => 'دسته بندی یافت نشد'
        ];
        $val = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'file' => 'mimes:jpg,jpeg,png',
            'author' => 'required|integer',
            'reciver' => 'required'
        ], $message);


        $title = $request->title;
        $desc = $request->desc;

        if (!empty($request->file('file'))) {
            $food = DB::table('products')->where('id', '=', $id)->first();
            unlink('products/' . $food->img);
            $filename = sha1(time());
            $file = $request->file('file');
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $file->move('products', $filename . "." . $extension);
            DB::table('products')->where('id', '=', $id)->update(
                [
                    'name' => $title,
                    'img' => $filename . "." . $extension,
                    'desc' => $desc,
                    'price' => $request->author,
                    'cat' => $request->reciver,
                ]
            );
        } else {
            DB::table('products')->where('id', '=', $id)->update(
                [
                    'name' => $title,
                    'desc' => $desc,
                    'price' => $request->author,
                    'cat' => $request->reciver,
                ]
            );
        }

        return redirect()->back()->with('message', 'محصول با موفقیت ویرایش شد');
    }

    public function deleteproduct($id)
    {
        $food = DB::table('products')->where('id', '=', $id)->first();
        unlink('products/' . $food->img);
        DB::table('products')->where('id', '=', $id)->delete();
        return back();
    }
}
