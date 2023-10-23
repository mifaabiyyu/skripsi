@extends('superadmin.layouts.master')
@section('tittle', 'Calendar')  

@section('styles')
    <!-- Start datatable css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/lib/main.css')}}">
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
@endsection

@section('content')
<div class="header header-dark bg-danger pb-6 content__title content__title--calendar">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6">
            <h6 class="fullcalendar-title h2 text-white d-inline-block mb-0">Full calendar</h6>
            <nav aria-label="breadcrumb" class="d-none d-lg-inline-block ml-lg-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calendar</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
            <a href="#" id="createevent"class="fullcalendar-btn-prev btn btn-sm btn-neutral">
              Create Event
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <!-- Fullcalendar -->
        <div class="card card-calendar">
          <!-- Card header -->
          <div class="card-header">
            <!-- Title -->
          
          </div>
          <!-- Card body -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="table-responsive">
                  <table id="table_calendar" class="tableku align-items-center table-flush">
                      <thead class="thead-light text-center">
                          <tr>
                            <th width="20%">Tittle</th>
                            <th width="10%">Date Start</th>
                            <th width="10%">Date End</th>
                            <th width="10%">Bg Colour</th>
                            <th width="10%">Text Colour</th>
                            <th width="50%">Description</th>
                            <th width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($eventhima as $evnhima)
                              <tr height="100px">
                                  <td class="table-user text-left">
                                      {{ $evnhima->tittle }}
                                  </td>
                                  <td class="text-center">
                                    {{ $evnhima->datestart }}
                                 </td>
                                  <td class="text-center">
                                    {{ $evnhima->dateend }}
                                 </td>
                                  <td class="text-center">
                                    {{ $evnhima->colour }}
                                 </td>
                                  <td class="text-center">
                                    {{ $evnhima->textcolour }}
                                 </td>
                                  <td class="text-left">
                                    {!! $evnhima->description !!}
                                 </td>
                                  <td class="table-actions text-center">
                                      <a href="{{ route('manage-calendar.edit', $evnhima->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Roles">
                                          <i class="fas fa-user-edit"></i>
                                      </a>
                                      <a href="#!" onclick="deleteRow( {{$evnhima->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Roles">
                                          <i class="fas fa-trash"></i>
                                          <form action="{{ route('manage-calendar.destroy', $evnhima->id)}}" id="data-{{ $evnhima->id }}" method="POST">
                                              @csrf
                                              @method('delete')
                                          </form>
                                      </a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card card-calendar">
                <div class="card-body">
                  <div id="calendar"></div>
                </div>
              </div>
            </div>
        </div>
        <!-- Modal - Add new event -->
        <!--* Modal header *-->
        <!--* Modal body *-->
        <!--* Modal footer *-->
        <!--* Modal init *-->
        <div class="modal fade" id="newevent" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
            <div class="modal-content">
              <!-- Modal body -->
              <div class="modal-body">
                <form id="dayClick" class="new-event--form" method="POST" action="{{ route('manage-calendar.store')}}">
                @csrf
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label form-control-label">Event title</label>
                    <div class="col-md-9">
                        <input type="text" id="tittle" name="tittle" class="form-control form-control-alternative new-event--title" placeholder="Event Title" value="{{ old('tittle') }}">
                    </div>
                  </div>
                  @error('tittle')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                    @enderror
                  <div class="form-group row">
                    <label for="example-date-input" class="col-md-3 col-form-label form-control-label">Date Start</label>
                    <div class="col-md-9">
                      <input class="form-control" type="datetime-local"  id="datestart" name="datestart" value="{{ old('datestart')}}">
                    </div>
                  </div>
                  @error('datestart')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                    @enderror
                  <div class="form-group row">
                    <label for="example-date-input" class="col-md-3 col-form-label form-control-label">Date End</label>
                    <div class="col-md-9">
                      <input class="form-control" type="datetime-local"  id="dateend" name="dateend" value="{{ old('dateend') }}">
                    </div>
                  </div>
                  @error('dateend')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                    @enderror
                    <div class="form-group mb-0">
                      <label class="form-control-label d-block mb-3">Text color</label>
                      <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                        <label class="btn active" style="background-color: #ffffff;"><input type="radio" name="textcolour" id="textcolour" value="#ffffff" autocomplete="off" checked></label>
                        <label class="btn" style="background-color: #000000;"><input type="radio" name="textcolour" id="textcolour" value="#000000" autocomplete="off"></label>
                      </div>
                    </div>
                  <div class="form-group mb-0">
                    <label class="form-control-label d-block mb-3">Background color</label>
                    <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                      <label class="btn active" style="background-color: #ffccdd;"><input type="radio" name="colour" id="colour" value="#ffccdd" autocomplete="off" checked></label>
                      <label class="btn" style="background-color: #99ffff;"><input type="radio" name="colour" id="colour" value="#99ffff" autocomplete="off"></label>
                      <label class="btn" style="background-color: #f33a3a;"><input type="radio" name="colour" id="colour" value="#f33a3a" autocomplete="off"></label>
                      <label class="btn" style="background-color: #70ff66;"><input type="radio" name="colour" id="colour" value="#70ff66" autocomplete="off"></label>
                      <label class="btn" style="background-color: #ffea66;"><input type="radio" name="colour" id="colour" value="#ffea66" autocomplete="off"></label>
                      <label class="btn" style="background-color: #ff8f66;"><input type="radio" name="colour" id="colour" value="#ff8f66" autocomplete="off"></label>
                      <label class="btn" style="background-color: #cd4c77;"><input type="radio" name="colour" id="colour" value="#cd4c77" autocomplete="off"></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label" for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="description" placeholder="Enter Deskripsi" name="description" value="{{ old('description') }}" rows="3"></textarea>
                  </div>
                  @error('description')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                    @enderror
                
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary new-event--add">Add event</button>
                <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <!-- Modal - Edit event -->
        <!--* Modal body *-->
        <!--* Modal footer *-->
        <!--* Modal init *-->
        <div class="modal fade" id="editevent" tabindex="-1" role="dialog" aria-labelledby="edit-event-label" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h1 type="type/html" class="modal-title" id="tittle" name="tittle"></h1>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                <form  class="edit-event--form">
                  <div class="row">
                    <label class="col-2"><h6>Mulai</h6></label>
                    <div class="col-4">
                      <h6 type="type/html"  id="datestart" name="datestart">
                    </div>
                    <label  class="col-2"><h6>Selesai</h6></label>
                    <div class="col-4">
                      <h6 type="type/html"  id="dateend" name="dateend">
                    </div>
                  </div>
                  <div class="form-group">
                    <h4 type="type/html" id="descriptiona" placeholder="Enter Deskripsi" name="descriptiona"></h4>
                  </div>
                
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
    $('#description').summernote();
  });
    

  $(document).ready(function(){
        $("#createevent").click(function(){
            $("#newevent").modal('show');
        });
    });

    $(document).ready(function(){
    $('#table_calendar').DataTable({
      "pagingType": "numbers",
      pageLength: 5,
       lengthMenu: [[5, 10, 15, -1], [5, 10, 15]]
    });
    });

  document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl,  {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        height: 750,
        themeSystem: 'bootstrap',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        
        events:[
          @foreach($event as $evn)
          {
            title:'{{$evn->tittle}}',
            
            start:'{{$evn->datestart}}',
            end:'{{$evn->dateend}}',
            backgroundColor:'{{$evn->colour}}',
            extendedProps: {
              description:'{!!$evn->description!!}',
            },
            
          },
          @endforeach
        ],

        eventClick: function (info) {
          console.log(info.event.extendedProps);
          var eventObj = info.event;
          start=moment(eventObj.start).format('hh:mm A, DD-MM-YYYY');
          end=moment(eventObj.end).format('hh:mm A, DD-MM-YYYY');
          
          $('#editevent #tittle').html(eventObj.title);
          $('#editevent #datestart').html(start);
          $('#editevent #dateend').html(end);
          $('#editevent #descriptiona').html(info.event.extendedProps.description);
          $('#editevent').modal('show');
          
         

        },
        
      });

      calendar.render();
    });

  
    function deleteRow(id)
            {
                    swal({   
                        title: "Apakah anda yakin ingin menghapus ?",   
                        text: "Event akan dihapus selamanya !",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Cancel !",   
                        closeOnConfirm: false,
                        closeOnCancel: false  
                    }) .then((res) => {
                        if (res.value) {
                            $('#data-'+id).submit();
                        }
                        else if( res.dismiss == 'cancel') {
                            console.log('cancel');
                            swal('Delete Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Delete Dibatalkan !','','warning');
                        }
                    }) 
    
                
            }

  
  </script>

@endsection

@section('script')
  <script src="{{ asset('assetss/lib/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  {{-- <script src="{{ asset('assetss/vendor/moment/min/moment.min.js') }}"></script> --}}
  <script src="{{ asset('assetss/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assetss/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

  @endsection