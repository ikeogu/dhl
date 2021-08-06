@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">

        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
               <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Items</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('allItems')}}" class="btn btn-sm btn-info">See all</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">TrackID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Recipient Name</th>
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
                                                src="{{ asset('storage/Item/cover/'.$item->image) }}"
                                                height="50" width="50"
                                                style="box-shadow: 0 1px 8px rgb(0 0 0 / 30%);border: 1px solid skyblue;"></a>
                                        </td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->r_name }}</td>
                                        <td>
                                            {{-- <a href="{{route('dispatched',[$item->dispatcher($item->id)->id]) ?? ''}}">{{ $item->dispatcher($item->id)->firstname }}{{ $item->dispatcher($item->id)->lastname }}</a> </td> --}}
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
                                             <a class="btn btn-sm  btn-danger text-white"  data-toggle="modal"
                                                    data-target="#delete_status-{{$key}}">Delete</a>



                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                     @foreach ($items as  $key =>$item)
                        <div class="modal fade" id="exampleModal1-{{$key}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit Item</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('updateItem',[$item->id]) }}">
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Item's Name</label>
                                                        <input type="text" value="{{$item->item_name}}"
                                                            class="form-control form-control-alternative" name="item_name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Item weight in (lbs)</label>
                                                        <input type="text" class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1" value="{{$item->item_weight}}"
                                                            name="item_weight">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                            <label>Service Cost </label>
                                                        <input type="number" value="{{$item->item_cost}}"
                                                            class="form-control form-control-alternative" name="item_cost" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Owner's Name</label>
                                                        <input type="text" value="{{$item->owner_name}}"
                                                            class="form-control form-control-alternative" name="owner_name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Owner's Email</label>
                                                        <input type="email" class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1"
                                                            value="{{$item->owner_email}}" name="owner_email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                            <label>Owner's Phone</label>
                                                        <input type="tel" value="{{$item->owner_phone}}"
                                                            class="form-control form-control-alternative" name="owner_phone" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                    <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Owner's Address...</label>
                                                        <textarea  class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1" rows="4" cols="7"
                                                                name="owner_address" >{{$item->owner_address}}</textarea>
                                                    </div>
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label>Date of Collection</label>
                                                        <input type="date" placeholder="Date of creation " value="{{$item->doc}}"
                                                            class="form-control form-control-alternative" name="doc" type="date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Expected Date of Delivery</label>
                                                        <input class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1" value="{{$item->dod}}"
                                                                name="dod" placeholder="Date Of Delivery" type="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Recipient's Name</label>
                                                        <input type="text" value="{{$item->r_name}}"
                                                            class="form-control form-control-alternative" name="r_name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Recipient's Email</label>
                                                        <input class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1"
                                                                name="r_email" value="{{$item->r_email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Recipient's Phone</label>
                                                        <input type="tel" placeholder="Recipient Phone"
                                                            class="form-control form-control-alternative" name="r_phone" value="{{$item->r_phone}}" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Recipient's Address</label>
                                                        <textarea  class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1" rows="5" cols="7"
                                                                name="r_address" placeholder="">
                                                            {{$item->r_address}}
                                                            </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Current Location</label>
                                                        <input class="form-control form-control-alternative"
                                                            id="exampleFormControlInput1"
                                                                name="c_location" value="{{$item->c_location}}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Update Item Photo</label>
                                                        <input type="file"
                                                            class="form-control form-control-alternative" name="image" multiple>
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
                        <div class="modal fade"
                            id="edit_status-{{ $key }}"
                            aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change
                                            Status</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form
                                            action="{{ route('itemStatus', $item->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row">
                                                <label
                                                    class="col-form-label col-md-2">Choose</label>
                                                <div class="col-md-10">
                                                    <select class="form-control" name="status">

                                                        <option value="1">
                                                            On Queue
                                                        </option>
                                                        <option value="2">
                                                            On Transit
                                                        </option>
                                                        <option value="3">
                                                            Delivered
                                                        </option>
                                                        <option value="4">
                                                            Delivery Cancelled
                                                        </option>



                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                class="btn btn-primary btn-block">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Delete Modal --}}
                        <div class="modal fade"
                            id="delete_status-{{ $key }}"
                            aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm Delete Item</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <strong>Are you sure you want to delete {{$item->item_name}} ?</strong>
                                        <form
                                            action="{{ route('destroyItem', $item->id) }}"
                                            method="POST">
                                            @csrf
                                        <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit"
                                                class="btn btn-danger btn-block">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Admins</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('admins')}}" class="btn btn-sm btn-info">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">phone</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $item)
                                    <tr>
                                        <th scope="row">
                                            {{ $item->name }}
                                        </th>
                                        <td>
                                            {{ $item->email }}
                                        </td>
                                        <td>
                                            {{ $item->phone}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
