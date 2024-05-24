<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Clientes</title>
  </head>
  <body>
    <div class="container">
    <h1>Listado de Clientes</h1>
    <a href="{{ route('customers.create')}}" class="btn btn-success">Add</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Documento</th>
      <th scope="col">Primer Nombre</th>
      <th scope="col">Segundo Nombre</th>
      <th scope="col">Direccion</th>
      <th scope="col">Cumpleaños</th>
      <th scope="col">Telefono</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
    <tr>
         <th scope="row">{{ $customer->id}}</th>
         <td>{{ $customer->document_number}}</td>
         <td>{{ $customer->first_name}}</td>
         <td>{{ $customer->last_name}}</td>
         <td>{{ $customer->address}}</td>
         <td>{{ $customer->birthday}}</td>
         <td>{{ $customer->phone_number}}</td>
         <td>{{ $customer->email}}</td>
         <td>
          <a href=" {{ route("customers.edit" , ['customer'=>$customer->id]) }} " 
            class=" btn btn-info"> Edit </a></li>
          <form action="{{ route('customers.destroy', ['customer' => $customer->id])}}"
            method="POST" style="display: inline-block">
            @method('delete')
            @csrf
            <input class="btn btn-danger" type="submit" value="Delete">
          </form>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>