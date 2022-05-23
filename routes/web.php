<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'homeController@index')->name('home');
Route::get('/product/{slug}', 'homeController@single')->name('product.single');
Route::get('Category/{slug}', 'CategoryController@index')->name('category.single');

Route::prefix('cart')->name('cart.')->group(function(){
  Route::get('/', 'CartController@index')->name('index');
  Route::post('add', 'CartController@add')->name('add');
  Route::get('remove/{slug}', 'CartController@remove')->name('remove');
  Route::get('cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
    Route::get('/thanks', 'CheckoutController@thanks')->name('thanks');

});

Route::get('/model', function () {
   /*  $products = \App\Product::all();
    $user = new \App\User();
    $user = \App\User::find(41);
    $user->name = "Bruno de Almeida editado";    
    $user->save();

    return $user->save();
    return \App\User::all(); 
    \App\User::find(41); retorna user pelo ID
    \App\User::where('name', 'Bruno de Almeida editado')->get(); select * from = de uma coleçao"Bruno de Almeida editado"
    return \App\User::all();
    return $products; */

    //Mass assingnment =  atribuição em massa
    /* $user = \App\User::create([
        'name' => 'Bruno teste',
        'email' => 'teste@teste.com',
        'password'=> bcrypt('123456'),     

    ]);
    dd($user); */

    //Mass Update

   /*  $user = \App\User::find(47);
    $user->update([
        'name' => 'atualizando com mass update',
        'email' => 'atualizando email com mass update',
        'password' => bcrypt('atualizando password'),
    ]); //boolean
dd($user); */

  /*   $user = \App\User::find(4);

    dd($user->store()); */

    //$loja = \App\Store::find(1);
    //return $loja->products;

    //criar uma loja para um user
        /* $user = \App\User::find(10);
        $store = $user->store()->create([
            'name' => 'Loja Teste',
            'description' =>'Loja teste para produtos de TI',
            'mobile_phone'=>'xx-xxxxx-xxxx',
            'phone'=>'xx-xxxxx-xxxx',
            'slug'=>'loja-teste',


        ]);

        dd($store); */


    //criar um produto para loja en

       /*  $store = \App\Store::find(41);
        $products = $store->products()->create([
            'name' => 'Notebook dell',
            'description' => 'CORE I5 10GB',
            'body'=> 'Notebook top de linha',
            'price'=> '1000.00',
            'slug' =>'notebook-dell',
        ]);
        dd($products);
 */
    //cria uma categoria 

     /*  $category = \App\Category::create([
        'name' =>'Games',
        'description' => null,
        'slug' =>  'games',
      ]);

      $category = \App\Category::create([
        'name' =>'notebooks',
        'description' => null,
        'slug' =>  'notebooks',
      ]);
      $category = \App\Category::create([
        'name' =>'desktop',
        'description' => null,
        'slug' =>  'desktop',
      ]);


      return \App\Category::all(); */


    //add um prod para categoria
     // $product = \App\Product::find(41);
     //dd($product->categories()->sync([2]));



    return \App\User::all();
        
});



Route::group(['middleware' =>['auth']], function(){
  Route::prefix('admin')->name('admin.')->namespace('admin')->group(function(){

    //Route::prefix('stores')->name('stores.')->group(function(){
  
      /* Route::get('/', 'StoreController@index')->name('index');
      Route::get('create', 'StoreController@create')->name('create');
      Route::post('store', 'StoreController@store')->name('store');
      Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
      Route::post('/update/{store}', 'StoreController@update')->name('update');
      Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy'); */
    
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');

    Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
  
  });

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
