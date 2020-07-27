<?php

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Laravel API Documentation",
 *     description="This is a sample API documentation.",
 *     termsOfService="http://laravelapi.test/api/terms",
 *     @OA\Contact(email="cmg.web@gmail.com"),
 *     @OA\License(name="Apache 2.0", url="http://www.apache.org/licenses/LICENSE-2.0.html")
 * )
 */

/**
 * @OA\Server(
 *     description="Laravel API Test Server",
 *     url="http://laravelapi.test/api"
 * )
 */

/**
 * @OA\Server(
 *     description="Laravel API Stage Server",
 *     url="http://laravelapi.stage/api"
 * )
 */

/**
 * @OA\ExternalDocumentation(
 *     description="Find out more about Laravel API",
 *     url="http://laravelapi.test/ext-documentation"
 * )
 */

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product model",
 *     type="object",
 *     schema="Product",
 *     properties={
 *      @OA\Property(property="id", type="integer", format="int64", description="id column"),
 *      @OA\Property(property="name", type="string"),
 *      @OA\Property(property="price", type="number")
 *     },
 *     required={"id", "name"}
 * )
 */

/**
 * @OA\Schema(
 *     title="ApiResponse",
 *     description="ApiResponse model",
 *     type="object",
 *     schema="ApiResponse",
 *     properties={
 *      @OA\Property(property="success", type="boolean"),
 *      @OA\Property(property="data", type="object"),
 *      @OA\Property(property="message", type="string"),
 *      @OA\Property(property="errors", type="object")
 *     }
 * )
 */

/**
 * @OA\Tag(
 *     name="product",
 *     description="Product tag description",
 *     @OA\ExternalDocumentation(
 *      description="Find out more",
 *      url="http://laravelapi.test/api/documentation/product"
 *     )
 * )
 */

/**
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     name="api_token",
 *     securityScheme="api_token",
 *     in="query"
 * )
 */

/**
 * @OA\SecurityScheme(
 *     type="http",
 *     securityScheme="bearer_token",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */

/**
 * @OA\Get(
 *     path="/products",
 *     tags={"product"},
 *     summary="List all products",
 *     operationId="index",
 *     @OA\Parameter(
 *      name="limit",
 *      in="query",
 *      description="How many items to return at one time",
 *      required=false,
 *      @OA\Schema(type="integer", format="int32")
 *     ),
 *     @OA\Response(
 *      response=200,
 *      description="A paged array of products",
 *      @OA\JsonContent(
 *          type="array",
 *          @OA\Items(ref="#/components/schemas/Product")
 *      )
 *     ),
 *     @OA\Response(
 *      response=401,
 *      description="Unauthorized",
 *      @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *      response="default",
 *      description="Unexpected Error",
 *      @OA\JsonContent()
 *     ),
 *     security={
 *      {"api_token": {}}
 *     }
 * )
 */

/**
 * @OA\Get(
 *     path="/products/{productId}",
 *     tags={"product"},
 *     summary="Info for a specific product",
 *     operationId="show",
 *     @OA\Parameter(
 *      name="productId",
 *      in="path",
 *      description="The id column of the product to retrieve",
 *      required=true,
 *      @OA\Schema(type="integer", format="int32")
 *     ),
 *     @OA\Response(
 *      response=200,
 *      description="Product detail response",
 *      @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *     ),
 *     @OA\Response(
 *      response=401,
 *      description="Unauthorized",
 *      @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *      response="default",
 *      description="Unexpected Error",
 *      @OA\JsonContent()
 *     ),
 *     security={
 *      {"api_token": {}}
 *     }
 * )
 */

/**
 * @OA\Post(
 *     path="/products",
 *     tags={"product"},
 *     summary="Create a product",
 *     operationId="store",
 *     @OA\RequestBody(
 *      description="Store a product",
 *      required=true,
 *      @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(
 *      response=201,
 *      description="Product created response",
 *      @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *     ),
 *     @OA\Response(
 *      response=401,
 *      description="Unauthorized",
 *      @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *      response="default",
 *      description="Unexpected Error",
 *      @OA\JsonContent()
 *     ),
 *     security={
 *      {"api_token": {}}
 *     }
 * )
 */

/**
 * @OA\Put(
 *     path="/products/{productId}",
 *     tags={"product"},
 *     summary="Create a product",
 *     operationId="update",
 *     @OA\Parameter(
 *      name="productId",
 *      in="path",
 *      description="The id column of the product to update",
 *      required=true,
 *      @OA\Schema(type="integer", format="int32")
 *     ),
 *     @OA\RequestBody(
 *      description="Update product",
 *      required=true,
 *      @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(
 *      response=200,
 *      description="Product update response",
 *      @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *     ),
 *     @OA\Response(
 *      response=401,
 *      description="Unauthorized",
 *      @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *      response="default",
 *      description="Unexpected Error",
 *      @OA\JsonContent()
 *     ),
 *     security={
 *      {"api_token": {}}
 *     }
 * )
 */

/**
 * @OA\Delete(
 *     path="/products/{productId}",
 *     tags={"product"},
 *     summary="Deletes a product",
 *     operationId="destroy",
 *     @OA\Parameter(
 *      name="productId",
 *      in="path",
 *      description="The id column of the product to delete",
 *      required=true,
 *      @OA\Schema(type="integer", format="int32")
 *     ),
 *     @OA\Response(
 *      response=200,
 *      description="Product delete response",
 *      @OA\JsonContent(ref="#/components/schemas/ApiResponse")
 *     ),
 *     @OA\Response(
 *      response=401,
 *      description="Unauthorized",
 *      @OA\JsonContent()
 *     ),
 *     @OA\Response(
 *      response="default",
 *      description="Unexpected Error",
 *      @OA\JsonContent()
 *     ),
 *     security={
 *      {"api_token": {}}
 *     }
 * )
 */
