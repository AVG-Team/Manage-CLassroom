<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Salary\ManageSalaryRequest;
use App\Http\Requests\Admin\Salary\StoreSalariesRequest;
use App\Models\DefaultSalary;
use App\Models\Salary;
use App\Traits\ResponseTrait;

class SalaryController extends Controller
{
    use ResponseTrait;
    public function index(ManageSalaryRequest $request)
    {
        $title = 'Quản Lý Lương - ' . config('app.name');
        $contentTitle = 'Quản Lý Lương';
        $table = $this->getTableSalary($request)->render();

        $listDefaultSalary = DefaultSalary::all();
        $minYear = Salary::selectRaw('YEAR(MIN(payday)) as min_year')->value('min_year');

        return view('admin.salary.index', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'tableHtml' => $table,
            'listDefaultSalary' => $listDefaultSalary,
            'minYear' => $minYear,
        ]);
    }

    public function getTableSalary (ManageSalaryRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $type = $values['type'] ?? 0;
        $search = $values['search'] ?? '';
        $status = $values['status'] ?? -1;
        $month = $values['month'] ?? -1;
        $year = $values['year'] ?? -1;
        $default_salary = $values['default_salary'] ?? -1;
        $has_bonus = $values['has_bonus'] ?? -1;

        $query = Salary::with(['user' => function ($query) {
            $query->withTrashed();
        }]);

        switch ($type) {
            case 1:
                $query->whereHas('user', function ($query) use ($search) {
                    $query->withTrashed();
                    $query->where('phone', 'like', '%' . $search . '%');
                });
                break;
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
        }

        if ($status != -1) {
            $query->where('status', $status);
        }

        if ($month != -1) {
            $query->whereMonth('payday', $month);
        }

        if ($year != -1) {
            $query->whereYear('payday', $year);
        }

        switch ($has_bonus) {
            case 0:
                $query->where('bonus', 0);
                break;
            case 1:
                $query->where('bonus', '!=', 0);
                break;
            default:
                break;
        }

        if ($default_salary != -1) {
            $query->where('default_salary_id', $default_salary);
        }

        $salaries = $query->paginate($perPage)->appends($request->all());

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.salary.table', ['salaries' => $salaries])->render()
            ]);
        }

        return view('admin.salary.table', [
            'salaries' => $salaries,
        ]);
    }

    public function create()
    {
        $title = 'Thêm Lương - ' . config('app.name');
        $contentTitle = 'Thêm Lương';
        $listDefaultSalary = DefaultSalary::all();

        return view('admin.salary.create', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'listDefaultSalary' => $listDefaultSalary,
        ]);
    }

    public function store(StoreSalariesRequest $request)
    {
        $values = $request->validated();
        $payday = $values['payday'] === null ? null : date('Y-m-d', strtotime($values['payday']));
        $values['payday'] = $payday;
        $values['bonus'] = $values['bonus'] ?? 0;
        $values['status'] = $values['status'] ?? 0;
        $values['user_id'] = $values['teacher_id'];

        try {
            Salary::create($values);
            return redirect()->route('admin.salary.index')->with('success', 'Thêm lương thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Thêm lương thất bại');
        }
    }

    public function edit(Salary $salary)
    {
        $title = 'Sửa Lương Giảng Viên - ' . config('app.name');
        $contentTitle = 'Sửa Lương Giảng Viên';
        $listDefaultSalary = DefaultSalary::all();

        return view('admin.salary.edit', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'listDefaultSalary' => $listDefaultSalary,
            'salary' => $salary,
        ]);
    }

    public function update(StoreSalariesRequest $request, Salary $salary)
    {
        $values = $request->validated();

        $payday = $values['payday'] === null ? null : date('Y-m-d', strtotime($values['payday']));
        $values['payday'] = $payday;
        $values['bonus'] = $values['bonus'] ?? 0;
        $values['status'] = $values['status'] ?? 0;
        $values['user_id'] = $values['teacher_id'];

        try {
            $salary->update($values);
            return redirect()->route('admin.salaries.index')->with('success', 'Sửa lương thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Sửa lương thất bại');
        }
    }

    public function delete(Salary $salary)
    {
        try {
            $salary->delete();
            return $this->successResponse([], 'Xóa người dùng thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa người dùng thất bại');
        }
    }

    public function __forceDelete(Salary $salary)
    {
        try {
            $salary->forceDelete();
            return $this->successResponse([true], 'Xóa người dùng thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa người dùng thất bại');
        }
    }
}
