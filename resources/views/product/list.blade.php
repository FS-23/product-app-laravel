@extends('layout.layout')


    @section('content')

    <div class=" mx-5">
       
           <h1 >
            Liste des produits 
            <a href="/products/create" class="btn btn-outline-primary float-end">Nouveau</a>
           </h1>

           @if($products->count() > 0)
            <div class="row mx-0 mt-5">
                <div class="col-12  col-lg-2  bg-light mt-3">
                    <div class="p-2  ">
                         <h3>Filtrer</h3>
                         <div class="mt-3">
                            <div><input  type="checkbox"> Chaussures</div>
                            <div><input class="mt-2" type="checkbox"> Prets à porter</div>
                            <div><input class="mt-2" type="checkbox"> Electroniques</div>
                         </div>
                         <div class="mt-3">
                            <button class="btn btn-outline-info">Filter</button>
                         </div>
                    </div>
                </div>
                <div class="col-12  col-lg-10">
                    
                            <div class="row mx-0">
                                @foreach($products as $product)
                                    <div class="col-12 col-sm-6 col-lg-4 pt-3">
                                        <div class="shadow-sm">
                                            <div  class=" w-100 position-relative" style="height: 230px ; background:   #e0ebe9" >
                                                <button class="btn btn-warning like-btn d-none">
                                                    <span class="fas fa-heart  text-danger" ></span>
                                                </button>
                                                <img src="{{ url($product ->image) }}" 
                                                    alt=""
                                                    style="height: 100%; width: 100% ; object-fit: contain">
                                            </div>
                                            <div class="bg-light p-3 ">
                                                <h2>{{ $product -> name }}</h2>
                                                <p> {{ $product -> description }}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong>{{ $product->price }} MAD</strong>
                                                    <a href="/products/detail/{{ $product -> id }}" class="btn btn-outline-info">Acheter</a>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                @endforeach
                            </div>
                </div>
            </div>
           @else
             <h3 class="text-center mt-5">Aucun produit trouvé</h3>
           @endif
    </div>
@endsection
