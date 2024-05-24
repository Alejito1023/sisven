<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Metodo de Pago</title>
  </head>
  <body>
    <div class="container">
    <h1>Editar Metodo de Pago</h1>
    <form method="POST" action="{{ route('pay_modes.update'[`pay_mode`=>$pay_mode->id])}}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="codigo" class="form-label">Id</label>
          <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id"
          disabled="disabled" value="{{ $pay_mode->id}}">
          <div id="codigoHelp" class="form-text">Codigo Metodo de Pago</div>
        </div>


        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" required class="form-control" id="name" aria-describedby="nameHelp"
            name="name" placeholder="name name.">
          </div>

        <div class="mb-3">
          <label for="observation" class="form-label">Observacion</label>
          <input type="text" required class="form-control" id="observation" aria-describedby="nameHelp"
          name="observation" placeholder="observation name.">
        </div>


        <label for="invoices">Facturas:</label>
            <select class="form-select"  id="invoices" name="code" required>
                <option selected disabled value="">Choose one...</option>
                @foreach ($invoices as $invoice)
                @if ($invoice->id == $pay_mode->id)
                <option  selected value="{{$invoice->id}}">{{$invoice->number}}</option>
 
                @else
                <option value="{{$invoice->id}}">{{$invoice->number}}</option>
                @endif
                @endforeach
            </select>
    

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('pay_modes.index') }}" class="btn btn-warning">Cancel</a>
            </div>
          </form>
    </div>
  </body>
</html>