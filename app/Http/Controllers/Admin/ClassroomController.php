<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ClassroomStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Classroom\ManageClassroomRequest;
use App\Http\Requests\Admin\Classroom\StoreClassroomRequest;
use App\Models\Classroom;
use App\Models\Subject;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    use ResponseTrait;
    public function index(ManageClassroomRequest $request)
    {
        $contentTitle = 'Danh sách lớp học';
        $title = $contentTitle . ' - ' . config('app.name');
        $table = $this->getTableClassroom($request);
        $subjects = Subject::all();
        return view('admin.classrooms.index', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'tableHtml' => $table,
            'subjects' => $subjects,
        ]);
    }

    public function getTableClassroom(ManageClassroomRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $status = $values['status'] ?? -1;
        $search_type = $values['search_type'] ?? -1;
        $search = $values['search'] ?? '';
        $grade = $values['grade'] ?? -1;
        $subject = $values['subject'] ?? -1;

        $query = Classroom::with(['teacher' => function ($query) {
            $query->withTrashed();
        }, 'subject']);

        switch ($search_type) {
            case 1:
                $query->where('code_classroom', 'like', '%' . $search . '%');
                break;
            case 2:
                if (!empty($search) && strlen($search) >= 2) {
                    $query->whereHas('teacher', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->search($search);
                    });
                } else {
                    $query->whereHas('teacher', function ($query) use ($search) {
                        $query->withTrashed();
                        $query->where('name', 'like', '%' . $search . '%');
                    });
                }
                break;
            default:
                if (!empty($search) && strlen($search) >= 2) {
                    $query->search($search);
                } else {
                    $query->where('title', 'like', '%' . $search . '%');
                }
                break;
        }
        if ($status != -1)
            $query->where('status', $status);
        if ($grade != -1)
            $query->where('grade', $grade);

        if ($subject != -1)
            $query->where('subject_id', $subject);

        $classrooms = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.classrooms.table', ['classrooms' => $classrooms])->render()
            ]);
        }

        return view('admin.classrooms.table', [
            'classrooms' => $classrooms,
        ]);
    }

    public function getClassroom()
    {
        $statusCloseClassroom = ClassroomStatusEnum::CLOSE;
        $classrooms = Classroom::with('teacher')->where('status', '!=', $statusCloseClassroom)->get();

        $classrooms = $classrooms->map(function ($classroom) {
            $teacherName = $classroom->teacher ? ' - ' . $classroom->teacher->name : '';
            $tmpTitle = $classroom->title . ' - ' . $classroom->grade . $teacherName . ' - ' . $classroom->id;
            $classroom->title = $tmpTitle;
            return $classroom;
        });
        return response()->json($classrooms);
    }

    public function create()
    {
        $contentTitle = 'Thêm lớp học';
        $title = $contentTitle . ' - ' . config('app.name');
        $subjects = Subject::all();
        return view('admin.classrooms.create', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'subjects' => $subjects,
        ]);
    }

    public function store(StoreClassroomRequest $request)
    {
        $values = $request->validated();
        $teacher_id = $values['teacher_id'];

        $isTeacherExist = Classroom::query()->where('teacher_id', $teacher_id)->where('status', 1)->exists();
        if ($isTeacherExist) {
            return redirect()->back()->withErrors(['Giáo viên này đã có lớp học đang hoạt động']);
        }
        $codeClassroom = Str::random(9);
        $values['code_classroom'] = $codeClassroom;
        $values['status'] = 0;
        $path = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/classrooms', $imageName);
        }

        $values['image_path'] = $path;

        try {
            Classroom::create($values);
            return redirect()->route('classrooms.index')->with('success', 'Thêm lớp học thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Thêm lớp học thất bại');
        }
    }

    public function edit(Classroom $classroom)
    {
        $contentTitle = 'Sửa lớp học';
        $title = $contentTitle . ' - ' . config('app.name');
        $subjects = Subject::all();
        return view('admin.classrooms.edit', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'classroom' => $classroom,
            'subjects' => $subjects,
        ]);
    }

    public function update(StoreClassroomRequest $request, Classroom $classroom)
    {
        $values = $request->validated();
        $teacher_id = $values['teacher_id'];

        $isTeacherExist = Classroom::query()->where('teacher_id', $teacher_id)->where('status', 1)->where('id', '!=', $classroom->id)->exists();
        if ($isTeacherExist) {
            return redirect()->back()->withErrors(['teacher_id' => 'Giáo viên này đã có lớp học đang hoạt động']);
        }

        $path = $classroom->image_path;

        if ($request->hasFile('image')) {
            if ($path && Storage::exists($path)) {
                Storage::delete($path);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/classrooms', $imageName);
        }

        $values['image_path'] = $path;

        try {
            $classroom->update($values);
            return redirect()->route('admin.classrooms.index')->with('success', 'Sửa lớp học thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sửa lớp học thất bại');
        }
    }

    public function delete(Classroom $classroom)
    {
        try {
            $classroom->delete();
            return $this->successResponse([], 'Xóa lớp học thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa lớp học thất bại');
        }
    }

    public function __forceDelete(Classroom $classroom)
    {
        try {
            $classroom->forceDelete();
            return $this->successResponse([true], 'Xóa lớp học thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa lớp học thất bại');
        }
    }
}
