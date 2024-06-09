<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DefaultSalary\ManageDefaultSalaryRequest;
use App\Models\DefaultSalary;
use App\Models\Salary;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;

class DefaultSalaryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ManageDefaultSalaryRequest $request)
    {
        $contentTitle = 'Lương Mặc Định';
        $title = 'Lương Mặc Định - ' . config('app.name');
        $tableHtml = $this->getTableDefaultSalary($request)->render();

        return view('admin.default-salary.index', compact('contentTitle', 'title', 'tableHtml'));
    }

    public function getTableDefaultSalary(ManageDefaultSalaryRequest $request)
    {

        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $search = $values['search'] ?? '';

        $query = DefaultSalary::query();

        if (!empty($search)) {
            $query->where('salary', 'like', '%' . $search . '%');
        }

        $defaultSalaries = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.default-salary.table', ['defaultSalaries' => $defaultSalaries])->render()
            ]);
        }

        return view('admin.default-salary.table', [
            'defaultSalaries' => $defaultSalaries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contentTitle = 'Thêm Lương Mặc Định';
        $title = 'Thêm Lương Mặc Định - ' . config('app.name');
        return view('admin.default-salary.create', compact('contentTitle', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'salary' => 'required|numeric|min:0',
        ]);

        $isExist = DefaultSalary::where('salary', $request->salary)->exists();
        if ($isExist) {
            return redirect()->back()->withErrors(['salary' => 'Lương mặc định này đã tồn tại']);
        }

        $defaultSalary = new DefaultSalary();
        $defaultSalary->salary = $request->salary;
        $defaultSalary->save();

        return redirect()->route('admin.default-salary.index')->with('success', 'Thêm lương mặc định thành công');
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
        $defaultSalary = DefaultSalary::find($id);
        $contentTitle = 'Sửa Lương Mặc Định';
        $title = 'Sửa Lương Mặc Định - ' . config('app.name');
        return view('admin.default-salary.edit', compact('contentTitle', 'title', 'defaultSalary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'salary' => 'required|numeric|min:0',
        ]);


        $isExist = DefaultSalary::where('salary', $request->salary)->where('id', '!=', $id)->exists();
        if ($isExist) {
            return redirect()->back()->withErrors(['salary' => 'Lương mặc định này đã tồn tại']);
        }

        $defaultSalary = DefaultSalary::find($id);
        $defaultSalary->salary = $request->salary;
        $defaultSalary->save();

        return redirect()->route('admin.default-salary.index')->with('success', 'Sửa lương mặc định thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $defaultSalary = DefaultSalary::find($id);
        if ($defaultSalary->countTeacherUsed > 0) {
            return $this->errorResponse('Không thể xóa lương mặc định này vì có giáo viên đang sử dụng');
        }
        try {
            $defaultSalary->delete();
            return $this->successResponse([], 'Xóa thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa thất bại');
        }
    }
}
