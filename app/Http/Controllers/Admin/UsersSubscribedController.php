<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ClassroomStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserSubscribed\StoreUserSubscribedRequest;
use App\Http\Requests\Admin\UserSubscribed\UsersSubscribedRequest;
use App\Models\Classroom;
use App\Models\Order;
use App\Models\User;
use App\Models\UserSubscribed;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersSubscribedController extends Controller
{
    use ResponseTrait;
    public function index(UsersSubscribedRequest $request)
    {
        $contentTitle = "Danh Sách Học Viên Đã Đăng Ký";
        $title = $contentTitle . " - " . config('app.name');
        $tableHtml = $this->getTableUsersSubscribed($request)->render();
        return view('admin.user_subscribed.index',
            [
                'title' => $title,
                'contentTitle' => $contentTitle,
                'tableHtml' => $tableHtml,
            ]);
    }

    public function getTableUsersSubscribed(UsersSubscribedRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $search = $values['search'] ?? '';
        $type = $values['type'] ?? 0;
        $status = $values['status'] ?? -1;

        $query = UserSubscribed::with(['user' => function ($query) {
            $query->withTrashed();
        }, 'classroom' => function ($query) {
            $query->withTrashed();
        }]);

        switch ($type) {
            case 0:
                if (!empty($search) && strlen($search) >= 2) {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->search($search);
                    });
                } else {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                }
                break;
            case 1:
                if (!empty($search) && strlen($search) >= 2) {
                    $query->whereHas('classroom', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->search($search);
                    });
                } else {
                    $query->whereHas('classroom', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->where('title', 'like', '%' . $search . '%');
                    });
                }
                break;
            case 2:
                $query->whereHas('classroom', function ($query) use ($search) {
                    $query->withTrashed();
                    $query->where('code_classroom', 'like', '%' . $search . '%');
                });
                break;
        }

        if ($status != -1) {
            $query->where('status', $status);
        }

        $usersSubscribed = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.user_subscribed.table', ['usersSubscribed' => $usersSubscribed])->render()
            ]);
        }

        return view('admin.user_subscribed.table', [
            'usersSubscribed' => $usersSubscribed,
        ]);
    }

    public function approve(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
        ]);

        $value = $request->get('ids');

        try {
            $emails = UserSubscribed::whereIn('id', $value)->where('status', 0)
                ->join('users', 'user_subscribed.user_id', '=', 'users.uuid')
                ->pluck('users.email', 'users.name')->unique();

            if (! $emails->isEmpty()) {
                Mail::send('email.AddUserToClassroom', [], function ($email) use ($emails) {
                    $email->subject(config('app.name') . '- Chúc Mừng Bạn Đã Được Thêm Vào Lớp Học');

                    foreach ($emails as $name => $address) {
                        $email->bcc($address, $name);
                    }
                });
            }
            UserSubscribed::whereIn('id', $value)->update(['status' => 1]);


            $classroomIds = UserSubscribed::whereIn('user_subscribed.id', $value)->where('classrooms.status', 0)
                ->join('classrooms', 'user_subscribed.classroom_id', '=', 'classrooms.id')
                ->pluck('classrooms.id')->unique();

            foreach ($classroomIds as $id) {
                $count = UserSubscribed::query()->where('classroom_id', $id)->count();
                $classroom = Classroom::query()->where('id', $id)->first();
                if ($classroom->capacity <= $count) {
                    $classroom->update(['status' => 1]);
                }
            }

            return $this->successResponse([], 'Duyệt thành Công');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create()
    {
        $contentTitle = "Thêm Học Viên Đăng Kí";
        $title = $contentTitle . " - " . config('app.name');
        return view('admin.user_subscribed.create', [
            'title' => $title,
            'contentTitle' => $contentTitle,
        ]);
    }

    public function store(StoreUserSubscribedRequest $request)
    {
        try {
            DB::beginTransaction();
            $values = $request->validated();
            $values['status'] = 1;

            $classroom = Classroom::query()->where('code_classroom', $values['code_classroom'])->first();

            if (!$classroom || $classroom->status ==  ClassroomStatusEnum::CLOSE) {
                return redirect()->back()->withErrors(['code_classroom' => 'Lớp học không tồn tại']);
            }

            $user = User::query()->where('uuid', $values['user_id'])->first();
            if (!$user) {
                return redirect()->back()->withErrors(['user_id' => 'Người dùng không tồn tại']);
            }

            $isExist = UserSubscribed::query()->where('user_id', $values['user_id'])->where('classroom_id', $classroom->id)->first();
            if ($isExist) {
                return redirect()->back()->withErrors(['user_id' => 'Học viên đã đăng ký lớp học này', 'code_classroom' => 'Học viên đã đăng ký lớp học này']);
            }

            $order = [];
            $order['user_id'] = $values['user_id'];
            $order['classroom_id'] = $classroom->id;
            $values['classroom_id'] = $classroom->id;
            $order['status'] = 1;
            $order['price'] = $classroom->price;
            $order['note'] = $values['note'];
            $order['code_order'] = 'AVG' . Str::random(5) .time();

            UserSubscribed::create($values);
            Order::create($order);

            Mail::send('email.AddUserToClassroom', compact('user'), function ($email) use ($user) {
                $email->subject(config('app.name') . '- Thêm Học Viên Thành Công');
                $email->to($user->email, $user->name);
            });

            $count = UserSubscribed::query()->where('classroom_id', $classroom->id)->count();
            if ($classroom->capacity <= $count) {
                $classroom->update(['status' => 1]);
            }

            DB::commit();
            return redirect()->route('admin.users-subscribed.index')->with('success', 'Thêm Học Viên Đăng Kí Thành Công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => 'Thêm học viên thất bại']);
        }
    }

    public function edit(UserSubscribed $userSubscribed)
    {
        $contentTitle = "Chỉnh Sửa Học Viên Đăng Ký";
        $title = $contentTitle . " - " . config('app.name');

        $order = Order::query()->where('user_id', $userSubscribed->user_id)->where('classroom_id', $userSubscribed->classroom_id)->first();
        return view('admin.user_subscribed.edit', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'userSubscribed' => $userSubscribed,
            'order' => $order,
        ]);
    }

    public function update(StoreUserSubscribedRequest $request ,UserSubscribed $userSubscribed)
    {
        try {
            DB::beginTransaction();
            $values = $request->validated();

            $classroom = Classroom::query()->where('code_classroom', $values['code_classroom'])->first();

            if (!$classroom || $classroom->status == ClassroomStatusEnum::CLOSE) {
                return redirect()->back()->withErrors(['code_classroom' => 'Lớp học không tồn tại']);
            }

            $user = User::query()->where('uuid', $values['user_id'])->first();
            if (!$user) {
                return redirect()->back()->withErrors(['user_id' => 'Người dùng không tồn tại']);
            }

            $isExist = UserSubscribed::query()->where('user_id', $values['user_id'])->where('classroom_id', $classroom->id)->first();
            if ($isExist && $isExist->id != $userSubscribed->id) {
                return redirect()->back()->withErrors(['user_id' => 'Học viên đã đăng ký lớp học này', 'code_classroom' => 'Học viên đã đăng ký lớp học này']);
            }

            $order = Order::query()->where('user_id', $userSubscribed->user_id)->where('classroom_id', $userSubscribed->classroom_id)->first();

            if (! $order) {
                return redirect()->back()->withErrors(['errors' => 'Không tìm thấy đơn hàng của đơn đăng kí này, vui lòng liên hệ admin để sửa lại']);
            }

            $order->user_id = $values['user_id'];
            $order->classroom_id = $classroom->id;
            $order->note = $values['note'];

            $isExistOrder = Order::query()->where('user_id', $values['user_id'])->where('classroom_id', $classroom->id)->first();
            if ($isExistOrder && $isExistOrder->id != $order->id) {
                return redirect()->back()->withErrors(['code_classroom' => 'Học viên đã mua lớp học này']);
            }

            $userSubscribed->update($values);
            $order->update();

            if ($userSubscribed->user_id != $values['user_id']) {
                Mail::send('email.AddUserToClassroom', compact('user'), function ($email) use ($user) {
                    $email->subject(config('app.name') . ' - Thêm Học Viên Thành Công');
                    $email->to($user->email, $user->name);
                });
            }

            $count = UserSubscribed::query()->where('classroom_id', $classroom->id)->count();
            if ($classroom->capacity <= $count) {
                $classroom->update(['status' => 1]);
            }

            DB::commit();
            return redirect()->route('admin.users-subscribed.index')->with('success', 'Sửa Học Viên Đăng Kí Thành Công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => 'Sửa Học Viên Đăng Kí Thất Bại']);
        }
    }

    public function delete(UserSubscribed $userSubscribed)
    {
        try {
            $classroomId = $userSubscribed->classroom_id;
            $userSubscribed->delete();

            $count = UserSubscribed::query()->where('classroom_id', $classroomId)->count();
            $classroom = Classroom::query()->where('id', $classroomId)->first();
            if ($classroom->capacity > $count) {
                $classroom->update(['status' => 0]);
            }

            return redirect()->route('admin.users-subscribed.index')->with('success', 'Xóa Học Viên Đăng Kí Thành Công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => 'Xóa người dùng thất bại']);
        }
    }

    public function __forceDelete(UserSubscribed $userSubscribed)
    {
        try {
            $userSubscribed->forceDelete();
            return redirect()->route('admin.users-subscribed.index')->with('success', 'Xóa Học Viên Đăng Kí Thành Công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => 'Xóa người dùng thất bại']);
        }
    }
}
