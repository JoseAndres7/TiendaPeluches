@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<style>

</style>
<div class="container my-4">
<div class="card-1 mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/img/'.$viewData['product']->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
        </h5>
        <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
        <p class="card-text">
        <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
          <div class="row">
            @csrf
            <div class="col-auto">
              <div class="input-group col-auto">
                <div class="input-group-text">Cantidad</div>
                <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
              </div>
            </div>
            <div class="col-auto">
              <button class="btn bg-primary" type="submit">Añadir Al Carrito</button>
            </div>
          </div>
        </form>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="card-1 mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <div class="col-md-8">
                <div class="card-body">
                    <form method="POST" action="{{ route('comentario.store') }}">
                     @csrf
                        <div>
                        <?php 
                            //comprobar que esta logueado haya comprado ese producto para poder comentar
                                $user = Auth::user();
                                if($user != null && $viewData["item"] != "[]" && $viewData["comentUser"] == "[]"){
                                  echo "<h5 class='card-title'>Dejanos tu comentario</h5>";
                                  echo "<textarea id='story' name='descripcion' rows='5' cols='50'></textarea>";
                                }
                            ?>
                        </div>
                        <div>

                        <?php 
                            if($user != null && $viewData["item"] != "[]" && $viewData["comentUser"] == "[]"){
                              echo "<h5 class='card-title'>Dejanos tu valoración</h5>";
                              echo "<span class='fa fa-star' name='star' style='cursor: pointer' id='1star' onClick='calificar(this)'></span>";
                              echo "<span class='fa fa-star' name='star' style='cursor: pointer' id='2star' onClick='calificar(this)'></span>";
                              echo "<span class='fa fa-star' name='star' style='cursor: pointer' id='3star' onClick='calificar(this)'></span>";
                              echo "<span class='fa fa-star' name='star' style='cursor: pointer' id='4star' onClick='calificar(this)'></span>";
                              echo "<span class='fa fa-star' name='star' style='cursor: pointer' id='5star' onClick='calificar(this)'></span>";
                            }
                          ?>
                            <input type="hidden" name="valoracion" id="valoracion" value="0">
                            <input type="hidden" name="product_id" value="{{ $viewData['product']->getId() }}">
                            <input type="hidden" name="user_id" value="{{ $viewData['user'] }}">

                        </div>
                        <div>
                        <?php
                            if($user != null && $viewData["item"] != "[]" && $viewData["comentUser"] == "[]"){
                              echo "<button class='btn btn-primary' type='submit'>Enviar</button>";
                            }else if ($user != null && $viewData["item"] != "[]" && $viewData["comentUser"] != "[]"){
                              echo '<h5 class="card-title">Ya has comentado</h5>';
                            }else if ($user != null && $viewData["item"] == "[]"){
                              echo '<h5 class="card-title">Realiza su compra para comentar</h5>';
                            }else{
                              echo '<h5 class="card-title">Inicia sesion para comentar</h5>';
                              echo '<a href="/login" class="btn bg-primary text-white">Iniciar Sesion</a>';
                            }
                        ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($viewData["comentarios"] as $comentario)
<div class="card-1 mb-3">
    <div class="row g-0">
        <div class="card-body">
            <div class="col-md-6">
                <div class="col-md-8">
                    <div class="comentario">
                      <div>
                        <?php
                            $valoracion = $comentario->getValoracion();
                            for($i = 0; $i < $valoracion; $i++){
                                echo '<span class="fa fa-star d-inline" style="color:orange"></span>';
                            }
                            for($i = 0; $i < 5 - $valoracion; $i++){
                                echo '<span class="fa fa-star d-inline"></span>';
                            }
                            ?>
                        <p class="d-inline">{{ $comentario->UserId->getName() }}</p>
                      </div>
                      <div>
                        <?php
                            $fecha = $comentario->getCreatedAt();
                            $fecha = date("d-m-Y", strtotime($fecha));
                            echo "<p class='d-inline'>$fecha</p>";
                        ?>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-8">
                    <div>
                        <p class="text-group">{{ $comentario->getDescripcion("Y-m-d") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>

<script>

    function calificar(item) {

        contador=item.id[0];
        let nombre = item.id.substring(1);
        for (let i = 0; i<5; i++) {
            if(i<contador){
            document.getElementById((i+1)+nombre).style.color="orange";
            document.getElementById(valoracion.value=contador);
            }else {
            document.getElementById((i+1)+nombre).style.color="white";
            document.getElementById(valoracion.value=contador);
            }
        }
    }
</script>
@endsection
