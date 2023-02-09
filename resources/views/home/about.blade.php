@extends('layouts.app')
<!-- @section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"]) -->
@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container-nosotros {
  margin-top: 2rem;
  padding: 0 16px;
  box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.2);
}

.container-nosotros::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.nosotros {
  width: 100%;
  height: 500px;
  object-fit: cover;
}

.about-section {
  background-color: #ffde00;
  color: black !important;
}

.h2 {
  margin : 2rem;
}

.h2-2{
  margin-top: 2rem;
}

.container-nosotros div
{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.container-nosotros div div {
  display: flex;
  flex-direction: column;
}

</style>
</head>
<body>
<div class="container my-4">
<div class="about-section">
  <h1>¿Quiénes somos?</h1>
  <p>Nuestro equipo esta compuesto por profesionales que se adaptan a las necesidades de cada proyecto.</p>
  <p>El núcleo somos nosotros:</p>
</div>

<h2 class="h2" style="text-align:center">El equipo</h2>
<div class="row">

  <div class="column">
    <div class="card-1">
      <img class="nosotros" src="/img/joseti.jpg" alt="Joseti" style="width:100%">
      <div class="container-nosotros">
        <div>
          <div>
            <h2 class="h2-2">José Andrés</h2>
            <p class="title">Co-Fundador y Diseñador Backend</p>
          </div>
          <div>
            <img src="{{ asset('/img/logo.png') }}" width="150px">
          </div>
        </div>
        <p>joseapm@pokemonstore.com</p>
        <p><button class="button">Contacto</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card-1">
      <img class="nosotros" src="/img/yo.png" alt="Pepema" style="width:100%">
      <div class="container-nosotros">
        <div>
          <div>
            <h2 class="h2-2">José Manuel</h2>
            <p class="title">Co-Fundador y Diseñador Frontend</p>
          </div>
          <div>
            <img src="{{ asset('/img/logo.png') }}" width="150px">
          </div>
        </div>
        <p>josempll@pokemonstore.com</p>
        <p><button class="button">Contacto</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card-1">
      <img class="nosotros" src="/img/chemichut.jpg" alt="Chemichutafit" style="width:100%">
      <div class="container-nosotros">
        <div>
          <div>
            <h2 class="h2-2">José María</h2>
            <p class="title">Director de Arte y Social Media Manager</p>
          </div>
          <div>
            <img src="{{ asset('/img/logo.png') }}" width="150px">
          </div>
        </div>
        <p>josemgp@pokemonstore.com</p>
        <p><button class="button">Contacto</button></p>
      </div>
    </div>
  </div>
  
</div>
</div>
</body>
</html>
@endsection
