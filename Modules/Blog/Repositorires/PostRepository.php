<?php

namespace Modules\Blog\Repositorires;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositorires\Contracts\PostRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * @param Model $model
     * @return mixed
     */
    function transformResource(Model $model)
    {
        return $model;
    }
}
