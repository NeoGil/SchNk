<?php

namespace App\Modules\Admin\Material\Controllers;

use App\Modules\Admin\Course\Models\Course;
use App\Modules\Admin\Material\Models\Material;
use App\Modules\Admin\Material\Requests\MaterialRequest;
use App\Modules\Admin\Material\Services\MaterialService;
use App\Modules\Admin\Methods\Models\Method;
use App\Modules\Admin\Dashboard\Classes\Base;
use Illuminate\Support\Facades\DB;

class MaterialController extends Base
{

    const TEST_METHOD = 'test';
    const TYPE_METHOD = 'specific';

    private $create_name =  'createSt';

    public function __construct(MaterialService $materialService)
    {
        parent::__construct();
        $this->service = $materialService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('view', Material::class);


        $materials = Material::all();
        $methods = Method::all();
        $this->title = "Материалы";

        $this->content = view('Admin::Material.index')->
        with([
            'materials' => $materials,
            'methods' => $methods,
            'title' => $this->title,

        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Create of the resource.
     *
     * @param Method $method
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function create(Method $method)
    {
        $this->authorize('create', Material::class);

        $this->title = "Создание материала";

        $courses = Course::all();

        $create_name = 'createSt';

        if($method->type == self::TYPE_METHOD && $method->alias == self::TEST_METHOD) {

            $create_name = 'createTEST';
            $this->title = "Создание теста";

        }
        elseif ($method->type == self::TYPE_METHOD) {
            return  \Redirect::route('materials.index')->with([
                'message' => __('Success')
            ]);
        }

        $this->content = view('Admin::Material.create.'. $create_name)->
        with([
            'title' => $this->title,
            'method' => $method,
            'courses' => $courses,
        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MaterialRequest $request)
    {
        if($request['methods_id'] == 9) {
            $test = serialize($request['contents']);
            $request['contents'] = $test;
        }
        $this->service->save($request, new Material());

        return  \Redirect::route('materials.index')->with([
            'message' => __('Success')
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Material\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Modules\Admin\Material\Models\Material $material
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function edit(Material $material)
    {
        $this->authorize('edit', Material::class);

        $this->title = "Редактирование материала";

        $courses = Course::all();

        $edit_name = 'editStandard';

        $course_old = DB::table('courses')->where('id', $material->courses_id)->first();
        $method = DB::table('methods')->where('id', $material->methods_id)->first();
        if($method->alias == self::TEST_METHOD) {
            $material->contents = unserialize($material->contents);
            $edit_name = 'editTest';
            $this->title = "Редактирование теста";
        }
        $this->content = view('Admin::Material.edit.'.$edit_name)->
        with([

            'title' => $this->title,
            'item' => $material,
            'courses' => $courses,
            'course_old' => $course_old,
            'method' => $method,

        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\Material\Models\Material  $material
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(MaterialRequest $request, Material $material)
    {
        if($request['methods_id'] == 9) {
            $test = serialize($request['contents']);
            $request['contents'] = $test;
        }

        $this->service->save($request, $material);
        return  \Redirect::route('materials.index')->with([
            'message' => __('Success')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\Material\Models\Material  $material
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return  \Redirect::route('materials.index')->with([
            'message' => __('Success')
        ]);
    }

}
