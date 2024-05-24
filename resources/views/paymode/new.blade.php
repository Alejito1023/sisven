<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Metodos de Pago</title>
  </head>
  <body>
    <div class="container">
    <h1>Agregar Metodos de Pago</h1>
    <form method="POST" action="{{ route('pay_modes.store')}}">
        @csrf
        <div class="mb-3">
          <label for="codigo" class="form-label">Codigo</label>
          <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
          disabled="disabled">
          <div id="codigoHelp" class="form-text">Codigo Metodo Pago</div>
        </div>


        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" required class="form-control" id="name" aria-describedby="nameHelp"
            name="name" placeholder="name name.">
          </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descripcion</label>
          <input type="text" required class="form-control" id="description" aria-describedby="nameHelp"
          name="description" placeholder="nombre name.">
        </div>


        <label for="invoices">Facturas:</label>
            <select class="form-select"  id="invoices" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($invoices as $invoice)
                <option value="{{$invoice->id}}">{{$invoice->number}}</option>
                @endforeach
            </select>
    

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('pay_modes.index') }}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
    </div>
  </body>
</html>