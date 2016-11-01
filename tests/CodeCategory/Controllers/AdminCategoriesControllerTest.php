<?php

namespace CodePress\CodeCategory\Tests\Controllers;


use CodePress\CodeCategory\Controllers\AdminCategoriesController;
use CodePress\CodeCategory\Controllers\Controller;
use CodePress\CodeCategory\Repository\CategoryRepositoryEloquent;
use CodePress\CodeCategory\Tests\AbstractTestCase;
use Illuminate\Contracts\Routing\ResponseFactory;
use Mockery as m;

class AdminCategoriesControllerTest extends AbstractTestCase
{

    public function test_should_extends_from_controller()
    {
        $repository = m::mock(CategoryRepositoryEloquent::class);
        $response = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($response, $repository);

        $this->assertInstanceOf(Controller::class, $controller);
    }

    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $repository = m::mock(CategoryRepositoryEloquent::class);
        $response = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($response, $repository);
        $html = m::mock();

        $categoriesResult = ['Cat 1', 'Cat 2'];

        $repository->shouldReceive('all')->andReturn($categoriesResult);

        $response->shouldReceive('view')
            ->with('codecategory::index', ['categories' => $categoriesResult])
            ->andReturn($html);

        $this->assertEquals($controller->index(), $html);

    }

}