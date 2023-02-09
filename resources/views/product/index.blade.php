@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container my-4">
    <div class="row" id="row">
        @include('product.paginacion')
    </div>
</div>
<script>
//Creame un codigo que haga que cuando el usuario haga scroll, se muestren mas productos
    let pagina = 2;
    console.log(1);
    window.onscroll = () =>{
      console.log(2);
        if((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight){
            fetch(`/products/paginacion?page=${pagina}`,{
                method: 'get'
            })
            .then(response => response.text() )
            .then(html => {
                document.getElementById("row").innerHTML += html;
                pagina++;
            })
            .catch(error => console.log(error))
        }
    }
</script>
@endsection