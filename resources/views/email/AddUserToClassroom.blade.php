<x-user.email>
    <h1>{{ __('Chúc Mừng Bạn Đã Được Thêm Vào Lớp Học !!!') }}</h1>
    <p>{{ __('Kính Gửi,') }},</p>
    <p>{{ __('Chúc mừng bạn đã được thêm vào lớp học!') }}</p>
    <p>{{ __('Để bắt đầu học, vui lòng truy cập vào website của chúng tôi bằng cách nhấn vào nút dưới đây:') }}</p>
    <a href="{{ route('classroom') }}" class="btn" style="color: white">{{ __('Bắt Đầu Học') }}</a>
    <p>{{ __('Nếu bạn có bất kỳ câu hỏi nào, xin vui lòng liên hệ với chúng tôi.') }}</p>
    <p>{{ __('Trân trọng,') }}</p>
    <p>{{ __('Đội ngũ hỗ trợ của chúng tôi') }}</p>
</x-user.email>
