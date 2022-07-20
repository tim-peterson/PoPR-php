<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
abstract class ApiController extends Controller
{
    protected $modelClass;
    protected $perPage = 10;
 
    public function __construct()
    {
        $this->middleware('auth');
 
        $this->modelClass = $this->modelClass();
    }
 
    /**
     * Return the class of the model
     *
     * @return string
     */
    protected abstract function modelClass();
 
    /**
     * Return an array of all of the models for this endpoint
     *
     * @param Request $request
     * @return array
     */
    protected abstract function all(Request $request);
 
    /**
     * Return an array of validation rules
     *
     * @return array
     */
    protected abstract function validationRules();
 
    /**
     * Alter the model before showing it. Great for loading relationships.
     *
     * @param $model
     */
    protected function showWith($model)
    {
        //
    }
 
    /**
     * Sanitize and alter any data before saving 
     *
     * @param array $data
     * @return array
     */
    protected function processDataBeforeSaving($data)
    {
        //
    }
 
    public function index(Request $request)
    {
        $page = abs(intval($request->get('page')));
 
        $items      = $this->all($request);
        $offset     = $page <= 1 ? 0 : ($page * $this->perPage) - $this->perPage;
        $pagedItems = array_slice($items, $offset, $this->perPage);
 
        $paginator = new LengthAwarePaginator($pagedItems, count($items), $this->perPage, $page);
 
        return $paginator;
    }
 
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules());
 
        $data = $request->only(array_keys($this->validationRules()));
        $data = $this->processDataBeforeSaving($data);
 
        $model = call_user_func($this->modelClass . '::create', $data);
 
        return $model;
    }
 
    public function show($id, Request $request)
    {
        $model = call_user_func($this->modelClass . '::findOrFail', $id);
        $this->authorize($model);
 
        $this->showWith($model);
 
        return $model;
    }
 
    public function update($id, Request $request)
    {
        $model = call_user_func($this->modelClass . '::findOrFail', $id);
        $this->authorize($model);
 
        $this->validate($request, $this->validationRules());
 
        $data = $request->only(array_keys($this->validationRules()));
        $data = $this->processDataBeforeSaving($data);
 
        $model = call_user_func($this->modelClass . '::update', $data);
 
        return $model;
    }
 
    public function destroy($id)
    {
        $model = call_user_func($this->modelClass . '::findOrFail', $id);
        $this->authorize($model);
 
        $model->delete();
 
        return $model;
    }
}