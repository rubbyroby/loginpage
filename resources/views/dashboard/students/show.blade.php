@extends('dashboard.layout.layout')

@section('body')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Modal -->
<div class="container">


    
    <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="bg modal-content">
                <div class="modal-header">
                    <h1 class="h3 mb-0 text-gray-800">Add in New Group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Modules</label>
                            <select  class="form-select" id="module">
                                <option value="">Select One</option>   
                                @foreach ($modules as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>   
                                    
                                @endforeach 
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Groupe</label>
                            <select  class="form-select" id="groupe">
                                <option value="">Select One</option>   
                                
                            </select>
                        </div>
                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="submit_1">Add</button>
                </div>
            </div>
        </div>
    </div>
</div>


     <!-- Begin Page Content -->
    
     <div class="container-fluid">

        <!-- Page Heading -->
        
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Students Details</h1>
            <a type="button"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#adduser">Add in New Group</a>

        </div>

        <!-- DataTales Example -->
        <div class="row justify-content-center">
        <div class="card shadow mb-4 col-5 mr-5">
            
        <div class="card-body ">
                           
<div class="row justify-content-center">
    <div class="">
        <h1 class="h5 mb-3 text-gray-800">Personal Details</h1>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name </label>
                <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" value="{{$data->fname}}">
                <input type="hidden" class="form-control" id="id" aria-describedby="emailHelp" value="{{$data->id}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name </label>
                <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" value="{{$data->lname}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" class="form-control" id="tel" aria-describedby="emailHelp" value="{{$data->phone}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Parent Phone</label>
                <input type="text" class="form-control" id="ptel" aria-describedby="emailHelp" value="{{$data->parent_phone}}">
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$data->email}}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" aria-describedby="emailHelp" value="{{$data->address}}">
              </div>
           
            <button type="button" class="btn btn-primary" id="submit">Update</button>
          </form>
    </div>
</div>
            </div>
            
        </div>
        <div class=" bg-transparent  mb-4 col-6">
            
            <div class=" mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Groups</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Modules</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Amount to Pay</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Absent History</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Payment History</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <tr>
                                        <td>date</td>
                                        <td>amount</td>
                                        <td>print</td>
                                    </tr>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-history fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
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
                var id = $('#id').val();
                var email = $('#email').val();
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var tel = $('#tel').val();
                var ptel = $('#ptel').val();
                var address = $('#address').val();
                if ($('#email').val() != '' && $('#fname').val() != '' && $('#lname').val() != '' && $('#address').val() != '' && $('#tel').val() != '') {
                    $.ajax({
                        type: 'PUT',
                        url: '{{route("students.update")}}',
                        cache: false,
                        data: {
                            id:id,
                            email: email,
                            fname: fname,
                            lname: lname,
                            tel: tel,
                            address: address,
                            ptel: ptel,
                            _token : '{{ csrf_token() }}'


                        },
                        success: function(response) {
                            if (response.success == "true") {
                                toastr.success('Good Job.', 'Has been Updated Success!', {
                                    "showMethod": "slideDown",
                                    "hideMethod": "slideUp",
                                    timeOut: 2000
                                });

                                location.reload();
                            } else {
                                toastr.warning('Oppps.', 'Error!', {
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
    
<script>
    $('#module').change(function() {
        var x = $(this).val();
        $('#groupe').find('option').remove().end().append($("<option></option>").text('Select one'));

        $.ajax({
            type: 'POST',
            url: '{{route("students.listgroupe")}}',
            cache: false,
            data: {
            id: x,
            _token : '{{ csrf_token() }}'


                        },
            success: function(response) {

                $.each(response, function(key, value) {
                    $('#groupe')
                        .append($("<option></option>")
                            .attr("value", key)
                            .text(value));

                });
                console.log(response)

            }
        });
    });
</script>
@endsection