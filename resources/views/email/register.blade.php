<x-user.email>
    <h1>{{ __('Chúc Mừng Bạn Đã Đăng Ký Thành Công !!!') }}</h1>
    <p>{{ __('Kính Gửi,') }} {{ $user->name }},</p>
    <p>{{ __('Cảm ơn bạn đã đăng ký với chúng tôi. Tài khoản của bạn đã được tạo thành công và hiện sẵn sàng để sử dụng.') }}</p>
    <p>{{ __('Chúng tôi rất vui mừng khi có bạn đồng hành và mong muốn mang đến cho bạn trải nghiệm tốt nhất.') }}</p>
    <p>{{ __('Vui lòng xác nhận email của bạn bằng cách ấn nút xác nhận bên dưới, để hoàn tất quá trình đăng ký và bắt đầu sử dụng tài khoản') }}</p>
    <a href="{{ route('email.verified') . "?email=" . $user->email . "&token=" . $token }}" class="btn" style="color: white;">{{ __('Xác Minh Email') }}</a>
</x-user.email>
