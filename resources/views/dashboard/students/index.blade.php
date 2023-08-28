@extends('dashboard.layout.layout')

@section('body')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Modal -->
<div class="container">


    
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="bg modal-content">
                <div class="modal-header">
                    <h1 class="h3 mb-0 text-gray-800">Add Student</h1>
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
                            <label for="exampleInputEmail1" class="form-label">Parent Tel</label>
                            <input type="text" class="form-control" id="ptel">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Level</label>
                            <select  class="form-select" id="level">
                                <option value="">Select One</option>   
                                @foreach ($levels as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>   
                                    
                                @endforeach 
                            </select>
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
            <h1 class="h3 mb-0 text-gray-800">Students</h1>
            <a type="button"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#adduser">Add Student</a>

        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Students</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Parent Phone</th>
                                <th>Payed</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->fname}}</td>
                                <td>{{$item->lname}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->parent_phone}}</td>
                                <td class="bg-gradient-danger text-gray-100"> none</td>
                                <td class="text-center" >
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
                     url:"{{route('students.delete')}}",
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
        $(function(e) {
            $('#submit').click(function(e) {
                var email = $('#email').val();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var tel = $('#tel').val();
                var ptel = $('#ptel').val();
                var level = $('#level').val();
                var address = $('#address').val();
                if ($('#email').val() != '' && $('#fname').val() != '' && $('#lname').val() != '' && $('#address').val() != '' && $('#tel').val() != '') {
                    $.ajax({
                        type: 'POST',
                        url: '{{route("students.store")}}',
                        cache: false,
                        data: {
                            email: email,
                            fname: fname,
                            lname: lname,
                            tel: tel,
                            address: address,
                            ptel: ptel,
                            level: level,
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