<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Laracasts\Flash\Flash;

class CategoriesController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

        
    }
    public function create(){

    	return view('admin.categories.create');
    }



    public function destroy($id){
    	$categoria = Category::find($id);
    	$categoria->delete();

    	Flash::error('La categoria '. $categoria->name . ' a sido eliminida.');
    	return redirect()->route('categories.index');

    }

    public function store(CategoryRequest $request){
    	$category = new Category($request->all());
    	$category->save();

    	Flash::success('La categoria '. $category->name . ' ha sido creada exitosamente');

    	return redirect()->route('categories.index');
    }

    public function index(){
    	$categories = Category::orderBy('id', 'DESC')->paginate(3);
    	return view('admin.categories.index')->with('categorias', $categories);
    }

    public function edit($id){

        $categoria = Category::find($id);
        return view('admin.categories.edit')->with('categoria', $categoria);
    }

    public function update(Request $request, $id){
        $categoria = Category::find($id);

        
        //$user = fill($request->all());
        
        $categoria->name = $request->name;
 
        $categoria->save();

        Flash::warning('La categoria '. $categoria->name . ' a sido editada.');
        return redirect()->route('categories.index');   
    }

  

    public function show(){
    	
    }

}
