<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar Clientes</title>
  </head>
  <body>
    <div class="container">
    <h1>Agregar Clientes</h1>
    <form method="POST" action="{{ route('customers.update'[`customer`=>$customer->id])}}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="codigo" class="form-label">Codigo</label>
          <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
          disabled="disabled">
          <div id="codigoHelp" class="form-text">Codigo Producto</div>
        </div>


        <div class="mb-3">
            <label for="document_number" class="form-label">Documento</label>
            <input type="text" required class="form-control" id="document_number" aria-describedby="nameHelp"
            name="document_number" placeholder="document_number name.">
          </div>

        <div class="mb-3">
          <label for="first_name" class="form-label">Primer Nombre</label>
          <input type="text" required class="form-control" id="first_name" aria-describedby="nameHelp"
          name="first_name" placeholder="first_name name.">
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Segundo Nombre</label>
            <input type="text" required class="form-control" id="last_name" aria-describedby="nameHelp"
            name="last_name" placeholder="last_name name.">
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Direccion</label>
            <input type="text" required class="form-control" id="address" aria-describedby="nameHelp"
            name="address" placeholder="address name.">
          </div>

          <div class="mb-3">
            <label for="birthday" class="form-label">Cumpleaños</label>
            <input type="text" required class="form-control" id="birthday" aria-describedby="nameHelp"
            name="birthday" placeholder="birthday name.">
          </div>

          <div class="mb-3">
            <label for="phone_number" class="form-label">Telefono</label>
            <input type="text" required class="form-control" id="phone_number" aria-describedby="nameHelp"
            name="phone_number" placeholder="phone_number name.">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="text" required class="form-control" id="email" aria-describedby="nameHelp"
            name="email" placeholder="email name.">
          </div>


        <label for="invoices">Facturas:</label>
            <select class="form-select"  id="invoices" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($invoices as $invoice)
                @if ($invoice->id == $customer->id)
                <option  selected value="{{$invoice->id}}">{{$invoice->number}}</option>
 
                @else
                <option value="{{$invoice->id}}">{{$invoice->number}}</option>
                @endif
                @endforeach
            </select>
    

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('customers.index') }}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
    </div>
  </body>
</html>