<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class ProfileController extends Controller
{
    //tab địa chỉ 
    public function address()
    {
        $addresses = Auth::user()->addresses;
        return view('auth.profile.address', compact('addresses'));
    }
    // xóa địa chỉ 
    public function deleteAddress(Address $address)
    {
        $address->delete();
        // khi xóahiển thị thông báobạn chắc chắn xóa
        return back()->with('success', 'Deleted successfully!');
    }
    public function storeAddress(Request $request)
    {
        $data = $request->validate([
            'label' => 'required',
            'main_location' => 'required',
            'landmark' => 'nullable',
            'alternative' => 'nullable',
            'pin_code' => 'nullable',
            'city_state' => 'nullable',
            'country' => 'nullable',
        ]);
        $data['user_id'] = Auth::id();
        if ($request->has('is_default')) {
            // tìm địa chỉ đã từng là địa chỉ chính và câp nhat lại địa chỉ mới
            Address::where('user_id', Auth::id())->update(['is_default' => false]);
            $data['is_default'] = true;
        }
        $address = Address::create($data);
        return redirect()
            ->route('my-info.address')
            ->with('success', 'Address created successfully');
    }
    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = auth()->user();
        // xóa avt 
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        } // LƯU AVATAR MỚI
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->update([
            'avatar' => $path,
        ]);
        return redirect()
            ->route('my-info')
            ->with('success', 'Avatar updated');
    }
}
