<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Order;
use App\Models\UserSubscribed;
use Illuminate\Support\Str;


class PaymentController extends Controller
{
    public function checkout($id){
        $title = "Thanh Toán";
        $user = auth()->user();
        $classroom = Classroom::FindOrFail($id);
        return view('user.page.checkout', ['title' => $title], compact('user','classroom'));
    }

    public function success(PaymentRequest $request){
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('home')->with('error', 'Bạn cần đăng nhập để thực hiện thanh toán!');
        }

        if(UserSubscribed::where('user_id', auth()->user()->id)->where('classroom_id', $request->classroom_id)->exists()){
            return redirect()->route('home')->with('error', 'Bạn đã tham gia lớp học này rồi!');
        }else{
            $order = new Order();
            $order['user_id'] = $user->uuid;
            $order['classroom_id']= $request->classroom_id;
            $order['total'] = $request->price;
            $order['note'] = $request->note;
            $order['code_order'] = 'AVG' . Str::random(5) .time();
            if($request->price = 0){
                $order['status'] = 1;

            }
            $order->save();

            $userSubscribed = new UserSubscribed();
            $userSubscribed['user_id']= $user->uuid;
            $userSubscribed['classroom_id'] = $request->classroom_id;
            if($request->price = 0){
                $userSubscribed['status'] = 1;
            }
            $userSubscribed->save();
        }

        return redirect()->route('home')->with('success', 'Thanh toán thành công!');
    }

}
