<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class CourseRepository
{
    public function search($term): LengthAwarePaginator
    {
        $query = Course::with(['students', 'professors', 'modules']);

        if ($term) {
            $query->where(function ($query) use ($term) {
                $query->where('name', 'LIKE', "%{$term}%")
                    ->orWhere('duration', 'LIKE', "%{$term}%");
            });
        }

        return $query->paginate(5);
    }
}
