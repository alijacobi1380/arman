<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function categoryslist()
    {
        $categorys = DB::table('categorys')->orderBy('id', 'DESC')->get();
        return view('admin.categorys', compact('categorys'));
    }


    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function addcategorycheck(Request $request)
    {
        $message = [
            'title.required' => 'لطفا عنوان دسته بندی را وارد نمایید',
            'file.required' => 'لطفا عکس دسته بندی را آپلود نمایید',
            'file.mimes' => 'فرمت فایل مشکل دارد',
        ];
        $val = $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png',
        ], $message);



        $title = $request->title;
        $desc = $request->desc;
        $filename = sha1(time());
        $file = $request->file('file');
        $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $file->move('icons', $filename . "." . $extension);



        DB::table('categorys')->insert(
            [
                'name' => $title,
                'img' => $filename . "." . $extension,
            ]
        );



        return redirect()->back()->with('message', 'دسته بندی با موفقیت ثبت شد');
    }

    public function editcategory($id)
    {
        $cat = DB::table('categorys')->where('id', '=', $id)->first();
        return view('admin.editcategory', compact('cat', 'id'));
    }


    public function editcategorycheck($id, Request $request)
    {
        $message = [
            'title.required' => 'لطفا عنوان دسته بندی را وارد نمایید',
            'file.mimes' => 'فرمت فایل مشکل دارد',
        ];
        $val = $request->validate([
            'title' => 'required',
            'file' => 'mimes:jpg,jpeg,png',
        ], $message);


        $title = $request->title;

        if (!empty($request->file('file'))) {
            $food = DB::table('categorys')->where('id', '=', $id)->first();
            unlink('icons/' . $food->img);
            $filename = sha1(time());
            $file = $request->file('file');
            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $file->move('icons', $filename . "." . $extension);
            DB::table('categorys')->where('id', '=', $id)->update(
                [
                    'name' => $title,
                    'img' => $filename . "." . $extension,
                ]
            );
        } else {
            DB::table('categorys')->where('id', '=', $id)->update(
                [
                    'name' => $title,
                ]
            );
        }

        return redirect()->back()->with('message', 'دسته بندی با موفقیت ویرایش شد');
    }

    public function deletecategory($id)
    {
        $category = DB::table('categorys')->where('id', '=', $id)->first();
        unlink('icons/' . $category->img);
        DB::table('categorys')->where('id', '=', $id)->delete();
        return back();
    }
}
