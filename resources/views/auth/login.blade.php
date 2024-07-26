<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('login.post') }}" method="POST">

        @csrf

        <div class="form-group row">

            <label for="username" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">

                <input type="text" id="username" class="form-control" name="username" required autofocus>

                @if ($errors->has('username'))

                <span class="text-danger">{{ $errors->first('username') }}</span>

                @endif

            </div>

        </div>



        <div class="form-group row">

            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">

                <input type="password" id="password" class="form-control" name="password" required>

                @if ($errors->has('password'))

                <span class="text-danger">{{ $errors->first('password') }}</span>

                @endif

            </div>

        </div>



        <div class="form-group row">

            <div class="col-md-6 offset-md-4">

                <div class="checkbox">

                    <label>

                        <input type="checkbox" name="remember"> Remember Me

                    </label>

                </div>

            </div>

        </div>



        <div class="col-md-6 offset-md-4">

            <button type="submit" class="btn btn-primary">

                Login

            </button>

        </div>

    </form>
</body>

</html>