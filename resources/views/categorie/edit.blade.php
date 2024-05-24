<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Categorias</title>
  </head>
  <body>
    <div class="container">
    <h1>Editar Categorias</h1>
    <form method="POST" action="{{ route('categories.update')}}">
        @csrf
        <div class="mb-3">
          <label for="codigo" class="form-label">Id</label>
          <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
          disabled="disabled" value="{{ $categorie->cate_id}}">
          <div id="codigoHelp" class="form-text">Codigo Categoria</div>
        </div>


        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" required class="form-control" id="nombre" aria-describedby="nameHelp"
            name="nombre" placeholder="nombre name.">
          </div>

        <div class="mb-3">
          <label for="descripcion" class="form-label">Descripcion</label>
          <input type="text" required class="form-control" id="descripcion" aria-describedby="nameHelp"
          name="descripcion" placeholder="nombre name.">
        </div>


        <label for="products">Productos:</label>
            <select class="form-select"  id="products" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($products as $product)
                @if ($product->product_id == $categorie->cate_id)
                <option  selected value="{{$product->product_id}}">{{$product->nombre}}</option>
 
                @else
                <option value="{{$product->product_id}}">{{$product->nombre}}</option>
                @endif
                @endforeach
            </select>
    

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
    </div>
  </body>
</html>