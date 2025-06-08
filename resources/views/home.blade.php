@extends('layouts.index')
@push('css')

<link rel="stylesheet" href="/resources/demos/style.css">

@endpush
{{--
all_product
category_product
brand_product
non_consumable_product
consumable_product
report
job --}}
@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div style="font-weight: 600; color: #000;"
          class="card-header d-flex justify-content-between align-items-center text-body-secondary">
          {{ __('Dashboard') }}

          <div>

            <div class=" btn btn-secondary" style="color: white !inportant;" id="filter_btn" aria-label="filterBtn">
              {{ __('Show Filter') }}
            </div>
            <div class=" btn btn-secondary  d-none" style="color: white !inportant;" id="filter_btn_hide"
              aria-label="filter_btn_hide">
              {{-- <i class="bi bi-plus-circle"></i> --}}
              {{ __('Hide Filter') }}
            </div>
          </div>
        </div>

        <div class="card-body">
          {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
        </div>
        @endif --}}

        {{-- {{ __('You are logged in!') }} --}}
        <form action="{{ route('home') }}" method="GET" id="filterForm" class="d-none">
          <div class="mb-5">
            <div class="row">
              <div class="col-md-6">

                <div class="mb-3">
                  <label for="start_date" class="text-capitalize form-label">Start date</label>
                  <input type="text" class="form-control" id="start_date" name="start_date"
                    aria-describedby="start_dateHelp">
                  {{-- <label for="date" class="form-label text-capitalize">payment Date</label>
                                        <input type="text" class="form-control @error('date') is-invalid @enderror" required name="date" id="date"> --}}
                  {{-- <div id="product_nameHelp" class="form-text">product_name</div> --}}
                </div>
              </div>
              <div class="col-md-6">

                <div class="mb-3">
                  <label for="end_date" class="text-capitalize form-label">end date</label>
                  <input type="text" class="form-control" id="end_date" name="end_date" aria-describedby="end_dateHelp">
                  {{-- <label for="date" class="form-label text-capitalize">payment Date</label>
                                        <input type="text" class="form-control @error('date') is-invalid @enderror" required name="date" id="date"> --}}
                  {{-- <div id="product_nameHelp" class="form-text">product_name</div> --}}
                </div>
              </div>

            </div>
            <br>
            <button type="submit" class="btn btn-primary col-12">Submit</button>

          </div>
        </form>
        @php
        $Good =0;
        $NotGood =0;
        $Broken =0;
        $Lost =0;
        foreach ($all_product as $value) {
        if ($value->status=='Good') {
        $Good=$Good+1;
        }
        if ($value->status=='Not Good') {
        $NotGood=$NotGood+1;
        }
        if ($value->status=='Broken') {
        $Broken=$Broken+1;
        }
        if ($value->status=='Lost') {
        $Lost=$Lost+1;
        }
        }
        @endphp
        <div class="row mt-4">

          <div class="col-md-3 p-3">
            {{-- Good
                        Not
                        Broken
                        Lost --}}
            <div
              style="background-color: #E3e3e3; text-align: center; border-radius: 8px; font-weight: 600; font-size: 16px"
              class="p-3">

              Good: {{ $Good }}
            </div>
            {{-- <canvas id="all_product"></canvas> --}}
          </div>
          <div class="col-md-3 p-3">
            {{-- Good
                        Not
                        Broken
                        Lost --}}
            <div
              style="background-color: #E3e3e3; text-align: center; border-radius: 8px; font-weight: 600; font-size: 16px"
              class="p-3">

              Not Good: {{ $NotGood }}
            </div>
            {{-- <canvas id="all_product"></canvas> --}}
          </div>
          <div class="col-md-3 p-3">
            {{-- Good
                        Not
                        Broken
                        Lost --}}
            <div
              style="background-color: #E3e3e3; text-align: center; border-radius: 8px; font-weight: 600; font-size: 16px"
              class="p-3">

              Broken: {{ $Broken }}
            </div>
            {{-- <canvas id="all_product"></canvas> --}}
          </div>
          <div class="col-md-3 p-3">
            {{-- Good
                        Not
                        Broken
                        Lost --}}
            <div
              style="background-color: #E3e3e3; text-align: center; border-radius: 8px; font-weight: 600; font-size: 16px"
              class="p-3">

              Lost: {{ $Lost }}
            </div>
            {{-- <canvas id="all_product"></canvas> --}}
          </div>
        </div>
        <div class="row mt-4">

          <div class="col-md-6 text-capitalize" style="text-align: center;">
            <div style="font-size: 16px; font-weight: 600; text-align: center;">
              category product
            </div>
            <canvas id="category_product"></canvas>
          </div>
          <div class="col-md-6 text-capitalize" style="text-align: center;">
            <div style="font-size: 16px; font-weight: 600; text-align: center;">
              brand product
            </div>
            <canvas id="brand_product"></canvas>
          </div>
        </div>
        <div class="row mt-4">

          <div class="col-md-6 text-capitalize" style="text-align: center;">
            <div style="font-size: 16px; font-weight: 600; text-align: center;">
              Item Usage (Day)
            </div>
            <canvas id="non_consumable_product"></canvas>
          </div>
          <div class="col-md-6 text-capitalize" style="text-align: center;">
            <div style="font-size: 16px; font-weight: 600; text-align: center;">
              consumable Usage (pcs)
            </div>
            <canvas id="consumable_product"></canvas>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6 text-capitalize" style="text-align: center;">
            <div style="font-size: 16px; font-weight: 600; text-align: center;">
              Kerugian
            </div>
            <canvas id="report"></canvas>
          </div>
          <div class="col-md-6 text-capitalize" style="text-align: center;">
            <div style="font-size: 16px; font-weight: 600; text-align: center;">
              User Perfomance
            </div>
            <canvas id="job"></canvas>
          </div>
        </div>
        {{-- disini --}}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@push('script')
