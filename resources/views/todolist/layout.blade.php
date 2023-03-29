<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Laravel</title>
</head>
<body>
    <header>
        <ul class="nav justify-content-end">
          @isset ($task)
            @if (url()->current() == route('todolist.edit', $task->id))
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url()->previous() }}">Back</a>
            </li>
            @endif
          @endisset
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">Logout</a>
          </li>
        </ul>
    </header>
    <div class="container overflow-hidden">
        @yield('content')
    </div>
</body>
</html>