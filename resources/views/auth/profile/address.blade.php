@extends('layouts.my-info')
@section('title', 'My Address')

@section('my_info_content')
<div class="adress-tab">
<div class="profile-card address-card">
    <div class="address-wrapper">
        <!-- LEFT: ADDRESS FORM -->
        <div class="address-left">
            <h3 class="address-title">ADDRESS</h3>

            <form class="address-form" method="POST" action="{{ route('my-info.address.store') }}">
                @csrf
                <div class="form-group">      
                    <input type="text" name="main_location" placeholder="Main location" required>
                </div>
                <div class="form-group">
           
                    <input type="text" name="landmark" placeholder="Landmarks">
                </div>

                <div class="form-group">
                   
                    <input type="text" name="alternative" placeholder="Alternative address">
                </div>
                <div class="form-group"> 
                    <input type="text" name="pin_code" placeholder="Pin code">
                </div>
                <div class="form-group">
                     <label for=""> <h3>Country</h3></label>      
                   <select id="country" name="country" placeholder="Country">
                             <option value="">Select country</option>
                    </select>
                </div>
                   <div class="form-group"> 
                    <label for=""><h3>City / State</h3> </label>      
                   <select id="city_state" name="city_state">
                    <option value="">Select city / state</option>
                    </select>
                </div>
                 <div class="address-options">
                    <div class="address-radio">
                        <label><input type="radio" name="label" value="home" checked> HOME</label>
                        <label><input type="radio" name="label" value="work"> WORK</label>
                        <label><input type="radio" name="label" value="others"> OTHERS</label>
                    </div>
                    <label class="default-check">
                        <input type="checkbox" name="is_default" value="1">
                        SET DEFAULT ADDRESS
                    </label>

                </div>
                <button type="submit" class="btn-add-address">ADD ADDRESS</button>
            </form>
        </div>
        <!-- RIGHT: LIVE LOCATION -->
        {{-- <div class="address-right">

               
            <div class="live-location">
                <div class="live-location-header">LIVE LOCATION</div>

                <div class="live-location-map"> --}}
                    {{-- Bạn có thể thay iframe map thật sau --}}
                    {{-- <img src="{{ asset('assets/images/map-demo.png') }}" alt="Map" />
                </div>
            </div>
        </div> --}}

    </div>
    <!-- danh sách địa chỉ tồn tại  -->
    <div class="saved-address-list">
        @foreach($addresses as $address)
            <div class="saved-address-item">
                <div class="saved-address-top">
                    <b>{{ strtoupper($address->label) }}</b>
                    @if($address->is_default)
                        <span class="badge-default">Default</span>
                    @endif                
                </div>
                <div class="saved-address-body" >
                    Main location: {{ $address->main_location }}
                </div>
                <div class="alternative-adress">
                    Alternative address: {{ $address->alternative }}
                </div>
                <div class="country">
                    Country:{{$address->country}}
                </div>
                <div class="city-state">
                    City/State:{{$address->city_state}}
                </div>
                <form action="{{ route('my-info.address.delete', $address->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete-address btn btn-danger">DELETE</button>
                </form>
            </div>
        @endforeach
    </div>

</div>
</div>
@endsection
