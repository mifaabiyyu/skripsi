@extends('frontend.layouts.master')
@section('tittle','Kalender Himatifa')

@section('styles')
<link rel="stylesheet" href="{{ asset('assetss/lib/main.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection


@section('content')
        <section id="subheader" class="dark no-top no-bottom" data-bgimage="url(assets/images/abc.jpg)"
            data-stellar-background-ratio=".2">
            <div class="overlay-bg t80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Kalender</h1>
                            <ul class="crumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="sep"></li>
                                <li>Kalender HIMATIFA</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-top no-bottom">
            <!-- section begin -->
            <section id="section-portfolio" aria-label="section-portfolio" >
                <div class="container">
                    <div class="gallery full-gallery de-gallery pf_full_width pf_2_cols sequence">
                        <div class="row">
                            <div class="col-12">
                                <div id="calendar"></div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- portfolio filter begin -->
                    
                </div>
            </section>
        </div>


        <div class="modal fade-scale" id="editevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 type="type/html" class="modal-title w-100" id="tittle" name="tittle"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">  
                        <div class="row">                          
                        <label class="col-md-2"><h5 type="type/html"><i class="fa fa-calendar" aria-hidden="true"></i>  Mulai</h5></label>
                        <div class="col-md-4">
                            <h5 type="type/html"  id="datestart" name="datestart">
                        </div>
                        <label  class="col-md-2"><h5 type="type/html"><i class="fa fa-calendar" aria-hidden="true"></i>  Selesai</h5></label>
                        <div class="col-md-4">
                            <h5 type="type/html"  id="dateend" name="dateend">
                        </div>    
                        </div>                                                    
                    </div>
                    <div class="form-group">
                        <h6 type="type/html" id="descriptiona" placeholder="Enter Deskripsi" name="descriptiona"></h6>
                    </div>
                </div>
                
              </div>
            </div>
          </div>


        


          <script>
        
          document.addEventListener('DOMContentLoaded', function () {
              var calendarEl = document.getElementById('calendar');
        
              var calendar = new FullCalendar.Calendar(calendarEl,  {
                headerToolbar: {
                  left: 'dayGridMonth listMonth',
                  center: 'title',
                  right: 'today prev,next'
                },
                buttonText:{
                  today:    'Today',
                  month:    'Month',
                  list:     'List'
                },
                buttonIcons:{
                  today:    'right-single-arrow',
                 
                },
                // bootstrapFontAwesome: true,
                aspectRatio: 1.5,
                // themeSystem: 'bootstrap',
                
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                dayMaxEvents: true, // allow "more" link when too many events
                
                
                events:[
                  @foreach($eventhimatifa as $evn)
                  {
                    title:'{{$evn->tittle}}',
                    textColor:'{{$evn->textcolour}}',
                    start:'{{$evn->datestart}}',
                    end:'{{$evn->dateend}}',
                    color:'{{$evn->colour}}',
                    extendedProps: {
                      description:'{!!$evn->description!!}',
                    },
                    
                  },
                  @endforeach
                ],
        
                eventClick: function (info) {
                  console.log(info.event.extendedProps);
                  var eventObj = info.event;
                  start=moment(eventObj.start).format('HH:mm , dddd DD MMM');
                  end=moment(eventObj.end).format('HH:mm , dddd DD MMM');
                  
                  $('#editevent #tittle').html(eventObj.title);
                  $('#editevent #datestart').html(start);
                  $('#editevent #dateend').html(end);
                  $('#editevent #descriptiona').html(info.event.extendedProps.description);
                  $('#editevent').modal('show');
                  
                 
        
                },
                
              });
        
              calendar.render();
            });
        
          
          </script>

          @include('frontend.layouts.footer')
@endsection

@section('script')
<script src="{{ asset('assetss/lib/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection