@extends('layouts.my-info')
@section('title', 'My Profile')

@section('my_info_content')

<div class="tab-content active" data-content="profile">
  <!-- PROFILE CARD -->
  <div class="profile-card">
    <!-- AVATAR FORM -->
    <div class="photo-layout">
      <form method="POST"
            action="{{ route('my-info.avatar') }}"
            enctype="multipart/form-data"
            id="avatarForm">
        @csrf

        <label class="photo {{ auth()->user()->avatar ? 'has-image' : '' }}">
          <input type="file" id="avatarInput" name="avatar" accept="image/*" />

          <div class="upload-overlay">
            <img id="avatarPreview"
                 src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : '' }}"
                 alt="Avatar" />

            <svg viewBox="0 0 24 24" class="upload-icon">
              <path d="M12 16V4M12 4l-4 4M12 4l4 4M4 16v4h16v-4"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>

            <span>Upload your photo</span>
          </div>
        </label>

        <div class="actions">
          <button type="button" id="cancelAvatar" class="btn cancel">Cancel</button>
          <button type="submit" class="btn submit">Save</button>
        </div>
      </form>
    </div>

    <!-- INFO FORM -->
    <form class="form">
      <label for="name">Tên của bạn:</label>
      <input
        placeholder="Full Name"
        value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
        disabled
      />

      <label for="phone">Số điện thoại:</label>
      <input
        placeholder="Phone Number"
        value="{{ auth()->user()->phone }}"
        disabled
      />

      <label for="email">Email:</label>
      <input
        placeholder="Change Email"
        value="{{ auth()->user()->email }}"
        disabled
      />
    </form>

  </div>
</div>

@endsection
