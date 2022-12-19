<?php

namespace App\Service\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class AdminPostService
{

    public function store($data)
    {
        try { // транзакция, попытка провести логику в тру иначе падаем в катч
            DB::BeginTransaction();

            $tagIds = $data['tags_ids'];//выципляем теги, помещаем в переменую и
            unset($data['tags_ids']); //  убираем их с массива

            $data['preview_image'] = Storage::disk('public')->put('images', $data ['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('images', $data ['main_image']);

            $post = Post::firstOrcreate($data); // Используется first для создания только уникальных значений, при этом у можно развёрнуто делать с разными условиями
            $post->tag()->attach($tagIds); // отвязываем теги

            DB::commit(); // всё ок, запускай
        } catch (Exception $exception) { //если что-то пошло не так, верни этот блок
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::BeginTransaction();
            if (isset($data['tags_ids'])) {
                $tagIds = $data['tags_ids'];//выципляем теги, помещаем в переменую и
                unset($data['tags_ids']); //  убираем их с массива
            }
            if (isset ($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('images', $data ['preview_image']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('images', $data ['main_image']);
            }
            if (isset($data['tags_ids'])) {
                $post->tag()->sync($tagIds);
            }

            $post->update($data);
            DB::commit();
        } catch (Exception $exception) {
            abort(500);
        }


    }
}
