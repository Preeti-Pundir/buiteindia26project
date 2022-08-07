<?php

namespace App\Contracts;
use App\Models\product;
use Illuminate\http\UploadedFile;
//use app\Contracts\ProductContract;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


/**
 * Interface ProductContract
 * @package App\Contracts
 */
//Class ProductRepository extends BaseRepository implements
interface ProductContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findProductById(int $id);
  
    /**
     * @param array $params
     * @return mixed
     */
    public function createProduct(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProduct(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteProduct($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function findProductBySlug($slug);
}
