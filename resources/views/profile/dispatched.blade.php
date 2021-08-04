@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
    'title' => __('Hello') . ' '. $dispatcher->name,
    'description' => __('This are list of items assigned to you, and you have either dispatched them or not.'),
    'class' => 'col-lg-9'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('storage/Dispatcher/'.$dispatcher->image) }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> --}}
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    {{-- <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $dispatcher->name }}<span class="font-weight-light">, </span>
                            </h3>
                            {{-- <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Phone') }}
                            </div> --}}
                             <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Phone -') }} {{$dispatcher->phone}}
                            </div>
                            {{-- <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>  --}}
                            <hr class="my-4" />
                            {{-- <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0"> {{$items->count()}} {{  __('Dispatched  Items  by ') }} {{$dispatcher->name}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">TrackID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Recipient Name</th>
                                    <th scope="col">Current Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{ $item->TrackID }}</td>
                                        <td>
                                            <img class="rounded-circle" alt="Item Image"
                                                src="{{ asset('storage/Item/cover/'.$item->image) }}"
                                                height="50" width="50"
                                                style="box-shadow: 0 1px 8px rgb(0 0 0 / 30%);border: 1px solid skyblue;"></a>
                                        </td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->r_name }}</td>

                                         <td>{{ $item->c_location }}</td>
                                         @if ($item->status == 1)
                                            <td>  <a class="btn btn-sm btn-default text-white">on Queque</a></td>
                                         @elseif($item->status == 2)
                                            <td>  <a class="btn btn-sm btn-info text-white">On Transit</a></td>
                                         @elseif ($item->status== 3)
                                        <td>  <a class="btn btn-sm btn-success text-white">Delivered</a></td>
                                         @elseif ($item->status== 4)
                                          <td>  <a class="btn btn-sm btn-danger text-white">Not Delivered</a></td>
                                         @endif
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                             <a class="btn  btn-sm  btn-warning text-white"  data-toggle="modal"
                                                         data-target="#exampleModal1-{{$key}}">Edit</a>
                                            <a class="btn btn-sm  btn-info text-white"  href="{{route('displayItem',[$item->id])}}">View</a>
                                            <a class="btn btn-sm  btn-primary text-white"  data-toggle="modal"
                                                    data-target="#edit_status-{{$key}}">Update Status</a>


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

        @include('layouts.footers.auth')
    </div>
@endsection
