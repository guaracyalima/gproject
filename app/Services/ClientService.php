<?php
/**
 * Created by PhpStorm.
 * User: guabirabadev
 * Date: 11/04/2017
 * Time: 13:46
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ClientRepository;
use CodeProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    protected $repository;
    /**
     * @var ClientValidator validators
     */
    private $validator;

    public function __construct(ClientRepository $repository,
                                ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(); //testa a vaidacao
            return $this->repository->create($data);
        }
        catch (ValidatorException $exception)
        { //retorna o erro de validacao
            return [
              'error' => true,
                'message' => $exception->getMessage()
            ];
        }

    }

    public function update(array $data, $id)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(); //testa a vaidacao
            return $this->repository->update($data, $id);
        }
        catch (ValidationException $exception)
        { //retorna o erro de validacao
            return [
                'error' => true,
                'message' => $exception->getMessage()
            ];
        }

    }
}