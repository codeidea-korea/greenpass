<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

function generateRandomString($length = 16): string
{
    // $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters       = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function getDateString($strDate, string $format = 'Y.m.d'): string
{
    try {
        if ($strDate != null) {
            $date = new DateTime($strDate);
            $date = $date->format($format);
        } else {
            $date = '';
        }
    } catch (Exception $e) {
        $date = '';
    }

    return $date;
}

function validateTableName(string $tableName)
{
    $pattern = '/^[a-zA-Z][a-zA-Z0-9_]*[a-zA-Z0-9]$/';

    return preg_match($pattern, $tableName);
}

function validatePath(string $path)
{
    $pattern = '/^[a-zA-Z][a-zA-Z0-9_\-]*[a-zA-Z0-9]$/';

    return preg_match($pattern, $path);
}


function getSearchBuilder(Request $request, Builder $builder, $basicSort = ['id'], $alias = [])
{
    $sortField     = $request->get('sort_field', '') ?: '';
    $sortType      = $request->get('sort_type', '') ?: '';
    $searchType    = $request->get('search_type', '') ?: '';
    $searchKeyword = $request->get('search_keyword', '') ?: '';

    # Search
    if (!empty($searchType)) {
        if (empty($searchKeyword)) {
            return '검색 키워드를 입력해주세요.';
        }

        switch ($searchType) {
            case 'XXXX':
                $builder->where('XXXX', 'LIKE', "%$searchKeyword%");
                break;
            default:
                if (array_key_exists($searchType, $alias)) {
                    $field = $alias[$searchType];
                } else {
                    $field = $searchType;
                }
                $builder->where($field, 'LIKE', "%$searchKeyword%");
                break;
        }
    }

    # Sort
    switch ($sortField) {
        case 'user':
            $field = 'user';
            break;
        case 'date':
            $field = 'created_at';
            break;
        default:
            if (array_key_exists($sortField, $alias)) {
                $field = $alias[$sortField];
            } else {
                $field = $sortField;
            }
            break;
    }
    if (empty($field)) {
        foreach ($basicSort as $sort) {
            $builder->orderByDesc($sort);
        }
    } else {
        if ($sortType === 'asc') {
            $builder->orderBy($field);
        } else {
            $builder->orderByDesc($field);
        }
    }

    $search = [
        'sort_field'     => $sortField,
        'sort_type'      => $sortType,
        'search_type'    => $searchType,
        'search_keyword' => $searchKeyword,
    ];

    return [
        'builder' => $builder,
        'search'  => $search,
    ];
}
