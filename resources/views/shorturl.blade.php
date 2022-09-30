<!DOCTYPE html>
<html>
<head>
    <title>URL Shortner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>

<div class="container">

    <h4>URL Shortner</h4>
    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('shortlink.store') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-info" type="submit">Shorten</button>
              </div>
            </div>
        </form>
      </div>

        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif

      <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif


      </div>
    </div>

</div>

</body>
</html>
