@extends('frontend.layouts.master')
@section('tittle','Hasil Deteksi Kesalahan Ketik')

@section('styles')
    <!-- Start datatable css -->

@endsection

@section('content')
<section id="subheader" class="dark no-top no-bottom" data-bgimage="url(/assets/images/abc.jpg)"
    data-stellar-background-ratio=".2">
    <div class="overlay-bg t80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Hasil Deteksi Kesalahan Ketik</h1>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <!-- section service begin -->
    <section class="side-bg no-top np-bottom" data-bgcolor="#f6f6f6">

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-md-12 lg-text-dark">
                    <div class="inner-padding text-center">
                        <h1>Hasil Deteksi Kesalahan Ketik</h1>
                        <div class="spacer-single"></div>
                        <div class="card">
                            <div class="text-center"><h3>Hasil Deteksi Kesalahan Ketik</h3></div>
                            <hr>
                            @foreach ($results as $data)
                            {{-- {{json_encode($data)}} --}}
                            <span style="{{$data['color']}};" class="{{$data['color']}}">{{$data['word']}}</span>
                            @endforeach
                            
                        
                        </div>
                        <div class="spacer-single"></div>
                        <div class="spacer-single"></div>
                        <div class="row">
                                <!-- Projects table -->
                                <table id="table-calon" class="table" >
                                    <thead >
                                        <tr class="text-center">
                                          <th style="text-align: center;" width="20%">No</th>
                                          <th style="text-align: center;" width="50%">Kata</th>
                                          <th style="text-align: center;" width="30%">Penghitungan Algoritma</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($results as $data)
                                          <tr height="50px">
                                            <td>{{$loop->iteration}}</td>
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
    </section>
    <!-- section close -->
</div>
<!-- content close -->
<script>
    $(document).ready(function() {
    $('#table-calon').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
} );

    var loadFile = function(event){
        var output = document.getElementById('image_preview_container');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
     
    
    </script>
@endsection

@section('script')

@endsection