<?php
    /**
     * Created by PhpStorm.
     * User: GAlima
     * Date: 27/10/2017
     * Time: 13:26
     */

    namespace CodeProject\Repositories;


    use CodeProject\Entities\Client;
    use Prettus\Repository\Eloquent\BaseRepository;

    class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
    {
        public function model ()
        {
            return Client::class;
        }


    }