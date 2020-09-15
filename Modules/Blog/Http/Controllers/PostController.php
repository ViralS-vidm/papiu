<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Blog\Http\Requests\CreatePostRequest;
use Modules\Blog\Http\Requests\UpdatePostRequest;
use Modules\Blog\Repositorires\Contracts\PostRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * PostController constructor.
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $posts = $this->genPagination($request, $this->postRepository);

        return view('blog::posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('blog::posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePostRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreatePostRequest $request)
    {

        $this->postRepository->create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @param Request $request
     * @return Application|Factory|View
     */
    public function show($id, Request $request)
    {
        $post = $this->postRepository->with($request->get('load', []))->findById($id);

        return view('blog::posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $post = $this->postRepository->findById($id);

        return view('blog::posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePostRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $this->postRepository->updateById($id, $request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->postRepository->deleteById($id);

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
