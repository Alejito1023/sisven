<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Productos</title>
  </head>
  <body>
    <div class="container">
    <h1>Agregar Productos</h1>
    <form method="POST" action="{{ route('products.store')}}">
        @csrf
        <div class="mb-3">
          <label for="codigo" class="form-label">Codigo</label>
          <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
          disabled="disabled">
          <div id="codigoHelp" class="form-text">Codigo Producto</div>
        </div>


        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" required class="form-control" id="nombre" aria-describedby="nameHelp"
            name="nombre" placeholder="nombre name.">
          </div>

        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="text" required class="form-control" id="price" aria-describedby="nameHelp"
          name="price" placeholder="price name.">
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="text" required class="form-control" id="stock" aria-describedby="nameHelp"
            name="stock" placeholder="stock name.">
          </div>


        <label for="categories">Categorias:</label>
            <select class="form-select"  id="categories" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($categories as $categorie)
                <option value="{{$categorie->cate_id}}">{{$categorie->nom_cate}}</option>
                @endforeach
            </select>
    

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('products.index') }}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
    </div>
  </body>
</html>