<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Countries;

class SqlNegara extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  DB::raw('TRUNCATE TABLE countries');
        $path = public_path('sql/countries.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql); */
        Countries::truncate();

        Countries::create( [
            'id'=>1,
            'name'=>'African Union',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>2,
            'name'=>'African',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>3,
            'name'=>'Association of Southeast Asia Nations (ASEAN)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>4,
            'name'=>'Community of Democracies (CoD)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>5,
            'name'=>'European Union (EU)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>6,
            'name'=>'International Committee of the Red Cross (ICRC)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>7,
            'name'=>'International Institute for Democracy and Electoral Assistance (IDEA)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>8,
            'name'=>'Melanesian Spearhead Group (MSG)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>9,
            'name'=>'Pacific Islands Forum (PIF)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>10,
            'name'=>'United Nations (UN)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>11,
            'name'=>'Algeria',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>12,
            'name'=>'Andorra',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>13,
            'name'=>'Argentina',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>14,
            'name'=>'Armenia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>15,
            'name'=>'Australia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>16,
            'name'=>'Austria',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>17,
            'name'=>'Azerbaijan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>18,
            'name'=>'Bahrain',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>19,
            'name'=>'Bangladesh',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>20,
            'name'=>'Belarus',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>21,
            'name'=>'Belgium',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>22,
            'name'=>'Bhutan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>23,
            'name'=>'Bosnia and Herzegovina',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>24,
            'name'=>'Brazil',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>25,
            'name'=>'Brunei Darussalam',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>26,
            'name'=>'Bulgaria',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>27,
            'name'=>'Cambodia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>28,
            'name'=>'Canada',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>29,
            'name'=>'Chile',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>30,
            'name'=>'China',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>31,
            'name'=>'Colombia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>32,
            'name'=>'Costa Rica',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>33,
            'name'=>'Croatia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>34,
            'name'=>'Cuba',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>35,
            'name'=>'Cyprus',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>36,
            'name'=>'Czech',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>37,
            'name'=>'Denmark',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>38,
            'name'=>'Ecuador',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>39,
            'name'=>'Egypt',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>40,
            'name'=>'Estonia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>41,
            'name'=>'Ethiopia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>42,
            'name'=>'Fiji',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>43,
            'name'=>'Finland',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>44,
            'name'=>'France',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>45,
            'name'=>'Georgia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>46,
            'name'=>'Germany',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>47,
            'name'=>'Ghana',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>48,
            'name'=>'Greece',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>49,
            'name'=>'Guyana',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>50,
            'name'=>'Hungary',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>51,
            'name'=>'India',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>52,
            'name'=>'Iran',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>53,
            'name'=>'Iraq',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>54,
            'name'=>'Ireland',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>55,
            'name'=>'Italy',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>56,
            'name'=>'Japan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>57,
            'name'=>'Jordan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>58,
            'name'=>'Kazakhstan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>59,
            'name'=>'Kenya',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>60,
            'name'=>'Kiribati',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>61,
            'name'=>'Korea',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>62,
            'name'=>'Kuwait',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>63,
            'name'=>'Kyrgyzstan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>64,
            'name'=>'Laos',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>65,
            'name'=>'Latvia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>66,
            'name'=>'Lebanon',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>67,
            'name'=>'Liberia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>68,
            'name'=>'Libya',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>69,
            'name'=>'Lithuania',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>70,
            'name'=>'Luxembourg',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>71,
            'name'=>'Madagascar',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>72,
            'name'=>'Malaysia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>73,
            'name'=>'Maldives',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>74,
            'name'=>'Marshall Islands',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>75,
            'name'=>'Mauritania',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>76,
            'name'=>'Mauritius',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>77,
            'name'=>'Mexico',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>78,
            'name'=>'Micronesia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>79,
            'name'=>'Mongolia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>80,
            'name'=>'Montenegro',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>81,
            'name'=>'Morocco',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>82,
            'name'=>'Mozambique',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>83,
            'name'=>'Namibia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>84,
            'name'=>'Nauru',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>85,
            'name'=>'Nepal',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>86,
            'name'=>'Netherlands',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>87,
            'name'=>'New Zealand',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>88,
            'name'=>'Nigeria',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>89,
            'name'=>'North Macedonia (FYROM)',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>90,
            'name'=>'Norway',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>91,
            'name'=>'Oman',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>92,
            'name'=>'Pakistan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>93,
            'name'=>'Palau',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>94,
            'name'=>'Palestine',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>95,
            'name'=>'Panama',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>96,
            'name'=>'Papua New Guinea',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>97,
            'name'=>'Peru',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>98,
            'name'=>'Philippines',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>99,
            'name'=>'Poland',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>100,
            'name'=>'Portugal',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>101,
            'name'=>'Qatar',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>102,
            'name'=>'Romania',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>103,
            'name'=>'Russia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>104,
            'name'=>'Samoa',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>105,
            'name'=>'San Marino',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>106,
            'name'=>'Saudi Arabia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>107,
            'name'=>'Senegal',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>108,
            'name'=>'Serbia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>109,
            'name'=>'Singapore',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>110,
            'name'=>'Slovakia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>111,
            'name'=>'Slovenia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>112,
            'name'=>'Solomon Islands',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>113,
            'name'=>'Somalia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>114,
            'name'=>'South Africa',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>115,
            'name'=>'Spain',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>116,
            'name'=>'Sri Lanka',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>117,
            'name'=>'Sudan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>118,
            'name'=>'Suriname',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>119,
            'name'=>'Sweden',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>120,
            'name'=>'Switzerland',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>121,
            'name'=>'Tajikistan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>122,
            'name'=>'Tanzania',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>123,
            'name'=>'Thailand',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>124,
            'name'=>'Timor-Leste',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>125,
            'name'=>'Tonga',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>126,
            'name'=>'Tunisia',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>127,
            'name'=>'Turkey',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>128,
            'name'=>'Turkmenistan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>129,
            'name'=>'Tuvalu',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>130,
            'name'=>'Ukraine',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>131,
            'name'=>'United Arab Emirates',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>132,
            'name'=>'United Kingdom',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>133,
            'name'=>'United States',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>134,
            'name'=>'Uruguay',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>135,
            'name'=>'Uzbekistan',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>136,
            'name'=>'Vanuatu',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>137,
            'name'=>'Venezuela',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>138,
            'name'=>'Viet Nam',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>139,
            'name'=>'Yemen',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
            
            
                        
            Countries::create( [
            'id'=>140,
            'name'=>'Zimbabwe',
            'created_at'=>'2022-11-08 17:02:55',
            'updated_at'=>'2022-11-08 17:03:44'
            ] );
    }
}
