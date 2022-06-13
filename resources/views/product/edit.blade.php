@extends('layout.layout')
<style>
      #file-container:hover{
            background-color: rgb(189, 183, 183) !important;
            cursor: pointer;
        }
</style>
@section('content')
  <div class="col-6 p-3 shadow-sm m-auto " style="margin-top: 150px">
     <form action="/products/update/ {{ $product->id }}" method="post" enctype="multipart/form-data">
         @csrf
         <h3>Mettre a jour le produit {{ $product -> name }}</h3>
         <div class="mb-3 mt-5">
              <div id="file-container" class="d-flex bg-light justify-content-center align-items-center" style="height: 200px ; transition: background-color 1s">
                    <input  name="image-file" type="file" id="file-input" class="d-none" accept="image/*">

                    <img src="{{ url($product -> image) }}" id="image-preview" alt="" style="height: 98% ; width: 100% ; object-fit: contain">
              </div>
         </div>
        

         <div class="form-group mt-3">
            <label for="" class="form-label">Nom du produit</label>
            <input required type="text" class="form-control" value= "{{ $product->name }}" name="name"  placeholder="Nom du produit">
         </div>
         <div class="form-group mt-3">
            <label for="" class="form-label">Description</label>
            <textarea  required  rows="6" type="text"  class="form-control" name="description"  placeholder="description du produit">{{ $product->description }}</textarea>
         </div>
         <div class="form-group mt-3">
            <label for="" class="form-label">Prix</label>
            <input  required  type="number" class="form-control"  value= "{{ $product->price }}" name="price" placeholder="prix">
         </div>
         <div class="form-group mt-3">
            <label for="" class="form-label"  value= "{{ $product->categorie }}" >Categorie</label>
            <select  required  type="text" class="form-control" name="categorie">
                 <option value="">Veuillez choisir une option</option>
                 <option value="chaussure">Chaussure</option>
                 <option value="pret à porter">Pret à porter</option>
                 <option value="electronique">Electronique</option>
            </select>
         </div>
         <div class="mt-5">
            <button class="btn btn-outline-primary"> Enregistrer </button>
            <a href="/products/list" class="btn btn-outline-secondary">Annuler</a>
         </div>
     </form>
  </div>
  <script>
       window.onload = function(){
             let fileInput = document.querySelector('#file-input')
             let fileContainer = document.querySelector('#file-container')
             let imagePreview = document.querySelector('#image-preview')

             fileContainer.addEventListener('click' , function(){
               fileInput.click()
             })

             fileInput.addEventListener('change' , function(){
                   console.log('files:', fileInput.files[0]);
                   let reader = new FileReader();

                   reader.onload = function(){
                        console.log('result:', reader.result)
                        imagePreview.src = reader.result
                        imagePreview.style.display = ""

                        document.querySelector('#info-text').style.display = "none"
                   }


                   reader.readAsDataURL(fileInput.files[0]);
             })
       }
  </script>
@endsection