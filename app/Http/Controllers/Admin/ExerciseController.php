<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageExerciseRequest;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
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

        $query = Exercise::With(['user', 'classroom']);

        switch ($search_type) {
            case 0:
                $query->where('name_file_upload', 'like', '%' . $search . '%');
                break;
            case 1:
                if (!empty($search) && strlen($search) >= 2) {
                    $query->whereHas('user', function ($query) use ($search) {
                        $query->search($search);
                    });
                } else {
                    $query->whereHas('user', function ($query) use ($search) {
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
        $title = 'Thêm Bài Tập - ' . config('app.name');
        $contentTitle = 'Thêm Bài Tập';

        return view('admin.exercise.edit', [
            'title' => $title,
            'contentTitle' => $contentTitle,
            'exercise' => $exercise,
        ]);
    }
}
