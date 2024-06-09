<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExerciseRequest;
use App\Models\Classroom;
use App\Models\Exercise;
use App\Models\Notification;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index($id)
    {

        $exercise = Exercise::FindOrFail($id);
        $user = auth()->user();
        $classroom = Classroom::FindOrFail($exercise->classroom_id);
        $classrooms = Classroom::all();
        $title = "Exercise";
        return view('user.classroom.detailExercise', ['title' => $title], compact('classroom','classrooms', 'user','exercise'));
    }

    public function showAll(){
        $title = "Danh sách bài tập";
        $user = auth()->user();
        $classrooms = Classroom::all();

        return view('user.page.all-exercises', ['title' => $title], compact('classrooms','user'));
    }


    public function store(Request $request)
    {

        $user = auth()->user();
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'uploadFile' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);

// Tạo một bài tập mới
        $exercise = new Exercise();
        $exercise->title = $validatedData['title'];
        $exercise->description = $validatedData['description'];
        $exercise->classroom_id = $request->classroom_id;
        $exercise->user_id = auth()->user()->uuid;

        if ($request->hasFile('uploadFile')) {
            // Lưu tệp vào thư mục storage/exercises
            $uploadedFile = $request->file('uploadFile');
            $filename = $uploadedFile->store('public/exercises');

            // Lưu tên tệp vào cơ sở dữ liệu
            $exercise->name_file_upload = $uploadedFile->getClientOriginalName();
        }

        $exercise->save();

        $notification = new Notification();
        $notification->title = 'Thông báo bài tập mới';
        $notification->content = $user->name . ' đã đăng một bài tập mới: Ngày ' . $exercise->created_at->format('d/m');
        $notification->user_id = auth()->user()->uuid;
        $notification->classroom_id = $request->classroom_id;
        $notification->type = 2;

        // Lưu thông báo vào cơ sở dữ liệu
        $notification->save();

        return redirect()->route('exercise', ['exercise' => $exercise->id ])->with('success', 'Tạo bài tập thành công.');
    }

    public function update(Request $request, $id)
    {
        // Kiểm tra dữ liệu nhận được từ form
//        dd($request->all());

        // Validation
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'uploadFile' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);

        // Tìm Exercise theo ID
        $exercise = Exercise::find($id);

        if (!$exercise) {
            return redirect()->route('exercise.index')->with('error', 'Bài tập không tồn tại.');
        }

        // Cập nhật dữ liệu
        $exercise->title = $validatedData['title'];
        $exercise->description = $validatedData['description'];

        if ($request->hasFile('uploadFile')) {
            // Lưu tệp vào thư mục storage/exercises
            $uploadedFile = $request->file('uploadFile');
            $filename = $uploadedFile->store('public/exercises');

            // Lưu tên tệp vào cơ sở dữ liệu
            $exercise->name_file_upload = $uploadedFile->getClientOriginalName();;
        }

        $exercise->save();

        return redirect()->route('exercise', ['exercise' => $id ])->with('success', 'Cập nhật bài tập thành công.');
    }


}
