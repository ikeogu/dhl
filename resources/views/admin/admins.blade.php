@extends('layouts.app', ['title' => __('All Admins')])

@section('content')

    <div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>

            @endif
        </div>
        <div class="row">

            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">Admins</h3>
                            </div>
                             <div class="col-6 text-left">
                                <a href="" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#exampleModal">Add new Amdin</a>

                            </div>
                             <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Staf</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('createAdmin') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Staff Name"
                                                            class="form-control form-control-alternative" name="name" />
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1" placeholder="name@example.com"
                                                            name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="tel" placeholder="Staff Phone"
                                                            class="form-control form-control-alternative" name="phone" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <select  class="form-control form-control-alternative" name="role" >
                                                           <option value="1">Super Admin</option>
                                                            <option value="2">Staff Admin</option>
                                                             <option value="3">Editor</option>
                                                       </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-success">Create</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>

                                    <th scope="col">Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $key => $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                        </td>
                                        <td>{{ $item->phone }}</td>
                                         @if ($item->role == 1)
                                              <td>Super Admin</td>
                                         @else
                                              <td>Staff Admin</td>
                                         @endif

                                        <td>
                                            @if ($item->status ==1)
                                                <a class="btn btn-sm btn-success text-white">Active</a>
                                            @else
                                                <a class="btn btn-sm btn-danger text-white">Suspended</a>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                             <a  type="button" class="btn btn-sm btn-warning"
                                                        href="{{route('sus',[$item->id])}}"  >Suspend</a>
                                                     <a class="btn btn-sm btn-primary "  type="button"
                                                        href="{{route('unsus',[$item->id])}}"  >Unsuspend</a>


                                                    <a type="button" class=" btn btn-sm btn-danger"
                                                        href="#"  data-toggle="modal"
                                                        data-target="#exampleModal3-{{ $key }}">Delete</a>
                                        </td>


                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@foreach ($admins as $keys=> $item)
      <!--Delete  Modal -->
    <div class="modal fade" id="exampleModal3-{{ $key }}" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Confirm</h5>
                    <p>Are you sure you want to delete?</p>


                        <a href="{{route('del',[$item->id])}}"
                            class="btn btn-primary">Ok</a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
