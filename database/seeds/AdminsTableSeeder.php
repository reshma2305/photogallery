<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords=[
        	['id'=>1,'name'=>'admin','type'=>'admin','mobile'=>'9800000000','email'=>'admin@gmail.com','password'=>'$2y$10$KN5jHGIu1B8LaChbRZqLXuAsqtyKckbOZ5eTMxPiVwZ2Ky9XWyT76','image'=>'','status'=>1
        	],
        	['id'=>2,'name'=>'manu','type'=>'subadmin','mobile'=>'9800000000','email'=>'manu@gmail.com','password'=>'$2y$10$KN5jHGIu1B8LaChbRZqLXuAsqtyKckbOZ5eTMxPiVwZ2Ky9XWyT76','image'=>'','status'=>1
        	],
        	['id'=>3,'name'=>'akshay','type'=>'subadmin','mobile'=>'9800000000','email'=>'akshay@gmail.com','password'=>'$2y$10$KN5jHGIu1B8LaChbRZqLXuAsqtyKckbOZ5eTMxPiVwZ2Ky9XWyT76','image'=>'','status'=>1
        	],
        	['id'=>4,'name'=>'sneha','type'=>'admin','mobile'=>'9800000000','email'=>'sneha@gmail.com','password'=>'$2y$10$KN5jHGIu1B8LaChbRZqLXuAsqtyKckbOZ5eTMxPiVwZ2Ky9XWyT76','image'=>'','status'=>1
        	],
        ];

        DB::table('admins')->insert($adminRecords);
        // foreach($adminRecords as $key=>$record){
        // 	\App\Admin::create($record);
        // }
    }
}
