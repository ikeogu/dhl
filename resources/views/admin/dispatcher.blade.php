@extends('layouts.app', ['title' => __('All Users')])

@section('content')

    <div class="header bg-gradient-success pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            {{-- <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span class="text-nowrap">Since yesterday</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                                <h3 class="mb-0">Dispatchers</h3>
                            </div>
                            <div class="col-6 text-left">
                                <a href="" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#exampleModal">Add New Dispatcher</a>

                            </div>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Dispatcher</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('storeDis') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="First Name"
                                                            class="form-control form-control-alternative" name="firstname" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Last Name"
                                                            class="form-control form-control-alternative" name="lastname" />
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1" placeholder="name@example.com"
                                                            name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="tel" placeholder="Phone Number"
                                                            class="form-control form-control-alternative" name="phone" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="file"
                                                            class="form-control form-control-alternative" name="image">
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-success">Create</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Model 2 --}}
                        <!-- Modal -->

                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                     <th scope="col">Picture</th>
                                    <th scope="col">First Name</th>
                                     <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                     <th scope="col">Status</th>

                                    <th scope="col">Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dispatchers as $key=> $item)
                                    <tr>
                                         <td>
                                             <img class="rounded-circle" alt="User Image"
                                                                    src="{{ asset('storage/Dispatcher/'.$item->image) }}"
                                                                    height="50" width="50"
                                                                    style="box-shadow: 0 1px 8px rgb(0 0 0 / 30%);border: 1px solid skyblue;"></a>
                                         </td>
                                        <td> <a href="{{route('dispatched',[$item->id])}}">{{ $item->firstname }} </a></td>
                                        <td> <a href="{{route('dispatched',[$item->id])}}">{{ $item->lastname }} </a></td>
                                        <td>
                                            <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                        </td>
                                        <td>{{ $item->phone }}</td>
                                        @if ($item->status == 1)
                                            <td>Active</td>

                                        @else
                                             <td>Deactived</td>
                                        @endif

                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"  data-toggle="modal"
                                                     data-target="#exampleModal1-{{$key}}">Edit</a>
                                                    <a class="dropdown-item"  href="{{route('profile.edit2',[$item->id])}}">view</a>
                                                    <a class="dropdown-item" data-target="#deleteModal3-{{ $key }}" data-toggle="modal">Delete</a>

                                                </div>
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
    </div>
     <!-- Modal -->
     @foreach ($dispatchers  as $key=> $item)
         <div class="modal fade" id="exampleModal1-{{$key}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Edit Staf</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('updateDis',[$item->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="{{$item->firstname}}"                                                                                        class="form-control form-control-alternative" name="firstname" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" value="{{$item->lastname}}"                                                                                        class="form-control form-control-alternative" name="lastname" />
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-alternative"
                                            id="exampleFormControlInput1"
                                            name="email"
                                            value="{{$item->email}}"
                                            >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" value="{{$item->phone}}"
                                            class="form-control form-control-alternative" name="phone" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" class="form-control form-control-alternative"
                                            id="exampleFormControlInput1"
                                            name="image">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal3-{{ $key }}" tabindex="-1"
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

                    <form action="{{route('destroyDis',[$item->id])}}" method="POST">
                        @csrf
                         <input type="hidden" name="_method" value="DELETE">

                        <button type="submit"
                            class="btn btn-danger btn-block"> Confirm </button>
                    </form>
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
