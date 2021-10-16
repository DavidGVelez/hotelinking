<?php

namespace App\Repositories;

use Illuminate\Support\Str;

class PromoCodeRepository extends BaseRepository
{

  public function create(array $data)
  {
    $data['code'] = $this->generateCode();
    return $this->model->create($data);
  }


  private function generateCode()
  {
    $code = Str::random(5);
    if ($this->model::where('code', $code)->count() > 0) $this->generateCode();
    return $code;
  }
}
