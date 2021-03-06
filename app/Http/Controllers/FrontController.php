<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // importer l'alias de la classe Product
use App\Category; // importer l'alias de la classe Category

class FrontController extends Controller
{
    public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }

    public function index(){
        $products = Product::published()->paginate(6); // pagination 

        // On redirige l'utilisateur vers la vue front index avec les produits récupérés
        return view('front.index', ['products' => $products]);
    }

    public function showProductSoldes(){
        $products = Product::solde()->paginate(6); // pagination 

        // On redirige l'utilisateur vers la vue front index avec les produits récupérés
        return view('front.index', ['products' => $products]);
    }

    public function showProductByCategory(int $id){
        // on récupère le modèle category.id 
        $category = Category::find($id);
        $products = $category->products()->paginate(6);

        // On redirige l'utilisateur vers la vue front index avec les produits et les catégories récupérés
        return view('front.index', ['products' => $products, 'category' => $category]);
    }

    public function show(int $id){

        // On récupère le produit demandé
        $product = Product::find($id);
        
        // On redirige l'utilisateur vers la vue front show avec le produit récupérés
        return view('front.show', ['product' => $product]);
    }
    
}
