<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function store(Request $request, $id)
    {
        // Kiểm tra dữ liệu gửi từ biểu mẫu
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        // Tạo thông báo mới
        $notification = new Notification();
        $notification->title = 'Thông báo mới';
        $notification->content = $validatedData['content'];
        $notification->user_id = auth()->user()->uuid;
        $notification->classroom_id = $id;
        $notification->type = 1;

        // Lưu thông báo vào cơ sở dữ liệu
        $notification->save();

        // Chuyển hướng người dùng về trang chi tiết lớp học
        return redirect()->route('classroom.detail', ['classroom' => $id])->with('success', 'Tạo thông báo thành công.');
    }
}
