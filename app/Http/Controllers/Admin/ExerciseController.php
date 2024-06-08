<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Exercise\ManageExerciseRequest;
use App\Models\Exercise;
use App\Traits\ResponseTrait;

class ExerciseController extends Controller
{
    use ResponseTrait;
    public function index(ManageExerciseRequest $request)
    {
        $title = 'Quản Lý Bài Tập - ' . config('app.name');
        $contentTitle = 'Quản Lý Bài Tập';
        $tableHtml = $this->getTableExercise($request)->render();

        return view('admin.exercise.index', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'tableHtml' => $tableHtml,
        ]);
    }

    public function getTableExercise(ManageExerciseRequest $request)
    {
        $values = $request->validated();
        $perPage = $values['per_page'] ?? 15;
        $search_type = $values['search_type'] ?? 0;
        $search = $values['search'] ?? '';

        $query = Exercise::with(['user' => function ($query) {
            $query->withTrashed();
        }, 'classroom' => function ($query) {
            $query->withTrashed();
        }]);

        switch ($search_type) {
            case 0:
                $query->where('name_file_upload', 'like', '%' . $search . '%');
                break;
            case 1:
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
            case 2:
                $query->whereHas('classroom', function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%');
                });
                break;
        }

        $exercises = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.exercise.table', ['exercises' => $exercises])->render()
            ]);
        }

        return view('admin.exercise.table', [
            'exercises' => $exercises,
        ]);
    }

    public function edit(Exercise $exercise)
    {
        $title = 'Sửa Bài Tập - ' . config('app.name');
        $contentTitle = 'Sửa Bài Tập';

        return view('admin.exercise.edit', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'exercise' => $exercise,
        ]);
    }

    public function delete(Exercise $exercise)
    {
        try {
            $exercise->delete();
            return $this->successResponse([], 'Xóa bài tập thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa bài tập thất bại');
        }
    }

    public function __forceDelete(Exercise $exercise)
    {
        try {
            $exercise->forceDelete();
            return $this->successResponse([true], 'Xóa bài tập thành công');
        } catch (\Exception $e) {
            return $this->errorResponse('Xóa bài tập thất bại');
        }
    }
}
