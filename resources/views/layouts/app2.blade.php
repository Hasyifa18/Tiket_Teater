<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  <!-- Custom CSS -->
  <style>
    body {
      background-color: #121212; /* Warna latar belakang tema gelap */
      color: #ffffff; /* Warna teks putih */
    }
    .navbar {
      background-color: #1a1a1a; /* Warna navbar */
    }
    .table-dark {
      color: #ffffff; /* Warna teks dalam tabel */
      background-color: #343a40; /* Warna latar belakang tabel gelap */
    }
    .table-dark th, .table-dark td {
      border-color: #454d55; /* Warna garis tepi dalam tabel */
    }
    .catalog-item {
      background-color: #333333; /* Warna background item di katalog */
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 20px;
    }
    .catalog-item img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }
    .catalog-item-details {
      padding: 15px;
    }
    .modal-content {
            background-color: #343a40;
            color: #fff;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('user2.index') }}">Ticket Teater</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user2.index') }}">HomePage</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('hasil') }}">Result Checkout</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-4">
    <div class="row">
        @yield('content')
      <!-- Contoh item dalam katalog -->
    </div>
  </div>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
