<?php
    /**
     * Created by PhpStorm.
     * User: GAlima
     * Date: 27/10/2017
     * Time: 13:48
     */

    namespace CodeProject\Services;
    
    use CodeProject\Repositories\ClientRepository;
    use CodeProject\Validators\ClientValidatior;
    use Prettus\Validator\Exceptions\ValidatorException;

    class ClientService
    {

        /**
         * @var ClientRepository
         */
        private $repository;
        /**
         * @var ClientValidatior
         */
        private $validatior;

        public function __construct ( ClientRepository $repository, ClientValidatior $validatior  )
        {
            $this->repository = $repository;
            $this->validatior = $validatior;
        }

        public function create ( array $data)
        {
            try
            {
                ($this->validatior($data))->passesOrFail;
                return $this->repository->create ($data);
            }
            catch (ValidatorException $exception)
            {
                return [
                  'error' => true,
                  'message' => $exception->getMessageBag ()
                ];
            }

        }

        public function update ( array $data, $id)
        {
            try
            {
                ($this->validatior($data))->passesOrFail;
                return $this->repository->update () ($id, $data);
            }
            catch (ValidatorException $exception)
            {
                return [
                    'error' => true,
                    'message' => $exception->getMessageBag ()
                ];
            }
        }
    }