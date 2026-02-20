@extends('layouts.frontend')
@section('title', 'Thanh toán')

@section('content')
<div class="checkout-page">
    <div class="sec-gap">
        <div class="container">
            @auth
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="row">
                    {{-- LEFT SIDE --}}
                    <div class="col-md-8">
                        {{-- Thông tin người đặt --}}
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="mb-3">Thông tin người đặt</h4>
                                <div class="mb-3">
                                    <label>Họ và tên *</label>
                                    <input type="text" name="name"
                                           value="{{ old('name', auth()->user()->name) }}"
                                           class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Email *</label>
                                        <input type="email" name="email"
                                               value="{{ old('email', auth()->user()->email) }}"
                                               class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Số điện thoại *</label>
                                        <input type="text" name="phone"
                                               value="{{ old('phone') }}"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Ngày giao hàng *</label>
                                        <input type="date" name="delivery_date"
                                               class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Khung giờ giao *</label>
                                        <select name="delivery_time" class="form-control" required>
                                            <option value="">Chọn khung giờ</option>
                                            <option>08:00 - 12:00</option>
                                            <option>12:00 - 18:00</option>
                                            <option>18:00 - 21:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Địa chỉ giao hàng --}}
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Địa chỉ giao hàng</h4>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label>Tỉnh/Thành phố *</label>
                                       <select id="province" name="province">
                                            <option value="">Chọn Tỉnh/Thành phố</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Quận/Huyện *</label>
                                        <select id="district" name="district">
                                        <option value="">Chọn Quận/Huyện</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Phường/Xã *</label>
                                        <select id="ward" name="ward">
                                        <option value="">Chọn Phường/Xã</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Tên đường và số nhà *</label>
                                    <input type="text" name="address_detail" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Ghi chú</label>
                                    <textarea name="note" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- RIGHT SIDE --}}
                    <div class="col-md-4">
                        {{-- Tổng thanh toán --}}
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="mb-3">Tổng thanh toán</h4>
                                {{-- Giả lập tổng tiền --}}
                                <div class="cart-items">
                                    @foreach($cart as $item)
                                   <div class="d-flex justify-content-between">
                                 <span>
                                 {{ $item['name'] }} x{{ $item['quantity'] }}
                                 </span>
                                <span>
                                 {{ number_format($item['price'] * $item['quantity']) }}đ
                                </span>
                                 </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Tạm tính</span>
                                    <strong> {{number_format($subtotal)}}</strong>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Giao hàng</span>
                                    <span class="text-success">{{$shipping=0?'Miễn phí':number_format($shipping) . 'đ'}}</span>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between">
                                    <strong>Tổng cộng</strong>
                                    <strong class="text-primary">{{number_format($total)}}</strong>
                                </div>
                            </div>
                        </div>
                        {{-- Phương thức thanh toán --}}
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="mb-3">Phương thức thanh toán</h4>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio"
                                           name="payment_method"
                                           value="cod" checked>
                                    <label class="form-check-label">
                                        Thanh toán khi nhận hàng (COD)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                           name="payment_method"
                                           value="momo">
                                    <label class="form-check-label">
                                        Thanh toán bằng Momo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                                class="btn btn-warning w-100 py-3 fw-bold">
                            THANH TOÁN NGAY
                        </button>
                    </div>
                </div>
            </form>
            @else
                <div class="alert alert-warning text-center">
                    <h4>Bạn chưa có tài khoản!</h4>
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Đăng nhập ngay
                    </a>
                </div>
            @endauth

        </div>
    </div>
</div>
@endsection