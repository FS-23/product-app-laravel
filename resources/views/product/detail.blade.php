@extends('layout.layout')

@section('content')
    <div class="col-6 shadow-sm p-3 mt-5 m-auto">
           <div class="row mx-0 mb-5">
              <div class="col-4">
                  <img src="{{ url($product -> image) }}" width="200" height="200"><br>
              </div>
              <div class="col-8">
                <h3>{{ $product -> name }}</h3>
                <p>{{ $product -> description }}</p>

                <div class="mt-3">
                    {{ $product -> price }} MAD
                </div>
              </div>
           </div>
           <div>
               <a href="/products/list" class="btn btn-secondary" >Liste</a>
               <a href="/products/delete/{{ $product->id }}" class="btn btn-danger" >Supprimer</a>
               <a href="/products/edit/{{ $product->id }}" class="btn btn-primary" >Editer</a>
           </div>
    </div>
@endsection