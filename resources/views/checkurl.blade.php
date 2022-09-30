<!DOCTYPE html>
<html>
<head>
    <title>URL Shortner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>

<div class="container">

    <h4>Check Short URL</h4>
    <div class="card">
      <div class="card-header">
        <form method="POST" action="{{ route('shortlink.check') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-info" type="submit">Check</button>
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

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif


      </div>
    </div>

</div>

</body>
</html>
