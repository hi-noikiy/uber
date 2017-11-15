<?php

namespace Packages\Uber\Controllers;

use App\Http\Controllers\Controller;
use Packages\Uber\Models\Uber;
use Packages\Uber\Entities\UberUserEntity;
use Packages\Uber\Transformers\UberTransformer;
use Illuminate\Http\Request;
use Packages\Uber\Services\UberUserService;
use Packages\Uber\Requests\UberRequest;
use Symfony\Component\HttpFoundation\Response;
// use Fractal;

class UberController extends Controller
{
    protected $service; 

    public function __construct(UberUserService $service)
    {
        $this->service = $service;
    }

    /**
    * listing of all users
    *
    * @return json response.
    */
    public function index()
    {
        $data = Uber::get();

        echo (trans('packages::messages.success').PHP_EOL);
        
        echo config('messages.message');

        // $user = Fractal::collection($data, new UberTransformer)->getArray();

        return \Response::json([
            'user' => $data
        ]);
    }

    /**
     * create item.
     * 
     * @param  $item: model object.
     * @return json response.
     */
    public function save(UberRequest $request, UberUserEntity $userEntity)
    {
        $entity = $userEntity->setName($request->get('name'))
                ->setEmail($request->get('email'))
                ->setAddress($request->get('address'))
                ->setMeta([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'address' => $request->get('address'),
                ]);

        $user = $this->service->save($entity);

        $message = trans('packages::messages.saved');

        return \Response::json([
            'user' => $user,
            'message' => $message
        ]);
    }

    /**
     * get single user details.
     * 
     * @param  $id: integer of user id.
     * @return json response
     */
    public function show($id)
    {
        $user = Uber::findOrFail($id);

        return \Response::json([
            'user' => $user,
        ]);
    }

    /**
     * update user.
     * 
     * @param  $item: model object.
     * @return json response.
     */
    public function update($id, UberRequest $request, UberUserEntity $userEntity)
    {
        $entity = $userEntity->setName($request->get('name'))
                            ->setEmail($request->get('email'))
                            ->setAddress($request->get('address'))
                            ->setKey($id)
                            ->setMeta([
                                'name' => $request->get('name'),
                                'email' => $request->get('email'),
                                'address' => $request->get('address'),
                            ]);

        $user = $this->service->update($entity);

        $message = trans('packages::messages.updated');

        return \Response::json([
            'user' => $user,
            'message' => $message
        ]);
    }
}
