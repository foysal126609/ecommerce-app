<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Monolog\Handler\selectErrorStream;

class Category extends Model
{
    use HasFactory;
    private static $category,$image,$imageNewName,$directory,$imgUrl;

    public static function saveCategory($request){
        self::$category = new Category();
        self::$category->category_name = $request->category_name;
        self::$category->image = self::saveImage($request);
        self::$category->save();
    }

    private static function saveImage($request){
      self::$image = $request->file('image');
      self::$imageNewName=$request->category_name.'-'.rand().'.'.self::$image->Extension();
      self::$directory='admin-asset/upload-image/category/';
      self::$imgUrl=self::$directory.self::$imageNewName;
      self::$image->move(self::$directory,self::$imageNewName);
      return  self::$imgUrl;
    }

    public static function updateStatus($id){
        self::$category=Category::find($id);
        if (self::$category->status == 1){
            self::$category->status = 0;
        }else{
            self::$category->status = 1;
        }
        self::$category->save();
    }

    public static  function UpdateCategory($request,$id){
        self::$category =Category::findOrFail($id);
        self::$category->category_name = $request->category_name;
        if ($request->file('image')){

            if (self::$category->image){

                if (file_exists(self::$category->image)){

                    unlink(self::$category->image);
                    self::$category->image = self::saveImage($request);
                }
            }else{
                self::$category->image = self::saveImage($request);
            }
        }

        self::$category->status = $request->status;
        self::$category->save();
    }
    public static  function deleteCategory($id){

        self::$category = Category::find($id);
        if (self::$category->image){
            if (file_exists(self::$category->image)){
                unlink(self::$category->image);
            }
        }
        self::$category->delete();
    }
}