<script>
  $( function() {
        $( "#start_date" ).datepicker();
      } );
</script>
<script>
  $( function() {
        $( "#end_date" ).datepicker();
      } );
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(document).ready(function() {

        var arr = [];
        var arrTot = [];
        var data = <?php echo json_encode($category_product)?>;
        for (var x in data) {
            arr.push(data[x].category);
            arrTot.push(data[x].total);
        }
        const ctx = document.getElementById('category_product');
        new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: arr,
            datasets: [{
              label: 'Kategori Produk',
              data: arrTot,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    });
</script>
<script>
  $(document).ready(function() {

        var arr = [];
        var arrTot = [];
        var data = <?php echo json_encode($brand_product)?>;
        for (var x in data) {
            arr.push(data[x].brand);
            arrTot.push(data[x].total);
        }
        const ctx = document.getElementById('brand_product');
        new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: arr,
            datasets: [{
              label: 'Brand Produk',
              data: arrTot,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    });
</script>
<script>
  $(document).ready(function() {

        var arr = [];
        var arrTot = [];
        var data = <?php echo json_encode($non_consumable_product)?>;
        for (var x in data) {
            arr.push(data[x].category);
            arrTot.push(data[x].total);
        }
        const ctx = document.getElementById('non_consumable_product');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: arr,
            datasets: [{
              label: 'Item Usage (Day)',
              data: arrTot,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    });
</script>
<script>
  $(document).ready(function() {

        var arr = [];
        var arrTot = [];
        var data = <?php echo json_encode($consumable_product)?>;
        for (var x in data) {
            arr.push(data[x].category);
            arrTot.push(data[x].total);
        }
        const ctx = document.getElementById('consumable_product');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: arr,
            datasets: [{
              label: 'Consumable Item Usage (Pcs)',
              data: arrTot,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    });
</script>
<script>
  $(document).ready(function() {

        var arr = [];
        var arrTot = [];
        var data = <?php echo json_encode($report)?>;
        for (var x in data) {
            arr.push(data[x].name);
            arrTot.push(data[x].total);
        }
        const ctx = document.getElementById('report');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: arr,
            datasets: [{
              label: 'Kerugian (Rp)',
              data: arrTot,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    });
</script>
<script>
  $(document).ready(function() {

        var arr = [];
        var arrTot = [];
        var data = <?php echo json_encode($users)?>;
        for (var x in data) {
            arr.push(data[x].name);
            arrTot.push(data[x].perfomance);
        }
        const ctx = document.getElementById('job');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: arr,
            datasets: [{
              label: 'Event',
              data: arrTot,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
    });
</script>
@endpush