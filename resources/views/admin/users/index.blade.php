@extends('layouts.app')

@section('content')



                <div class="card">
                    <div class="card-header"> Registered Users  </div>

                    <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                        <td>
                                            <a href="{{route('admin.users.edit',$user->id)}}"><button class="btn btn-primary">Edit User Role</button></a>

                                            <form action="{{route('admin.users.destroy',$user->id)}}" method="POST" class = "float-left">@csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                    </div>
                </div>



@endsection
