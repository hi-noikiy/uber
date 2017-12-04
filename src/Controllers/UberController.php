<?php

namespace Packages\Uber\Controllers;

use App\Http\Controllers\Controller;
use Packages\Uber\Models\Uber;
use Packages\Uber\Entities\UberUserEntity;
use Packages\Uber\Transformers\UberTransformer;
use Illuminate\Http\Request;
use Packages\Uber\Services\UberUserService;
use Packages\Uber\Controllers\ResponseController;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Fractal;
use League\Fractal\Serializer\JsonApiSerializer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class UberController extends ResponseController
{
    protected $service; 
    protected $response; 

    public function __construct(UberUserService $service, Manager $fractal, Request $request)
    {
        $this->service = $service;
        $this->fractal = $fractal;

        if($request->get('includes')) {
            $this->fractal->parseIncludes($request->get('includes')); 
        }
    }

    /**
    * listing of all users
    *
    * @return json response.
    */
    public function index(Request $request)
    {
        $data = Uber::with('profile')->orderBy('id', 'asc');
        echo "from package";

        if($request->has('limit')) {

            $limit = $request->get('limit');

            $userData = $data->Paginate($limit);

        } else {

            $userData = $data->get();     
        }
        // $user = Fractal::collection($data, new UberTransformer)->getArray();

        // return \Response::json($user);
        return  \Response::json(
               $this->fractal
               ->setSerializer(new JsonApiSerializer('') , 'User')
               ->createData(new Collection($userData, new UberTransformer, 'User'))
               ->toArray()
           );
    }

    /**
     * create item.
     * 
     * @param  $item: model object.
     * @return json response.
     */
    public function save(Request $request, UberUserEntity $userEntity)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address'    => 'required',
            'uid'   =>  'required',
            'phone' =>  'required'
        ]);

        if($validator->fails()){ 
            
            return $this->respondValidationFailed($validator->errors());
        }

        $entity = $userEntity->setName($request->get('name'))
                ->setEmail($request->get('email'))
                ->setAddress($request->get('address'))
                ->setMeta([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'address' => $request->get('address'),
                ]);

        $user = $this->service->save($entity, $request);

        $message = trans('packages::messages.saved');

        return  \Response::json(
               $this->fractal
               ->setSerializer(new JsonApiSerializer('') , 'User')
               ->createData(new item($user, new UberTransformer, 'User'))
               ->toArray()
           );
    }

    /**
     * get single user details.
     * 
     * @param  $id: integer of user id.
     * @return json response
     */
    public function show($id)
    {
        $user = Uber::with('profile')->findOrFail($id);

        return \Response::json(
               $this->fractal
               ->setSerializer(new JsonApiSerializer, 'users')
               ->createData(new Item($user, new UberTransformer, 'User'))
               ->toArray()
           );
    }

    /**
     * update user.
     * 
     * @param  $item: model object.
     * @return json response.
     */
    public function update($id, Request $request, UberUserEntity $userEntity)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address'    => 'required'
        ]);

        if($validator->fails()){ 
            
            return $this->respondValidationFailed($validator->errors());
        }
        
        $entity = $userEntity->setName($request->get('name'))
                            ->setEmail($request->get('email'))
                            ->setAddress($request->get('address'))
                            ->setKey($id)
                            ->setMeta([
                                'name' => $request->get('name'),
                                'email' => $request->get('email'),
                                'address' => $request->get('address'),
                            ]);

        $user = $this->service->update($entity, $request);

        // echo config('messages.message');

        $message = trans('packages::messages.updated');

         return  \Response::json(
               $this->fractal
               ->setSerializer(new JsonApiSerializer('') , 'User')
               ->createData(new item($user, new UberTransformer, 'User'))
               ->toArray()
           );

        // return \Response::json([
        //     'user' => $user,
        //     'message' => $message
        // ]);
    }
}
