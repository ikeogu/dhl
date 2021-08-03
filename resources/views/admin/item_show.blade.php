@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
    'title' => $item->TrackID,
    'description' => __('Below are the details of the item with tracting ID of ') .$item->TrackID,
    'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-9 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Item ')  }} {{$item->TrackID}}</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <form  action="#" autocomplete="off">


                            <h6 class="heading-small text-muted mb-4">{{ __('Details') }}</h6>


                              <div class="pl-lg-4 row">
                                 @if($item->image)
                                <div class="col-6">
                                    <img class="" alt="User Image"
                                        src="{{ asset('storage/Item/Cover' . $item->image) }}"
                                        height="70" width="70"
                                        ></a>
                                </div>
                                @endif


                            </div>
                            <div class="pl-lg-4 row pt-3">
                                <div class="col-6">
                                <strong>Tracking ID : {{$item->TrackID}}</strong>
                                </div>
                                <div class="col-6">
                                    @if ($item->status == 1)
                                            <td> Status: <a class="btn btn-sm btn-default text-white">on Queque</a></td>
                                         @elseif($item->staus == 2)
                                            <td> Status: <a class="btn btn-sm btn-info text-white">On Transit</a></td>
                                         @elseif ($item->status== 3)
                                        <td>  <a class="btn btn-sm btn-success text-white">Delivered</a></td>
                                         @elseif ($item->status== 4)
                                          <td>  Status: <a class="btn btn-sm btn-danger text-white">Not Delivered</a></td>
                                         @endif
                                </div>

                            </div>


                            <div class="pl-lg-4 pt-3">
                                <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Item Name') }}</label>
                                        <input type="text" name="name" id="input-name"
                                            class="form-control form-control-alternative{{ $errors->has('item_name') ? ' is-invalid' : '' }}"

                                            value="{{ old('name', $item->item_name) }}" readonly >

                                    </div>
                                    <div class=" col-6 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Item Weight') }}</label>
                                        <input type="text" name="email" id="input-email"
                                            class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('item_weight', $item->item_weight) }}" readonly>


                                    </div>
                                </div>
                                 <hr class="my-4" />
                                <div class="row">
                                    <div class="col-6 form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Owner\'s Name') }}</label>
                                        <input type="number" name="phone" id="input-email"
                                            class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('phone') }}"
                                            value="{{ old('item_cost', $item->item_cost) }}" readonly>


                                    </div>
                                    <div class="col-6 form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Owner\'s Address') }}</label>
                                        <address readonly class="form-control form-control-alternative">
                                                {{$item->owner_address}}
                                        </address>


                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-6 form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Owner\'s Email') }}</label>

                                          <p readonly class="form-control form-control-alternative">
                                                {{$item->owner_email}}
                                        </p>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Owner\'s Phone') }}</label>
                                        <p readonly class="form-control form-control-alternative">
                                                {{$item->owner_phone}}
                                        </p>


                                    </div>
                                </div>
                                 <hr class="my-4" />
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Recipient Name') }}</label>
                                        <p class="form-control form-control-alternative" readonly>{{$item->r_name}}</p>


                                    </div>
                                    <div class="col-6 form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Recipient Address') }}</label>
                                        <address readonly class="form-control form-control-alternative">
                                                {{$item->r_address}}
                                        </address>


                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-6 form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Recipient Email') }}</label>

                                          <p readonly class="form-control form-control-alternative">
                                                {{$item->r_email}}
                                        </p>
                                    </div>
                                    <div class="col-6 form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Recipient Phone') }}</label>
                                        <p readonly class="form-control form-control-alternative">
                                                {{$item->r_phone}}
                                        </p>


                                    </div>
                                </div>

                            </div>


                        </form>
                        <hr class="my-4" />
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="form-control-label" for="input-email">{{ __('Current Location') }}</label>
                                <p class="form-control form-control-alternative" readonly>{{$item->c_location}}</p>


                            </div>

                        </div>
                        <hr class="my-4" />
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="form-control-label" for="input-email">{{ __('Date of Collection') }}</label>
                                <p class="form-control form-control-alternative" readonly>{{$item->doc}}</p>


                            </div>
                             <div class="col-6 form-group">
                                <label class="form-control-label" for="input-email">{{ __('Date of Delivery') }}</label>
                                <p class="form-control form-control-alternative" readonly>{{$item->dod}}</p>


                            </div>

                        </div>
                        <hr class="my-4" />
                            <div class="row">
                                @foreach ($item->otherPhotos as $pic)
                                    @if (!empty($pic->image))
                                     <div class="col-4">
                                            <a href="{{ asset('storage/Item/OtherPhotos/' . $pic->image) }}"
                                        rel="prettyPhoto[{{ $property->title }}]" title="Other pictures."><img
                                            src="{{ asset('storage/Item/OtherPhotos/' . $pic->image) }}"
                                            style="width: 100%; height: 150px;"></a>

                                     </div>
                                    @endif
                                @endforeach

                            </div>

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
