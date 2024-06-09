<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Request\ManageSubjectRequest;
use App\Models\Subject;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ManageSubjectRequest $request)
    {
        $contentTitle = 'Quản Lý Môn Học';
        $title = $contentTitle . ' - ' . config('app.name');
        $tableHtml = $this->getTableSubject($request)->render();

        return view('admin.subject.index', compact('contentTitle', 'title', 'tableHtml'));
    }

    public function getTableSubject(ManageSubjectRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $search = $values['search'] ?? '';

        $query = Subject::query();

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $subjects = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.subject.table', ['subjects' => $subjects])->render()
            ]);
        }

        return view('admin.subject.table', [
            'subjects' => $subjects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contentTitle = 'Thêm Môn Học';
        $title = $contentTitle . ' - ' . config('app.name');
        return view('admin.subject.create', compact('contentTitle', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $isExist = Subject::where('name', $request->name)->exists();
        if ($isExist) {
            return redirect()->back()->withErrors(['name' => 'Môn học này đã tồn tại']);
        }

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('admin.subject.index')->with('success', 'Thêm môn học thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::find($id);
        $contentTitle = 'Sửa Môn Học';
        $title = $contentTitle . ' - ' . config('app.name');
        return view('admin.subject.edit', compact('contentTitle', 'title', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $isExist = Subject::where('name', $request->name)->where('id', '!=', $id)->exists();
        if ($isExist) {
            return redirect()->back()->withErrors(['name' => 'Môn học này đã tồn tại']);
        }

        $defaultSalary = Subject::find($id);
        $defaultSalary->name = $request->name;
        $defaultSalary->save();

        return redirect()->route('admin.subject.index')->with('success', 'Sửa môn học thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        if ($subject->countClassroomSubscribed > 0) {
            return $this->errorResponse('Không thể xóa này vì có lớp học đang sử dụng');
        }
        try {
            $subject->delete();
            return $this->successResponse([], 'Xóa thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa thất bại');
        }
    }
}
