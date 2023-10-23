@extends('superadmin.layouts.master')
@section('tittle', 'Hasil Deteksi Kesalahan Ketik')  

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
<style>
    .progress { position:relative; width:200%; }
    .bar { background-color: #00ff00; width:0%; height:100px; }
    .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
    .font-black { color: black }
    .font-red { color: red }
</style>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Jaro-Winkler Distance</h6>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class="col-lg-8 card-wrapper">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                        <div>
                            <div class="text-center"><h3>Hasil Deteksi Kesalahan Ketik</h3></div>
                            <hr>
                            @foreach ($results as $data)
                            {{-- {{json_encode($data)}} --}}
                            <span class="{{$data['color']}}">{{$data['word']}}</span>
                            @endforeach
                            
                        
                        </div>
                    
                </div>
            </div>
                <div class="card">
                  <br>
                  <div class="text-center"><h3>Penghitungan Algoritma</h3></div>
                  <div class="table-responsive">
                    {{-- <textarea class="form-control" id="hasiltext" name="hasiltext" rows="7">{{ json_encode($jaroWinkler) }}</textarea> --}}
                      <table id="datatable-basic" class="table text-center align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th width="30%">Kata</th>
                            <th width="30%">Penghitungan Algoritma</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($results as $data)
                            <tr height="50px">
                              <td>{{$data['word']}}</td>
                              <td>{{$data['value']}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    var SITEURL = "{{ route('tipografi.index')}}";
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    alert('File Has Been Uploaded Successfully');
                    window.location.href = SITEURL";
                }
              });
        }); 
     });
    </script>
  @endsection
  @section('script')
  <script src="{{ asset('assetss/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

  @endsection