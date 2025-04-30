<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>STN Smart System</title>
  {{-- <title>{{ config('app.name', 'STN Smart System') }}</title> --}}

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link rel="shortcut icon" href="{{ URL::To('assets/img/stn_long.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
  @stack('css')


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  {{-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

  <style>
    .btn-primary {
      background-color: #D61212;
      border-color: #D61212;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }

    ul.ui-autocomplete.ui-menu {

      font-weight: 300;
      font-size: 14px;
      line-height: 20px;
      border-radius: 12px;
      letter-spacing: 0.25px;
      z-index: 399999999;

      color: #000000;
    }

    ul.ui-autocomplete.ui-menu {
      /* margin-top: 16px; */
      padding-top: 20px;
      padding-bottom: 4px;
      background-color: #FFFFFF;
      border-radius: 12px;
      cursor: pointer;
    }

    ul.ui-autocomplete.ui-menu li {
      /* margin-top: 16px; */
      margin-left: 18px;
      margin-right: 18px;
      margin-bottom: 16px;
      cursor: pointer;
      caret-color: white;
    }

    .btn {
      border-radius: 8px;
    }

    .nav-link {
      font-size: 14px !important;
    }

    .sidebar-heading {
      font-size: 16px !important;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="/assets/dashboard.css" rel="stylesheet">
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
      <path
        d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
      <path
        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
      <path
        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
      <path
        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
    </symbol>
  </svg>

  {{-- <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
      aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#sun-fill"></use>
          </svg>
          Light
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
          aria-pressed="false">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#moon-stars-fill"></use>
          </svg>
          Dark
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
      <li>
        <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
          aria-pressed="true">
          <svg class="bi me-2 opacity-50" width="1em" height="1em">
            <use href="#circle-half"></use>
          </svg>
          Auto
          <svg class="bi ms-auto d-none" width="1em" height="1em">
            <use href="#check2"></use>
          </svg>
        </button>
      </li>
    </ul>
  </div> --}}


  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="calendar3" viewBox="0 0 16 16">
      <path
        d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
      <path
        d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
    </symbol>
    <symbol id="cart" viewBox="0 0 16 16">
      <path
        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
    <symbol id="chevron-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
    </symbol>
    <symbol id="door-closed" viewBox="0 0 16 16">
      <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
      <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
    </symbol>
    <symbol id="file-earmark" viewBox="0 0 16 16">
      <path
        d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
    </symbol>
    <symbol id="file-earmark-text" viewBox="0 0 16 16">
      <path
        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
      <path
        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
    </symbol>
    <symbol id="gear-wide-connected" viewBox="0 0 16 16">
      <path
        d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z" />
    </symbol>
    <symbol id="graph-up" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z" />
    </symbol>
    <symbol id="house-fill" viewBox="0 0 16 16">
      <path
        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
      <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
    </symbol>
    <symbol id="list" viewBox="0 0 16 16">
      <path fill-rule="evenodd"
        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
    </symbol>
    <symbol id="people" viewBox="0 0 16 16">
      <path
        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
    </symbol>
    <symbol id="plus-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
    </symbol>
    <symbol id="puzzle" viewBox="0 0 16 16">
      <path
        d="M3.112 3.645A1.5 1.5 0 0 1 4.605 2H7a.5.5 0 0 1 .5.5v.382c0 .696-.497 1.182-.872 1.469a.459.459 0 0 0-.115.118.113.113 0 0 0-.012.025L6.5 4.5v.003l.003.01c.004.01.014.028.036.053a.86.86 0 0 0 .27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.86.86 0 0 0 .271-.194.213.213 0 0 0 .039-.063v-.009a.112.112 0 0 0-.012-.025.459.459 0 0 0-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 0 1 9 2h2.395a1.5 1.5 0 0 1 1.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0 1 11.395 14H9a.5.5 0 0 1-.5-.5v-.382c0-.696.497-1.182.872-1.469a.459.459 0 0 0 .115-.118.113.113 0 0 0 .012-.025L9.5 11.5v-.003a.214.214 0 0 0-.039-.064.859.859 0 0 0-.27-.193C8.91 11.1 8.49 11 8 11c-.491 0-.912.1-1.19.24a.859.859 0 0 0-.271.194.214.214 0 0 0-.039.063v.003l.001.006a.113.113 0 0 0 .012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 0 1-.5.5H4.605a1.5 1.5 0 0 1-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238l-.244-2.855zM4.605 3a.5.5 0 0 0-.498.55l.001.007.29 3.4A.5.5 0 0 1 3.9 7.5h-.782c-.696 0-1.182-.497-1.469-.872a.459.459 0 0 0-.118-.115.112.112 0 0 0-.025-.012L1.5 6.5h-.003a.213.213 0 0 0-.064.039.86.86 0 0 0-.193.27C1.1 7.09 1 7.51 1 8c0 .491.1.912.24 1.19.07.14.14.225.194.271a.213.213 0 0 0 .063.039H1.5l.006-.001a.112.112 0 0 0 .025-.012.459.459 0 0 0 .118-.115c.287-.375.773-.872 1.469-.872H3.9a.5.5 0 0 1 .498.542l-.29 3.408a.5.5 0 0 0 .497.55h1.878c-.048-.166-.195-.352-.463-.557-.274-.21-.52-.528-.52-.943 0-.568.447-.947.862-1.154C6.807 10.123 7.387 10 8 10s1.193.123 1.638.346c.415.207.862.586.862 1.154 0 .415-.246.733-.52.943-.268.205-.415.39-.463.557h1.878a.5.5 0 0 0 .498-.55l-.001-.007-.29-3.4A.5.5 0 0 1 12.1 8.5h.782c.696 0 1.182.497 1.469.872.05.065.091.099.118.115.013.008.021.01.025.012a.02.02 0 0 0 .006.001h.003a.214.214 0 0 0 .064-.039.86.86 0 0 0 .193-.27c.14-.28.24-.7.24-1.191 0-.492-.1-.912-.24-1.19a.86.86 0 0 0-.194-.271.215.215 0 0 0-.063-.039H14.5l-.006.001a.113.113 0 0 0-.025.012.459.459 0 0 0-.118.115c-.287.375-.773.872-1.469.872H12.1a.5.5 0 0 1-.498-.543l.29-3.407a.5.5 0 0 0-.497-.55H9.517c.048.166.195.352.463.557.274.21.52.528.52.943 0 .568-.447.947-.862 1.154C9.193 5.877 8.613 6 8 6s-1.193-.123-1.638-.346C5.947 5.447 5.5 5.068 5.5 4.5c0-.415.246-.733.52-.943.268-.205.415-.39.463-.557H4.605z" />
    </symbol>
    <symbol id="search" viewBox="0 0 16 16">
      <path
        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
    </symbol>
  </svg>

  <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" style="margin-bottom: 0px" data-bs-theme="dark">
    <div class="row justify-content-between w-100 px-3">
      <audio id="scan" src="{{ URL::To('/assets/sound/scan.mp3') }}"></audio>
      <a class="col navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="{{ URL::To('/') }}">

        {{-- STN Smart System --}}
        <img src="{{ asset('assets/img/stn_long.png') }}" {{-- class="img-fluid" --}}
          style="object-fit: cover;position: absolute;height:250%;background-position: center center; top: -75%; background-repeat: no-repeat;"
          alt="stn smart system">
      </a>
      <div class="col"></div>
      <ul class="col-auto navbar-nav flex-row d-md-none">
        {{-- <li class="nav-item text-nowrap">
          <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch"
            aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
            <svg class="bi">
              <use xlink:href="#search" />
            </svg>
          </button>
        </li> --}}
        <li class="nav-item text-nowrap">
          <button class="px-3 text-white btn btn-dark" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <i style="font-size: 16px" class="bi bi-list"></i>
            {{-- <svg style="font-size: 16px" class="bi">
              <use xlink:href="#list" />
            </svg> --}}
          </button>
        </li>
      </ul>
    </div>

    {{-- <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div> --}}
  </header>
  <div>

    <div class="container-fluid">
      <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
          <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
            aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" style="font-size: 18px;" id="sidebarMenuLabel">Sewa TV Nusantara</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
              <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>STN Management</span>
                {{-- <a class="link-secondary" href="#" aria-label="Add a new report">
                          <svg class="bi">
                            <use xlink:href="#plus-circle" />
                          </svg>
                        </a> --}}
              </h6>
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a @if ($title=='dashboard' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b" class="nav-link d-flex align-items-center gap-2 
                " aria-current="page" href="{{ URL::To('/') }}">
                    {{-- <svg class="bi">
                    <use xlink:href="#house-fill" />
                  </svg> --}}
                    <div class="d-inline-block pe-2 pb-2">

                      @if ($title == 'dashboard')
                      <i class="bi bi-house-door-fill"></i>
                      @else
                      <i class="bi bi-house-door"></i>
                      @endif
                    </div>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a @if ($title=='event' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/list-event') }}">
                    {{-- <svg class="bi">
                    <use xlink:href="#file-earmark" />
                  </svg> --}}
                    <div class="d-inline-block pe-2 pb-2">
                      @if ($title == 'event')
                      <i class="bi bi-calendar2-event-fill"></i>
                      @else
                      <i class="bi bi-calendar2-event"></i>
                      @endif
                    </div>
                    Event
                  </a>
                </li>
                <li class="nav-item">
                  <a @if($title=='product' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/list-product') }}">
                    {{-- <svg class="bi">
                    <use xlink:href="#cart" />
                  </svg> --}}
                    <div class="d-inline-block pe-2 pb-2">
                      @if ($title == 'product')
                      <i class="bi bi-cart-fill"></i>
                      @else
                      <i class="bi bi-cart"></i>
                      @endif
                    </div>
                    Products
                  </a>
                </li>
                <li class="nav-item">
                  <a @if ($title=='user' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/list-user') }}">
                    {{-- <svg class="bi">
                    <use xlink:href="#people" />
                  </svg> --}}
                    <div class="d-inline-block pe-2 pb-2">
                      @if ($title == 'user')
                      <i class="bi bi-people-fill"></i>
                      @else
                      <i class="bi bi-people"></i>
                      @endif
                    </div>
                    User
                  </a>
                </li>
                <li class="nav-item">
                  <a @if ($title=='integration' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/integration-menu') }}">
                    {{-- <svg class="bi">
                    <use xlink:href="#puzzle" />
                  </svg>
                   --}}
                    <div class="d-inline-block pe-2 pb-2">
                      @if ($title == 'integration')
                      <i class="bi bi-puzzle-fill"></i>
                      @else
                      {{-- <i class="bi bi-people"></i> --}}
                      <i class="bi bi-puzzle"></i>
                      @endif
                    </div>
                    Integrations
                  </a>
                </li>
              </ul>

              <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Saved reports</span>
                {{-- <a class="link-secondary" href="#" aria-label="Add a new report">
                <svg class="bi">
                  <use xlink:href="#plus-circle" />
                </svg>
              </a> --}}
              </h6>
              <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                  <a @if ($title=='report' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/reports') }}">
                    <div class="d-inline-block pe-2 pb-2">
                      {{-- <svg class="bi">
                      <use xlink:href="#graph-up" />
                    </svg> --}}
                      @if ($title=='report')

                      <i class="bi bi-file-earmark-fill"></i>
                      @else
                      <i class="bi bi-file-earmark"></i>
                      @endif
                    </div>
                    Reports
                  </a>
                </li>
                <li class="nav-item">
                  <a @if ($title=='current' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/list-history') }}">
                    {{-- <svg class="bi">
                    <use xlink:href="#file-earmark-text" />
                  </svg> --}}
                    <div class="d-inline-block pe-2 pb-2">
                      @if ($title == 'history')
                      <i class="bi bi-clock-fill"></i>
                      @else
                      <i class="bi bi-clock-history"></i>
                      @endif
                    </div>
                    History
                    {{-- history --}}
                  </a>
                </li>
                {{-- <li class="nav-item">
                <a @if ()
                    style="color: #0b2b2b; font-weight: 600"
                @else
                    style="color: #000; font-weight: 400"
                @endif style="color: #0b2b2b" class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi">
                    <use xlink:href="#file-earmark-text" />
                  </svg>
                  Removed Product
                </a>
              </li> --}}
                {{-- <li class="nav-item">
                <a @if ()
                    style="color: #0b2b2b; font-weight: 600"
                @else
                    style="color: #000; font-weight: 400"
                @endif style="color: #0b2b2b" class="nav-link d-flex align-items-center gap-2" href="#">
                  <svg class="bi">
                    <use xlink:href="#file-earmark-text" />
                  </svg>
                  Year-end sale
                </a>
              </li> --}}
              </ul>
              {{-- 
            <hr class="my-3"> --}}
              <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>My Profile</span>
                {{-- <a class="link-secondary" href="#" aria-label="Add a new report">
                <svg class="bi">
                  <use xlink:href="#plus-circle" />
                </svg>
              </a> --}}
              </h6>
              <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                  <a @if ($title=='my item' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/my-item') }}">
                    {{-- <svg class="bi">
                    <use xlink:href="#file-earmark-text" />
                  </svg> --}}

                    <div class="d-inline-block pe-2 pb-2">
                      @if ($title == 'my item')
                      <i class="bi bi-archive-fill"></i>
                      @else
                      <i class="bi bi-archive"></i>
                      @endif
                    </div>
                    My Item
                  </a>
                </li>
                <li class="nav-item">
                  <a @if ($title=='profile' ) style="color: #0b2b2b; font-weight: 600" @else
                    style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                    class="nav-link d-flex align-items-center gap-2" href="{{ URL::To('/my-profile') }}">
                    <div class="d-inline-block pe-2 pb-2">
                      @if ($title == 'profile')
                      <i class="bi bi-gear-fill"></i>
                      @else
                      <i class="bi bi-gear"></i>
                      @endif
                    </div>
                    {{-- <svg class="bi">
                    <use xlink:href="#gear-wide-connected" />
                  </svg> --}}
                    Settings
                  </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="padding: 0px 4px">
                  <li class="nav-item">
                    <a @if ($title=='logout' ) style="color: #0b2b2b; font-weight: 600" @else
                      style="color: #000; font-weight: 400" @endif style="color: #0b2b2b"
                      class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                      {{-- <svg class="bi">
                      <use xlink:href="#door-closed" />
                    </svg> --}}
                      <div class="d-inline-block pe-2 pb-2">

                        <i class="bi bi-box-arrow-left"></i>
                      </div>
                      Sign out
                    </a>
                  </li>
                </form>
              </ul>
            </div>
          </div>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('content')
          <div class="toast align-items-center" role="alert" aria-live="assertive" id="toast" aria-atomic="true">
            <div class="d-flex">
              <div class="toast-body">
                Hello, world! This is a toast message.
              </div>
              <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
          </div>
          {{-- <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button"
              class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
              <svg class="bi">
                <use xlink:href="#calendar3" />
              </svg>
              This week
            </button>
          </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

        <h2>Section title</h2>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,004</td>
                <td>text</td>
                <td>random</td>
                <td>layout</td>
                <td>dashboard</td>
              </tr>
              <tr>
                <td>1,005</td>
                <td>dashboard</td>
                <td>irrelevant</td>
                <td>text</td>
                <td>placeholder</td>
              </tr>
              <tr>
                <td>1,006</td>
                <td>dashboard</td>
                <td>illustrative</td>
                <td>rich</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,007</td>
                <td>placeholder</td>
                <td>tabular</td>
                <td>information</td>
                <td>irrelevant</td>
              </tr>
              <tr>
                <td>1,008</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,009</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,010</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,011</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,012</td>
                <td>text</td>
                <td>placeholder</td>
                <td>layout</td>
                <td>dashboard</td>
              </tr>
              <tr>
                <td>1,013</td>
                <td>dashboard</td>
                <td>irrelevant</td>
                <td>text</td>
                <td>visual</td>
              </tr>
              <tr>
                <td>1,014</td>
                <td>dashboard</td>
                <td>illustrative</td>
                <td>rich</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,015</td>
                <td>random</td>
                <td>tabular</td>
                <td>information</td>
                <td>text</td>
              </tr>
            </tbody>
          </table>
        </div> --}}
        </main>
      </div>
    </div>


    <div style="position: fixed; bottom: 0;" class="w-100">
      @if ($errors->any())
      <div class="mb-0 alert alert-danger" id="validator-error">
        <div class="row">
          <div class="col">

            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          <div class="col-auto" style="cursor: pointer; font-size: 16px; font-weight: 600;" id="validator-error-close">
            X
          </div>
        </div>

      </div>
      @endif
      @if (session('error'))
      <div class="mb-0 alert alert-danger">
        {{ session('error') }}
      </div>
      @endif
      @if (\Session::has('success'))
      <div class="mb-0 alert alert-success">
        <ul>
          <li>{!! \Session::get('success') !!}</li>
        </ul>
      </div>
      @endif
    </div>
  </div>
  {{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> --}}

  {{-- <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
  @stack('script')
  <script>
    function play() {
          var audio = document.getElementById("scan");
          audio.play();
        }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
  </script>
  <script src="/assets/dashboard.js"></script>
  {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}

  <script>
    const toastLiveExample = document.getElementById('toast')
    const toastTrigger = document.getElementById('inputData')
    if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
    })
    }
  </script>
  <script>
    $(document).ready(function() {
      $('#validator-error-close').click( function() {
        $('#validator-error').addClass('d-none');
      });
      $('#filter_btn').click( function() {
        $('#filterForm').addClass('d-block');
        $('#filterForm').removeClass('d-none');
        $('#filter_btn').addClass('d-none');
        $('#filter_btn').removeClass('d-inline-block');
        $('#filter_btn_hide').addClass('d-inline-block');
        $('#filter_btn_hide').removeClass('d-none');
      });
      $('#filter_btn_hide').click( function() {
        $('#filterForm').removeClass('d-block');
        $('#filterForm').addClass('d-none');
        $('#filter_btn_hide').addClass('d-none');
        $('#filter_btn_hide').removeClass('d-inline-block');
        $('#filter_btn').removeClass('d-none');
        $('#filter_btn').addClass('d-inline-block');
      });
      $( ".no-access" ).click(function() {
        alert( "Anda tidak memiliki hak akses" );
      });
    });
  </script>
  {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  {{-- <script type="text/javascript">
    var timer;
    $('#user_search').keyup(function() {
      clearTimeout(timer);
        $("#user_search").autocomplete({
            source: '{!!URL::route("auto_complete_user")!!}',
                focus: function( event, ui ) {
                return false;
            },
            select: function( event, ui ) {
                window.location.href = ui.item.slug;
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                var url_a = '{{ route("detail_blog",  ":slug") }}';
  url_a = url_a.replace(':slug', item.slug);
  var inner_html = '<a href="' + url_a + '">
    <div class="row pe-0 pe-md-5 align-items-center">
      <div class="col-auto pe-0"><img style="border-radius: 8px; height: 56px; width:56px;" src="' + item.thumbnail + '"
          alt="Thumbnail image"></div>
      <div class="col">
        <idv class="s14-500" style="letter-spacing: 0.25px;color: #25282B;">' + item.title + '</idv>
        <div style="color: #52575C;letter-spacing: 0.15px;" class="s12-400">' + item.cuplikan + '</div>
      </div>
    </div>
  </a>';
  return $( "<li></li>" )
  .data( "item.autocomplete", item )
  .append(inner_html)
  .appendTo( ul );
  };
  });
  </script>
  <script type="text/javascript">
    var timer;
    $('#product_search').keyup(function() {
      clearTimeout(timer);
        $("#product_search").autocomplete({
            source: '{!!URL::route('auto_complete_user')!!}',
                focus: function( event, ui ) {
                return false;
            },
            select: function( event, ui ) {
                window.location.href = ui.item.slug;
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                var url_a = '{{ route("detail_blog",  ":slug") }}';
                url_a = url_a.replace(':slug', item.slug);
            var inner_html = '<a href="' + url_a + '" ><div class="row pe-0 pe-md-5 align-items-center"><div class="col-auto pe-0"><img style="border-radius: 8px; height: 56px; width:56px;" src="' + item.thumbnail + '" alt="Thumbnail image"></div><div class="col"><idv class="s14-500" style="letter-spacing: 0.25px;color: #25282B;">' + item.title + '</idv><div style="color: #52575C;letter-spacing: 0.15px;" class="s12-400">' + item.cuplikan + '</div></div></div></a>';
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append(inner_html)
                    .appendTo( ul );
        };
    });
  </script>
  <script type="text/javascript">
    var timer;
    $('#user_search').keyup(function() {
      clearTimeout(timer);
        $("#user_search").autocomplete({
            source: '{!!URL::route("auto_complete_user")!!}',
                focus: function( event, ui ) {
                return false;
            },
            select: function( event, ui ) {
                window.location.href = ui.item.slug;
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                var url_a = '{{ route("detail_blog",  ":slug") }}';
                url_a = url_a.replace(':slug', item.slug);
            var inner_html = '<a href="' + url_a + '" ><div class="row pe-0 pe-md-5 align-items-center"><div class="col-auto pe-0"><img style="border-radius: 8px; height: 56px; width:56px;" src="' + item.thumbnail + '" alt="Thumbnail image"></div><div class="col"><idv class="s14-500" style="letter-spacing: 0.25px;color: #25282B;">' + item.title + '</idv><div style="color: #52575C;letter-spacing: 0.15px;" class="s12-400">' + item.cuplikan + '</div></div></div></a>';
            return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append(inner_html)
                    .appendTo( ul );
        };
    });
  </script> --}}
  <script type="text/javascript">
    $('#category_search').select2({
      placeholder: 'Cari kategori',
      ajax: {
        url: '/auto-complete-category',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.name,
                id: item.name
              }
            })
          };
        },
        cache: true
      }
    });
  
  </script>
  <script type="text/javascript">
    $('#brand_search').select2({
      placeholder: 'Cari merek',
      ajax: {
        url: '/auto-complete-brand',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.name,
                id: item.name
              }
            })
          };
        },
        cache: true
      }
    });
  
  </script>
  <script type="text/javascript">
    $('#type_search').select2({
      placeholder: 'Cari tipe',
      ajax: {
        url: '/auto-complete-type',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.name,
                id: item.name
              }
            })
          };
        },
        cache: true
      }
    });
  
  </script>
  <script type="text/javascript">
    var $userSelect =  $('#user_search').select2({
      placeholder: 'Cari pengguna',
      ajax: {
        url: '/auto-complete-user',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.name+'('+item.email+')',
                id: item.id
              }
            })
          };
        },formatSelection: function(element){
        // return element.text + ' (' + element.id + ')';
        },
        // success:function(response){
        
        // }
        cache: true,
        templateResult: formatRepoUser,
      }
    });
  $userSelect.on("select2:select", function (e) { formatRepoUser("select2:select", e); });
  function formatRepoUser (selectName,data) {
  var parsedTestuser = data.params.data.text.split(',');

  // $('#remove-staf-from-search-'+data.params.data.id).click(function (e) {
  // e.preventDefault();
  // $("#input-staf-id-bertanggungjawab-"+data.params.data.id).remove();
  // $("#staff-data-show-new-"+data.params.data.id).remove('d-none');
  
  // });
  $('#body-table').append(`<input type="hidden" id="input-staf-id-`+data.params.data.id+`" name="staf_ids[]" value="`+data.params.data.id+`">`);
  $("#staf-data").append(
  `<div id="staff-data-show-`+data.params.data.id+`">`+
    parsedTestuser[0]+`  <button class="btn btn-secondary py-2" style="font-size:9px;" id="remove-staf-from-search-`+data.params.data.id+`">
                                                        Remove
                                                    </button></div>`
                  );
  $('#remove-staf-from-search-'+data.params.data.id).click(function (e) {
  e.preventDefault();
  // $( "input[name='sortby']").remove();
  $("#staff-data-show-"+data.params.data.id).addClass("d-none");
  $("#input-staf-id-"+data.params.data.id).remove();
  });
        }
  </script>
  <script type="text/javascript">
    // $("#search-product").select2({
    // placeholder: "My Select 2",
    // multiple: false,
    // minimumInputLength: 1,
    // ajax: {
    // url: "/auto-complete-product",
    // dataType: 'json',
    // quietMillis: 250,
    // data: function(term, page) {
    // return {
    // q: term,
    // };
    // },
    // results: function(data, page) {
    // return {results: data};
    // },
    // cache: true
    // },
    // formatResult: function(element){
    // return element.text + ' (' + element.id + ')';
    // },
    // formatSelection: function(element){
    // return element.text + ' (' + element.id + ')';
    // },
    // escapeMarkup: function(m) {
    // return m;
    // }
    // });
   var $eventSelect =  $('#search-product').select2(
      
    {
      placeholder: 'Cari Produk',
      minimumInputLength: 1,
      multiple:false,
      ajax: {
        url: '/auto-complete-product',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
            
              return {
                text: item.code +', '+item.product_name+', '+item.status,
                id: item.id,
              }

            })
          };
        },
        formatSelection: function(element){
        // return element.text + ' (' + element.id + ')';
        },
        // success:function(response){
        
        // }
        cache: true, 
        templateResult: formatRepo,
      }
    });
    $eventSelect.on("select2:select", function (e) { formatRepo("select2:select", e); });
    function formatRepo (selectName,data) {
      // alert(data.data);
      console.log(selectName);
      console.log(data);
      console.log(data.params);
      console.log(data.params.data);
      console.log(data.params.data.text);
      console.log(data.data);
      // var itemResult  ="["+data.params.data.text+"]";
      var parsedTest =  data.params.data.text.split(',');;

      
      // if (data.loading) {
      //   return data.text;
      // }
      // alert('Selecting: ' , e.params.args.data);
    // $('#body-table').append(`<tr id="table-`+data.id+`">
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.code+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.product_name+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.status+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.is_consume+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.available+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     <button class="btn btn-secondary" id="remove-`+data.id+`"">
    //                                         Delete
    //                                     </button>
    //                                 </th>
    //                             </tr>`);
    //                             $('#body-table').append(`<input type=" hidden" id="input-id-`+data.id+`" name="id[]" 
    //       value="`+data.id+`">`);
    //       $('#remove-'+data.id).click(function (e) {
    //       e.preventDefault();
    //       $( "input[name='sortby']").remove();
    //       $("#table-"+data.id).addClass("d-none");
    //       $("#input-id-"+data.id).remove();
    //       });
    $('#body-table').append(`<tr id="table-`+data.params.data.id+`">
      <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
        `+parsedTest[0]+`</th>
      <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
        `+parsedTest[1]+`</th>
      <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
        `+parsedTest[2]+`</th>
      <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
        <button class="btn btn-secondary" id="remove-`+data.params.data.id+`"">
                                            Delete
                                        </button>
                                    </th>
                                </tr>`);
                                $('#body-table').append(`<input type="hidden" id="input-id-`+data.params.data.id+`" name="id[]" 
          value="`+data.params.data.id+`">`);
          $('#remove-'+data.params.data.id).click(function (e) {
          e.preventDefault();
          $( "input[name='sortby']").remove();
          $("#table-"+data.params.data.id).addClass("d-none");
          $("#input-id-"+data.params.data.id).remove();
          });
          // return dosomething;
    // $('#myselect2').val(selected).trigger('change');
    // $(document.body).on("change","#search-product",function(){
    // alert(this.value);
    // });
    // $('#search-product').on("select2-selecting", function(e) {
    // console.log('Selecting');
    // $("#search-product").live('change', function(){
    // alert(this.value);
    // $('.select2').on('select2:selecting', function(e) {
    // alert('Selecting: ' , e.params.args.data);
    // });

    // $('#body-table').append(`<tr id="table-`+data.id+`">
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.code+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.product_name+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.status+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.is_consume+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     `+data.available+`</th>
    //   <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
    //     <button class="btn btn-secondary" id="remove-`+data.id+`"">
    //                                     Delete
    //                                 </button>
    //                             </th>
    //                         </tr>`);
    //                         $('#body-table').append(`<input type=" hidden" id="input-id-`+data.id+`" name="id[]"
    //       value="`+data.id+`">`);
    //       $('#remove-'+data.id).click(function (e) {
    //       e.preventDefault();
    //       $( "input[name='sortby']").remove();
    //       $("#table-"+data.id).addClass("d-none");
    //       $("#input-id-"+data.id).remove();
    //       });
          // });
    
    }
  </script>
  <script>
    function oneDot(input) {
      // Remove all non-numeric characters
      var value = String(input.value.replace(/[^0-9]/g, ''));
      
      // Format with thousand separators
      var result = '';
      var length = value.length;
      
      for (var i = 0; i < length; i++) {
        if (i > 0 && (length - i) % 3 === 0) {
          result += '.';
        }
        result += value[i];
      }
      // Update the input value
      input.value = result;
    }
  </script>
  {{-- <script type="text/javascript">
      var timer;
        $('#user_search').keyup(function() {
          clearTimeout(timer);
            $("#user_search").autocomplete({
                source: '{!!URL::route("auto_complete_user")!!}',
                    focus: function( event, ui ) {
                    return false;
                },
                select: function( event, ui ) {
                    window.location.href = ui.item.slug;
                }
            }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                    var url_a = '{{ route("detail_blog",  ":slug") }}';
  url_a = url_a.replace(':slug', item.slug);
  var inner_html = '<a href="' + url_a + '">
    <div class="row pe-0 pe-md-5 align-items-center">
      <div class="col-auto pe-0"><img style="border-radius: 8px; height: 56px; width:56px;" src="' + item.thumbnail + '"
          alt="Thumbnail image"></div>
      <div class="col">
        <idv class="s14-500" style="letter-spacing: 0.25px;color: #25282B;">' + item.title + '</idv>
        <div style="color: #52575C;letter-spacing: 0.15px;" class="s12-400">' + item.cuplikan + '</div>
      </div>
    </div>
  </a>';
  return $( "<li></li>" )
  .data( "item.autocomplete", item )
  .append(inner_html)
  .appendTo( ul );
  };
  });
  </script> --}}
  {{-- <script type="text/javascript">
    $('#product_search').select2({
      placeholder: 'Cari pengguna',
      ajax: {
        url: '/auto-complete-product',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.email,
                id: item.id
              }
            })
          };
        },
        cache: true
      }
    });
  
  </script> --}}
</body>

</html>