<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name
    ];
});


$factory->define(App\Facebook_page::class, function (Faker\Generator $faker){
	$category = App\Category::select('id')->get();	
	$cat = array();
	foreach($category as $c)
	{
		array_push($cat,$c->id);
	}
	Log::info($cat);
	$rand_category = array_rand($cat,1);	
    return [
        'page_id' => $faker->name,
        'page_name' => $faker->name,
        'category_id' => $cat[$rand_category]
    ];
});


$factory->define(App\Website::class, function (Faker\Generator $faker){
	$category = App\Category::select('id')->get();	
	$cat = array();
	foreach($category as $c)
	{
		array_push($cat,$c->id);
	}
	$rand_category = array_rand($cat,1);	
    return [
        'address' => $faker->name,
        'category_id' => $cat[$rand_category]
    ];
});


$factory->define(App\Website::class, function (Faker\Generator $faker){
	$category = App\Category::select('id')->get();	
	$cat = array();
	foreach($category as $c)
	{
		array_push($cat,$c->id);
	}
	$rand_category = array_rand($cat,1);	
    return [
        'address' => $faker->name,
        'category_id' => $cat[$rand_category]
    ];
});


$factory->define(App\Monitor::class, function (Faker\Generator $faker){
	
	$startDate = Carbon\Carbon::createFromTimeStamp($faker->dateTimeBetween('-30 days', '+30 days')->getTimestamp());
    $endDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addMonth();

	$user = App\User::select('id')->get();	

	$userArray = array();

	$count = rand(3,8);

	foreach($user as $u)
	{
		array_push($userArray,$u->id);
	}

	$facebook = App\Facebook_page::select('id')->get();
	$fb = array();

	foreach($facebook as $f)
	{
		array_push($fb,$f->id);
	}

	$facebook = array_rand($fb,$count);	

	$website = App\Website::select('id')->get();
	$web = array();

	foreach($website as $f)
	{
		array_push($web,$f->id);
	}
	$count = rand(3,8);
	$website = array_rand($web,$count);
	
	$rand_user = array_rand($userArray,1);	

    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'user_id' => $userArray[$rand_user],
        'from_time' => $startDate,
        'to_time' => $endDate,
        'keywords' => $faker->name
    ];
});
