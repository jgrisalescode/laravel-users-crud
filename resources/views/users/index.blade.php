<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Users</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 mx-auto">
        <h1 class="display-3 text-center">Users</h1>
        <div class="card border-0 shadow">
          <div class="card-body">
            <!-- Feedback to the user if something is wrong -->
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $error)
              - {{ $error }} <br>
              @endforeach
            </div>
            @endif
            <form action="{{ route('users.store') }}" method="POST">
              <div class="form-row">
                <div class="col-sm-3">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                </div>
                <div class="col-sm-4">
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div class="col-sm-3">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-sm-2">
                  @csrf
                  <input type="submit" value="Send" class="btn btn-success btn-block">
                </div>
              </div>
            </form>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Are you sure...?')">
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>