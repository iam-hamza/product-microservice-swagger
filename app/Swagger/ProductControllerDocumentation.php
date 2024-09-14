<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 *
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Login with email and password to get the authentication token",
 *     name="Token based Based",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *    securityScheme="bearer"
 * )
 * @OA\Schema(
 *     schema="ProductResponse",
 *     type="object",
 *     required={"name", "description", "price", "quantity"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Product Name"),
 *     @OA\Property(property="description", type="string", example="Product Description"),
 *     @OA\Property(property="price", type="number", format="float", example=19.99),
 *     @OA\Property(property="quantity", type="integer", example=100),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-09-07T12:34:56Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-09-07T12:34:56Z")
 * )
 *
 * @OA\Schema(
 *     schema="ProductSuccessResponse",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=true),
 *     @OA\Property(property="message", type="string", example="Success"),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         additionalProperties=true,
 *         example={}
 *     ),
 *     @OA\Property(property="status_code", type="integer", example=200)
 * )
 *
 * @OA\Schema(
 *     schema="ProductErrorResponse",
 *     type="object",
 *     @OA\Property(property="success", type="boolean", example=false),
 *     @OA\Property(property="message", type="string", example="An error occurred"),
 *     @OA\Property(
 *         property="data",
 *         type="object",
 *         additionalProperties=true,
 *         example={}
 *     ),
 *     @OA\Property(property="status_code", type="integer", example=400)
 * )
 *
 * @OA\Tag(
 *     name="Products",
 *     description="Operations related to products"
 * )
 *
 * @OA\Get(
 *     path="/api/products",
 *     summary="List all products",
 *     tags={"Products"},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/ProductResponse")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Internal server error",
 *         @OA\JsonContent(ref="#/components/schemas/ProductErrorResponse")
 *     ),
 *      security={{"sanctum":{}}},
 * )
 *
 * @OA\Post(
 *     path="/api/products",
 *     summary="Create a new product",
 *     tags={"Products"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Product created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input",
 *         @OA\JsonContent(ref="#/components/schemas/ProductErrorResponse")
 *     ),
 *     security={{"sanctum":{}}},
 * )
 *
 * @OA\Get(
 *     path="/api/products/{id}",
 *     summary="Get a single product by ID",
 *     tags={"Products"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found",
 *         @OA\JsonContent(ref="#/components/schemas/ProductErrorResponse")
 *     ),
 *     security={{"sanctum":{}}},
 * )
 *
 * @OA\Put(
 *     path="/api/products/{id}",
 *     summary="Update a product",
 *     tags={"Products"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/ProductResponse")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input",
 *         @OA\JsonContent(ref="#/components/schemas/ProductErrorResponse")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found",
 *         @OA\JsonContent(ref="#/components/schemas/ProductErrorResponse")
 *     ),
 *     security={{"sanctum":{}}},
 * )
 *
 * @OA\Delete(
 *     path="/api/products/{id}",
 *     summary="Delete a product",
 *     tags={"Products"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Product deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found",
 *         @OA\JsonContent(ref="#/components/schemas/ProductErrorResponse")
 *     ),
 *      security={{"sanctum":{}}},
 * )
 */
class ProductControllerDocumentation
{
    // This class is used solely for Swagger annotations.
}
