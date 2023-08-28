@extends('dashboard.layout.layout')

@section('body')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Modal -->
<div class="container">


    
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="bg modal-content">
                <div class="modal-header">
                    <h1 class="h3 mb-0 text-gray-800">Add Professor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email </label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tel</label>
                            <input type="text" class="form-control" id="tel">

                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Salary/Hour</label>
                            <input type="number" class="form-control" id="salary">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Module</label>
                            

                            <div class="row">
                                        <div class="col-md-12 column">

                                            <table class="table" id="tab_logic">
                                                <thead>
                                                    <tr>
                                                        <th  class="text-center">Module</th>
                                                     
                                                        <th class="text-center"><a id="add_row" class="btn btn-primary float-right text-white" style="width: 100%" >Add Row</a></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <tr id='addrs0' data-id="0" class="hidden">
                                                        <td data-name="name" class="text-center" style="width: 70%">
                                                            <select  name="module[]" id="module" class="form-select module" >
                                                                <option value="">select one</option>
                                                                @foreach ($modules as $i)
                                                                <option value="{{ $i->id }}">{{ $i->name }} --- {{ $i->level->name }}</option>
                                                                    
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        
                                                    <td data-name="del" >
                                                        <button type="button" name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span>×</span></button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                        </div>
                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="submit">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>


     <!-- Begin Page Content -->
    
     <div class="container-fluid">

        <!-- Page Heading -->
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Professors</h1>
            <a type="button"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#adduser">Add Professor</a>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Professors</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Price/Hour</th>
                                <th>Progress</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center ">
                            @foreach ($data as $item)
                            <tr >
                                <td class="align-middle" >{{$item->fname}}</td>
                                <td class="align-middle" >{{$item->lname}}</td>
                                <td class="align-middle" >{{$item->phone}}</td>
                                <td class="align-middle" >{{$item->salary->salary_hour}}</td>
                                <td class="align-middle"  >
                                    <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                                <td class="text-center align-middle" >
                                    <button class="btn-circle btn-primary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                       
                                    </button>
                                    <div class="dropdown-menu animated--fade-in"
                                        aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('students.show',$item->id)}}">Details</a>
                                        <a class="dropdown-item" href="#">Pay</a>
                                        <a type="button" class="dropdown-item" onclick="delet('{{$item->id}}')" >Delete</a>
                                    </div>
                                </td>
                               
                            </tr>
                            @endforeach
                           
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<script>
    function delet(x){
         const check=confirm("are you sure?!");
         if(check==true){
             $.ajax({
                     type : 'DELETE',
                     url:"{{route('professors.delete')}}",
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
     </script>
     <script>
        $(document).ready(function() {
    $("#add_row").on("click", function() {
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
            var td;
            var cur_td = $(this);
            var children = cur_td.children();
            if ($(this).data("name") !== undefined) {
                td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
        });
        $(tr).appendTo($('#tab_logic'));
        $(tr).find("td button.row-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
    });
    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});
     </script>
    <script>
        $(function(e) {

            $('#submit').click(function(e) {
                var modules = [];
            $(".module").each(function(){
                modules.push($(this).val());
                });
                
            console.log(modules);
                var email = $('#email').val();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var tel = $('#tel').val();
                var salary = $('#salary').val();
                var address = $('#address').val();
                if ($('#email').val() != '' && $('#salary').val() != '' && $('#fname').val() != '' && $('#lname').val() != '' && $('#address').val() != '' && $('#tel').val() != '') {
                    $.ajax({
                        type: 'POST',
                        url: '{{route("professors.store")}}',
                        cache: false,
                        data: {
                            email: email,
                            fname: fname,
                            lname: lname,
                            tel: tel,
                            address: address,
                            salary:salary,
                            modules:modules,
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

            })


        })
    </script>
@endsection