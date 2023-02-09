<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;

class Comentario extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
    * PRODUCT ATTRIBUTES
    * $this->attributes['id']
    * $this->attributes['description']
    * $this->attributes['valoracion']
    * $this->attributes['product_id']
    */

    public static function validate($request)
    {
        $request->validate([
            "descripcion" => "required",
            "valoracion" => "required",
            "product_id" => "required|exists:products,id",
            "user_id" => "required|exists:users,id",
        ]);
    }

    protected $fillable = [
        "descripcion",
        "valoracion",
        "product_id",
        "user_id",
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDescripcion()
    {
        return $this->attributes['descripcion'];
    }

    public function setDescripcion($descripcion)
    {
        $this->attributes['descripcion'] = $descripcion;
    }

    public function getValoracion()
    {
        return $this->attributes['valoracion'];
    }

    public function setValoracion($valoracion)
    {
        $this->attributes['valoracion'] = $valoracion;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($product_id)
    {
        $this->attributes['product_id'] = $product_id;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
       $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public function ProductId()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function UserId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}