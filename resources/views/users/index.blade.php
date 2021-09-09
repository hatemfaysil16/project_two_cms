@extends('layouts.app')

@section('content')






<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">Users</div>

<div class="card-body">


                    @if ($users->count()>0)
                        
                    
        <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col"> No </th>
                    <th scope="col"> Title </th>
                    
                <th scope="col">Edit</th>
                    {{--      <th scope="col">Delete</th>  --}}
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                            <th scope="row">
                      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/User_icon_3.svg/800px-User_icon_3.svg.png" alt="" class="img-thumbnail" width="50px" height="100px">
                                
                            </th>
                            <th scope="row">{{$user->name}}</th>
                            
                            <td> 
                              
                            @if($user->admin)
                            <a class="" href="{{route('users.not.admin',['id'=>$user->id])}}">
                              admin
                            </a>
                            @else
                              
                              <a class="" href="{{route('users.admin',['id'=>$user->id])}}">
                                make admin
                              </a>
                            @endif

                            </td>
                            <td> 
                            <a class="" href="">
                                    <i class="far fa-trash-alt"></i>
                            </a>
                            </td> 
                          </tr>
                    @endforeach
                  
                    @else
                    <p scope="row" class="text-center">No  posts</p>  
                    @endif
                </tbody>
              </table>

              


      

</div>
</div>
</div>
</div>
</div>
@endsection
