<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Repository\CategoryRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminCategoriesController extends Controller
{

    private $repository;
    private $response;

    public function __construct(ResponseFactory $response, CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function index()
    {
        $categories = $this->repository->all();
        return $this->response->view('codecategory::index', compact('categories'));

    }

    public function create()
    {
        $categories = $this->repository->all();
        return view('codecategory::create', compact('categories'));

    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        //$user = Auth::user();
        if(!Gate::/*forUser($user)->*/allows('update-category', $category)){
            $categories = $this->repository->all();
            return $this->response->view('codecategory::index', compact('categories'));
        }

        $category = $this->repository->find($id);
        $categories = $this->repository->all();
        return $this->response->view('codecategory::edit', compact('category', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        //var_dump($data); die;
        if(!isset($data['active'])){
            $data['active'] = false;
        }else{
            $data['active'] = true;
        }

        if(!isset($data['parent_id']) || (isset($data['parent_id']) && $data['parent_id'] == 0)){
            $data['parent_id'] = null;
        }

        $category = $this-$this->repository->update($data, $id);
        //var_dump($category); die;
        return redirect()->route('admin.categories.index');
    }

}