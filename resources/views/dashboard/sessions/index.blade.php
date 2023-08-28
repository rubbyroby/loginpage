@extends('dashboard.layout.layout')

@section('body')
    <!-- add Modal -->
    <div class="container">



        <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="bg modal-content">
                    <div class="modal-header">
                        <h1 class="h3 mb-0 text-gray-800">Add Session</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Group</label>
                                <select class="form-select" id="group">
                                    <option value="">Select One</option>
                                    @foreach ($groups as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>   
                                    
                                @endforeach 
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Day</label>
                                <select class="form-select" id="day">
                                    <option value="">Select One</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Start Time</label>
                                <input type="time" class="form-control" id="start" name="appt" min="08:00"
                                    max="20:00" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">End Time</label>
                                <input type="time" class="form-control" id="end" name="appt" min="08:00"
                                    max="20:00" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Professor</label>
                                <select class="form-select" id="professor">
                                    <option value="">Select One</option>
                                    @foreach ($professors as $item)
                                <option value="{{ $item->id }}">{{ $item->fname }} {{ $item->lname }}</option>   
                                    
                                @endforeach 
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Classroom</label>
                                <select class="form-select" id="classroom">
                                    <option value="">Select One</option>
                                    @foreach ($classrooms as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>   
                                    
                                @endforeach 
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                          onclick="addsession()"  >Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit Modal -->
    <div class="container">



        <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="bg modal-content">
                    <div class="modal-header">
                        <h1 class="h3 mb-0 text-gray-800">Edit Session</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Group</label>
                                <input type="hidden" id="editid">
                                <select class="form-select" id="editgroup">
                                    <option value="">Select One</option>
                                    @foreach ($groups as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>   
                                    
                                @endforeach 
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Day</label>
                                <select class="form-select" id="editday">
                                    <option value="">Select One</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Start Time</label>
                                <input type="time" class="form-control" id="editstart" name="appt" min="08:00"
                                    max="20:00" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">End Time</label>
                                <input type="time" class="form-control" id="editend" name="appt" min="08:00"
                                    max="20:00" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Professor</label>
                                <select class="form-select" id="editprofessor">
                                    <option value="">Select One</option>
                                    @foreach ($professors as $item)
                                <option value="{{ $item->id }}">{{ $item->fname }} {{ $item->lname }}</option>   
                                    
                                @endforeach 
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Classroom</label>
                                <select class="form-select" id="editclassroom">
                                    <option value="">Select One</option>
                                    @foreach ($classrooms as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>   
                                    
                                @endforeach 
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                         onclick="editsession()"   id="editsubmit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-5">
            <h1 class="h3 mb-0 text-gray-800">Sessions</h1>
            <a type="button" id="addsession" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                onclick="" data-bs-toggle="modal" data-bs-target="#adduser">Add Session</a>

        </div>
        <div class="card shadow mb-4 ">
            <div class="row justify-content-center">
                <div class="log-content ">
                    <div class="--noshadow evo-calendar calendar-initialized event-hide" id="demoEvoCalendar">
                        <div class="calendar-sidebar">
                            <div class="calendar-year"><button class="icon-button" role="button" data-year-val="prev"
                                    title="Previous year"><span class="chevron-arrow-left"></span></button>&nbsp;<p>2023
                                </p>
                                &nbsp;<button class="icon-button" role="button" data-year-val="next"
                                    title="Next year"><span class="chevron-arrow-right"></span></button></div>
                            <div class="month-list">
                                <ul class="calendar-months">
                                    {{-- <li class="month" role="button" data-month-val="0">January</li>
                                    <li class="month " role="button" data-month-val="1">February</li>
                                    <li class="month active-month" role="button" data-month-val="2">March</li>
                                    <li class="month" role="button" data-month-val="3">April</li>
                                    <li class="month" role="button" data-month-val="4">May</li>
                                    <li class="month" role="button" data-month-val="5">June</li>
                                    <li class="month" role="button" data-month-val="6">July</li> --}}

                                    @foreach ($days as $i)
                                        @if ($i['active'] == 1)
                                            <li class="month active-month" id="{{ $i['day'] }}" role="button"
                                                onclick="showdays('{{ $i['day'] }}')" data-month-val="2">
                                                {{ $i['day'] }}</li>
                                            <input type="hidden" value="{{ $i['day'] }}" id="currday">
                                        @else
                                            <li class="month" id="{{ $i['day'] }}" role="button"
                                                onclick="showdays('{{ $i['day'] }}')" data-month-val="4">
                                                {{ $i['day'] }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div><span onclick="Days()" id="sidebarToggler" title="Close sidebar"><button
                                    class="icon-button"><span class="bars"></span></button></span>
                        </div>
                        <div class="calendar-inner">
                            <table class="calendar-table">
                                <tbody>
                                    <tr>
                                        <th colspan="7">{{ $today }}</th>
                                    </tr>


                                    <tr class="calendar-body">

                                        <?php
                                            for($i=0;$i<7;$i++){
                                                if($hours[$i]['active']==1){
                                                ?>
                                        <td class="calendar-day" id="hour{{ $hours[$i]['hour'] }}">
                                            <div class="day" role="button"
                                                onclick="showdetails({{ $hours[$i]['hour'] }},1)"
                                                data-date-val="February 16, 2023">{{ $hours[$i]['hour'] }}h<span
                                                    class="event-indicator">
                                                    <div class="type-bullet">
                                                        <div class="type-bullet-birthday"></div>
                                                    </div>
                                                </span></div>
                                        </td>
                                        <?php
                                            }
                                            else{

                                                ?>
                                        <td class="calendar-day " id="hour{{ $hours[$i]['hour'] }}">
                                            <div class="day " role="button"
                                                onclick="showdetails({{ $hours[$i]['hour'] }},0)"
                                                data-date-val="February 05, 2023">{{ $hours[$i]['hour'] }}h</div>
                                        </td>
                                        <?php   
                                            }
                                        }
                                            ?>


                                    </tr>
                                    <tr class="calendar-body">
                                        <?php
                                        for($i=7;$i<13;$i++){
                                            if($hours[$i]['active']==1){
                                            ?>
                                        <td class="calendar-day" id="hour{{ $hours[$i]['hour'] }}">
                                            <div class="day" role="button"
                                                onclick="showdetails({{ $hours[$i]['hour'] }},1)"
                                                data-date-val="February 16, 2023">{{ $hours[$i]['hour'] }}h<span
                                                    class="event-indicator">
                                                    <div class="type-bullet">
                                                        <div class="type-bullet-birthday"></div>
                                                    </div>
                                                </span></div>
                                        </td>
                                        <?php
                                        }
                                        else{

                                            ?>
                                        <td class="calendar-day --weekend" id="hour{{ $hours[$i]['hour'] }}">
                                            <div class="day " role="button"
                                                onclick="showdetails({{ $hours[$i]['hour'] }},0)"
                                                data-date-val="February 05, 2023">{{ $hours[$i]['hour'] }}h</div>
                                        </td>
                                        <?php   
                                        }
                                    }
                                        ?>
                                        <td class="calendar-day">
                                            <div class="day " role="button" onclick="showdetails(21,0)"
                                                data-date-val="February 05, 2023">21h</div>
                                        </td>

                                    </tr>
                                    <tr class="calendar-body">
                                        <td class="calendar-day"></td>
                                    </tr>
                                    <tr class="calendar-body">
                                        <td class="calendar-day"></td>
                                    </tr>
                                    <tr class="calendar-body">
                                        <td class="calendar-day"></td>
                                    </tr>
                                    <tr class="calendar-body">
                                        <td class="calendar-day"></td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                        <div class="calendar-events" id="puthere">
                            <div class="event-header">
                                <p id="titleev">Sessions</p>
                            </div>

                            <div class="event-list">
                                {{-- <div class="event-empty">
                                    <p>No event for this Hour..</p>
                                </div> --}}
                                <div class="event-empty">
                                    <p>No selected hour..</p>
                                </div>



                            </div>
                        </div><span onclick="SessionEvent()" id="eventListToggler" title="Close event list"><button
                                class="icon-button"><span class="chevron-arrow-right"></span></button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    

   <script>
    function delet(x){
         const check=confirm("are you sure?!");
         if(check==true){
             $.ajax({
                     type : 'DELETE',
                     url:"{{route('sessions.delete')}}",
                     cache: false,
                     data:{
                         id:x,
                         _token : '{{ csrf_token() }}'
                     },
                     success:function(response){
                         if(response.success == true){
                             toastr.success('Good Job.', 'User Has been Addess Success!', { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
                         }
                         location.reload();
                 }}); 
         }
     }

        function addsession() {
                var group = $('#group').val();
                var day = $('#day').val();
                var start = $('#start').val();
                var end = $('#end').val();
                var professor = $('#professor').val();
                var classroom = $('#classroom').val();
                if ($('#group').val() != '' && $('#day').val() != '' && $('#start').val() != '' && $('#end').val() != '' && $('#professor').val() != '' && $('#classroom').val() != '') {
                    $.ajax({
                        type: 'POST',
                        url: '{{route("sessions.store")}}',
                        cache: false,
                        data: {
                            group: group,
                            day: day,
                            start: start,
                            end: end,
                            professor: professor,
                            classroom: classroom,
                            _token : '{{ csrf_token() }}'


                        },
                        success: function(response) {
                            if (response.success == "true") {
                                toastr.success('Good Job.', 'Usine Has been Addess Success!', {
                                    "showMethod": "slideDown",
                                    "hideMethod": "slideUp",
                                    timeOut: 2000
                                });

                                location.reload();
                            } else {
                                toastr.warning('Oppps.', 'Email Already exists!', {
                                    "showMethod": "slideDown",
                                    "hideMethod": "slideUp",
                                    timeOut: 2000
                                });
                            }
                        }
                    });
                } else {
                    toastr.warning('Oppps.', 'Please Complete Data!', {
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp",
                        timeOut: 2000
                    });
                }
                   
            }
            function editsession() {
                var group = $('#editgroup').val();
                var id = $('#editid').val();
                var day = $('#editday').val();
                var start = $('#editstart').val();
                var end = $('#editend').val();
                var professor = $('#editprofessor').val();
                var classroom = $('#editclassroom').val();
                if ($('#editgroup').val() != '' && $('#editday').val() != '' && $('#editstart').val() != '' && $('#editend').val() != '' && $('#editprofessor').val() != '' && $('#editclassroom').val() != '') {
                    $.ajax({
                        type: 'PUT',
                        url: '{{route("sessions.update")}}',
                        cache: false,
                        data: {
                            id:id,
                            group: group,
                            day: day,
                            start: start,
                            end: end,
                            professor: professor,
                            classroom: classroom,
                            _token : '{{ csrf_token() }}'


                        },
                        success: function(response) {
                            if (response.success == "true") {
                                toastr.success('Good Job.', 'Usine Has been Addess Success!', {
                                    "showMethod": "slideDown",
                                    "hideMethod": "slideUp",
                                    timeOut: 2000
                                });

                                location.reload();
                            } else {
                                toastr.warning('Oppps.', 'Email Already exists!', {
                                    "showMethod": "slideDown",
                                    "hideMethod": "slideUp",
                                    timeOut: 2000
                                });
                            }
                        }
                    });
                } else {
                    toastr.warning('Oppps.', 'Please Complete Data!', {
                        "showMethod": "slideDown",
                        "hideMethod": "slideUp",
                        timeOut: 2000
                    });
                }
                   
            }

        
   
        function Days() {
            const box = document.getElementById('demoEvoCalendar').classList;

            if (jQuery.inArray("sidebar-hide", box) !== -1) {
                box.remove("sidebar-hide");
            } else {
                box.add("sidebar-hide");

            }
        }

        function SessionEvent() {
            const box = document.getElementById('demoEvoCalendar').classList;

            if (jQuery.inArray("event-hide", box) !== -1) {
                box.remove("event-hide");
            } else {
                box.add("event-hide");

            }
        }

        function showdetails(x, y) {
            const box = document.getElementById('demoEvoCalendar').classList;

            if (jQuery.inArray("event-hide", box) !== -1) {
                box.remove("event-hide");
            }
            const currday = document.getElementById('currday').value;
            if (y == '1') {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('sessions.listevents') }}',
                    cache: false,
                    data: {
                        hour: x,
                        day: currday,
                        _token: '{{ csrf_token() }}'


                    },
                    success: function(response) {
                        document.getElementById('puthere').innerHTML =
                            '<div class="event-header"><p id="titleev"></p></div>';

                        console.log(response)
                        $.each(response, function(key, value) {
                            var id = key;
                            var start = value.start;
                            var end = value.end;
                            var group = value.group;
                            var modul = value.module;
                            var professor = value.professor;
                            var classroom = value.classroom;
                            var title = 'Sessions start at ' + x + 'h';
                            let syntax =
                                '<div class="event-container" role="button" ><div class="event-icon"><div class="event-bullet-birthday"></div></div><div class="event-info"><div class="row"><div class="col-10"><p class="event-title" style="font-size: 22px;font-weight: 600; margin-bottom: 0;">' +
                                start + 'h -> ' + end +
                                'h</p></div><div class="dropdown no-arrow col-2"><a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i></a><div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"aria-labelledby="dropdownMenuLink"><a type="button" class="dropdown-item" onclick="edition(' +
                                id +
                                ')">Edit</a><a type="button" class="dropdown-item" onclick="delet(' +
                                id +
                                ')">Delete</a></div></div></div><p class="event-desc">Group: ' + group +
                                ' </p><p class="event-desc">Module: ' + modul +
                                ' </p><p class="event-desc">Professor: ' + professor +
                                '</p><p class="event-desc">Classroom: ' + classroom +
                                '</p></div></div>';
                            document.getElementById('titleev').innerHTML = title;

                            document.getElementById('puthere').innerHTML += syntax;
                        });


                    }
                });
            } else {

                document.getElementById('puthere').innerHTML =
                    '<div  class="event-header"><p id="titleev">Sessions start at '+x+'h</p></div>';
                document.getElementById('puthere').innerHTML +=
                    '<div class="event-list"><div class="event-empty"><p>No session for this Hour..</p></div></div>';


            }

        }

        function showdays(x) {
            let currday = document.getElementById('currday').value;
            document.getElementById(currday).classList.remove('active-month');

            document.getElementById(x).classList.add('active-month');
            document.getElementById('currday').value = x;


            document.getElementById('puthere').innerHTML = '<div  class="event-header"><p id="titleev">Sessions</p></div>';
            document.getElementById('puthere').innerHTML +=
                '<div class="event-list"><div class="event-empty"><p>No selected hour..</p></div></div>';




            $.ajax({
                type: 'POST',
                url: '{{ route('sessions.listdays') }}',
                cache: false,
                data: {
                    day: x,
                    _token: '{{ csrf_token() }}'


                },
                success: function(response) {
                    console.log(response)
                    $.each(response, function(key, value) {

                        if (value.active == 1) {
                            var synt = '<div  class="day" role="button" onclick="showdetails(' + value
                                .hour + ',' + 1 + ')">' + value.hour +
                                'h<span class="event-indicator"><div class="type-bullet"><div class="type-bullet-birthday"></div></div></span></div>';
                            document.getElementById('hour' + value.hour).innerHTML = synt;

                        } else {
                            var synt = '<div  class="day" role="button" onclick="showdetails(' + value
                                .hour + ',' + 0 + ')">' + value.hour + 'h</div>';
                            document.getElementById('hour' + value.hour).innerHTML = synt;

                        }
                    })


                }
            });
        }


        function edition(x) {

            $.ajax({
                type: 'POST',
                url: '{{ route('sessions.editevents') }}',
                cache: false,
                data: {
                    id: x,
                    _token: '{{ csrf_token() }}'

                },
                success: function(response) {
                    $('#editstart').val(response.current.start_time);
                    $('#editend').val(response.current.end_time);
                    $('#editid').val(x);
                    
                    $('select[id="editday"] option[value=' + response.current.day + ']').attr("selected", true);

                    console.log(response);
                   

                    $('select[id="editgroup"] option[value=' + response.current.id_group + ']').attr("selected", true);
                   

                    $('select[id="editprofessor"] option[value=' + response.current.id_professor + ']').attr("selected", true);
                    
                    

                    $('select[id="editclassroom"] option[value=' + response.current.id_classroom + ']').attr("selected", true);
                    
                    
                    
                    
                    $('#edituser').modal('show');
                    }
                 
            });
        }
    </script>
@endsection
