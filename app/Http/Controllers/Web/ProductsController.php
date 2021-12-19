<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImageProduct;
use App\Models\Product;
use DB;
use Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);
        // return view('admin.master.product.index',compact('research'));
        return view('admin.master.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try{
             $product = Product::create([
                 "title"=>$request->title,
                 "final_product"=>$request->final_product,
                 "summary"=>$request->summary,
                 "researcher"=>$request->researcher,
                // "product"=>$request->title,
                //  "price"=>$request->final_product,
                //  "stock"=>$request->summary,
                //  "description"=>$request->researcher,
             ]);
             if($request->hasFile('filess')){

                $arrayImages = [];
                 foreach($request -> filess as $value){
                     $path = $value->store('product');//contohnya pakai product
                    //  dd($path);

                     $columnsImage = [
                         'product_id'=>$product->id,
                         'image'=>$path,
                     ];
                     array_push($arrayImages,$columnsImage);
                 }
                 ImageProduct::insert($arrayImages);
             }

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            dd($e);
        }
        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['fileRelation'])->find($id);

        return view('admin.master.product.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.master.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $oldImages = ImageProduct::where('product_id',$id)->get();
        DB::beginTransaction();

        try{
             $product ->update([
                 "title"=>$request->title,
                 "final_product"=>$request->final_product,
                 "summary"=>$request->summary,
                 "researcher"=>$request->researcher,
                // "product"=>$request->title,
                //  "price"=>$request->final_product,
                //  "stock"=>$request->summary,
                //  "description"=>$request->researcher,
             ]);
             if($request->hasFile('filess')){

                if( count($oldImages)>0){
                    foreach($oldImages as $old){
                        Storage::delete($old->image);
                    }
                    ImageProduct::where('product_id',$id)->delete();
                }

                $arrayImages = [];
                 foreach($request -> filess as $value){
                     $path = $value->store('product');//contohnya pakai product
                    //  dd($path);

                     $columnsImage = [
                         'product_id'=>$product->id,
                         'image'=>$path,
                     ];
                     array_push($arrayImages,$columnsImage);
                 }
                 ImageProduct::insert($arrayImages);
             }

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollback();
            dd($e);
        }
        return redirect()->route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        $oldImages = ImageProduct::where('product_id',$id)->get();
        if( count($oldImages)>0){
            foreach($oldImages as $old){
                Storage::delete($old->image);
            }
            ImageProduct::where('product_id',$id)->delete();
        }
        $product->delete();
        return redirect()->route('product.index');
    }
}
