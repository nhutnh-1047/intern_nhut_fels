<?php
namespace App\Repositories\Model;

use App\Word;
use App\Repositories\EloquentRepository;

class WordRepository extends EloquentRepository
{
    public function getModel()
    {
        return Word::class;
    }

    public function all()
    {
        return $this->_model->paginate(config('setting.paginate.number'));
    }
}
