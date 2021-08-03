@extends('layouts.app')

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
        <div class="row mt-5">
            <div class="col-xl-10 mb-5 mb-xl-0">
               <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Items yet to be Dispatched</h3>
                            </div>
                            {{-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if (count($items)> 0)
                             <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">TrackID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col"> Name</th>

                                    <th scope="col">Dispatcher Name</th>
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
                                                src="{{ asset('storage/Item/Cover'.$item->image) }}"
                                                height="50" width="50"
                                                style="box-shadow: 0 1px 8px rgb(0 0 0 / 30%);border: 1px solid skyblue;"></a>
                                        </td>
                                        <td>{{ $item->item_name }}</td>

                                        <td>{{ $item->dispatcher($item->id)  }}</td>
                                         <td>{{ $item->c_location }}</td>
                                         @if ($item->status == 1)
                                            <td>  <a class="btn btn-sm btn-default text-white">on Queque</a></td>
                                         @elseif($item->status == 2)
                                            <td>  <a class="btn btn-sm btn-info text-white">On Transit</a></td>

                                         @elseif ($item->status== 4)
                                          <td>  <a class="btn btn-sm btn-danger text-white">Not Delivered</a></td>
                                         @endif
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                             <a class="btn  btn-sm  btn-warning text-white"  data-toggle="modal"
                                                         data-target="#edit_status-{{$key}}">Assign Dispatcher</a>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @else
                           <strong> No Data!</strong>
                        @endif

                    </div>
                </div>
            </div>

        </div>


    </div>
     @foreach ($items as  $key =>$item)

          <div class="modal fade"
            id="edit_status-{{ $key }}"
            aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign {{$item->name}} To</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            action="{{ route('assign') }}"
                            method="POST">
                            @csrf

                            <div class="form-group row">
                                <label>Choose Dispatcher</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="dis_id">
                                      @foreach ($dispatcher as $d)
                                        <option value="{{$d->id}}">{{$d->firstname}} {$d->lastname}} </option>
                                     @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="item_id" value="{{$item->id}}">

                            <button type="submit"
                                class="btn btn-primary btn-block">Assign</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     @endforeach
@endsection


