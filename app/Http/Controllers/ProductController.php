<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PDO;

class ProductController extends Controller
{
    public function home(){
        return view('home');
    }

    public function index(Request $request){

        if($request->is("admin/*")){
            return view('admin.product.index',[
                'products' => Product::latest()->paginate(10)
            ]);
        }

        $productCount = Product::count();
        return view('products.index',[
            'products' => Product::paginate(10),
            'categories' => Category::all(),
            'selectedCategory' => 0,
            'selectedOrder' => 'lth',
            'productCount' => $productCount
        ]);
    }

    public function sort(Request $request){
        if($request->is('admin/*')){
            $sortBy = $request->query('sortBy');
            $query = Product::query();
            switch($sortBy){
                case 'price_asc':
                    $query->orderBy('price','asc');
                    break;
                
                case 'price_desc':
                    $query->orderBy('price','asc');
                    break;

                case 'rating':
                    $query->orderBy('rating','desc');
                    break;

                case 'stock':
                    $query->orderBy('stock','desc');
                    break;
            }
            $products = $query->paginate(10);
            $products->appends($request->query());

            return view('admin.product.index',['products' => $products]);
        }


        $categoryBy = $request->query('categoryBy');
        $orderBy = $request->query('orderBy');
        $query = Product::query();
        $productCount = Product::count();
        if($categoryBy != 0){
        $productCount = Product::where('category_id',$categoryBy)->count();

            $query->where('category_id',$categoryBy);
        }
        switch($orderBy){
            case "lth":
                $query->orderBy('price','asc');
                break;
            case 'htl':
                $query->orderBy('price','desc');
                break;
            case 'atz':
                $query->orderBy('title','asc');
                break;
            case 'zta':
                $query->orderBy('title','desc');
                break;
            default:
                break;
        }

        $products = $query->paginate(10);
        $products->appends($request->query());
        return view('products.index',[
            'products' => $products,
            'categories' => Category::all(),
            'selectedCategory' => $categoryBy,
            'selectedOrder' => $orderBy,
            'productCount' => $productCount
        ]);
    }

    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::where('title','LIKE','%'.$search.'%')
                            ->orWhere('tags','LIKE','%'.$search.'%')
                            ->paginate(10);
        $products->appends($request->query());
        
        if($request->is('admin/*')){
            return view('admin.product.index',['products' => $products]);
        }
        
        $productCount = $products->total();
        return view('products.index',[
            'products' => $products,
            'categories' => Category::all(),
            'selectedCategory' => 0,
            'selectedOrder' => 'lth',
            'productCount' => $productCount
        ]);
    }

    public function detail($id){
        $product = Product::find($id);
        $tags = json_decode($product->tags);
        $similarProducts = Product::where('id','!=',$id)->where(
            function($query) use ($tags){
                foreach($tags as $tag){
                    $query->orWhereJsonContains('tags',$tag);
                }
            }
        )->get();

        return view("products.detail",[
            'product' => $product,
            'similarProducts' => $similarProducts,
        ]);
    }

    public function promotion(){
        return view('products.promotion',['products' => Product::where('discountPercentage',"!=",null)->paginate(10)]);
    }

    //Admin Side functions

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return back();
    }

    public function add(){

        return view('admin.product.add',['categories' => Category::all()]);
    }

    public function create(){
        $tags = request()->tags;
        $images = request()->images;
        $tagsArray = !empty($tags) ? array_map('trim',explode(',',$tags)) : [];
        $imagesArray = !empty($images) ? array_map('trim',explode(',',$images)) : [];
        $product = new Product;
        $product->title = request()->title;
        $product->category_id = request()->category;
        $product->description = request()->description;
        $product->price = request()->price;
        $product->discountPercentage = request()->discountPercentage;
        $product->stock = request()->stock;
        $product->brand = request()->brand;
        $product->sku = request()->sku;
        $product->thumbnail = request()->thumbnail;
        $product->tags = json_encode($tagsArray);
        $product->images = json_encode($imagesArray);
        $product->save();
        return redirect('admin/product');
    }

    public function edit($id){
        return view('admin.product.edit',['product' => Product::find($id),'categories' => Category::all()]);
    }

    public function update($id){
        $product = Product::find($id);
        $product->title = request()->title;
        $product->category_id = request()->category;
        $product->description = request()->description;
        $product->price = request()->price;
        $product->discountPercentage = request()->discountPercentage;
        $product->stock = request()->stock;
        $product->brand = request()->brand;
        $product->sku = request()->sku;
        $product->tags = request()->tags;
        $product->images = request()->images;
        $product->thumbnail = request()->thumbnail;

        $product->save();
        return redirect('admin/product');
    }
}
