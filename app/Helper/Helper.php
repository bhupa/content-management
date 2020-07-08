<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com => ' <https://amitstha.com.np => '
 * Date: 10/31/18
 * Time: 10:47 AM
 */

namespace App\Helper;

use App\Models\Module;
use App\Models\SiteSetting;

class Helper
{

    public static function isGateSurpassed($module_alias, $action){
        $access = Helper::resetCollectionFirstArrayInstanceGetRole((auth('admin')->user()->adminType->access)->groupBy('module_id'));
        $module_ids = $access->keys()->toArray();
        $module_alias_array = Module::whereIn('id', $module_ids)->pluck('id', 'alias')->toArray();

        try {
            if ($access[$module_alias_array[$module_alias]][$action])
                return true;
            else
                return false;
        }catch (\Exception $e){
            return false;
        }
    }

    public static function isArrayGateSurpassed($module_alias, $action){
        $access = Helper::resetCollectionFirstArrayInstanceGetRole((auth('admin')->user()->adminType->access)->groupBy('module_id'));
        $module_ids = $access->keys()->toArray();
        $module_alias_array = Module::whereIn('id', $module_ids)->pluck('id', 'alias')->toArray();

        try {
            for($i=0; $i<count($module_alias); $i++){
                if ($access[$module_alias_array[$module_alias[$i]]][$action])
                    return true;
                else
                    return false;
            }
        }catch (\Exception $e){
            return false;
        }
    }

    public static function getCountries()
    {

        $countries = ["AF" => 'Afghanistan',
            "AL" => 'Albania',
            "DZ" => 'Algeria',
            "AD" => 'Andorra',
            "AO" => 'Angola',
            "AI" => 'Anguilla',
            "AQ" => 'Antarctica',
            "AR" => 'Argentina',
            "AM" => 'Armenia',
            "AW" => 'Aruba',
            "AU" => 'Australia',
            "AT" => 'Austria',
            "AZ" => 'Azerbaidjan',
            "BS" => 'Bahamas',
            "BH" => 'Bahrain',
            "BD" => 'Bangladesh',
            "BB" => 'Barbados',
            "BY" => 'Belarus',
            "BE" => 'Belgium',
            "BZ" => 'Belize',
            "BJ" => 'Benin',
            "BM" => 'Bermuda',
            "BT" => 'Bhutan',
            "BO" => 'Bolivia',
            "BA" => 'Bosnia-Herzegovina',
            "BW" => 'Botswana',
            "BV" => 'Bouvet Island',
            "BR" => 'Brazil',
            "BN" => 'Brunei Darussalam',
            "BG" => 'Bulgaria',
            "BF" => 'Burkina Faso',
            "BI" => 'Burundi',
            "KH" => 'Cambodia',
            "CM" => 'Cameroon',
            "CA" => 'Canada',
            "CV" => 'Cape Verde',
            "KY" => 'Cayman Islands',
            "TD" => 'Chad',
            "CL" => 'Chile',
            "CN" => 'China',
            "CX" => 'Christmas Island',
            "CO" => 'Colombia',
            "KM" => 'Comoros',
            "CG" => 'Congo',
            "CK" => 'Cook Islands',
            "CR" => 'Costa Rica',
            "HR" => 'Croatia',
            "CU" => 'Cuba',
            "CY" => 'Cyprus',
            "CZ" => 'Czech Republic',
            "DK" => 'Denmark',
            "DJ" => 'Djibouti',
            "DM" => 'Dominica',
            "DO" => 'Dominican Republic',
            "TP" => 'East Timor',
            "EC" => 'Ecuador',
            "EG" => 'Egypt',
            "SV" => 'El Salvador',
            "GQ" => 'Equatorial Guinea',
            "ER" => 'Eritrea',
            "EE" => 'Estonia',
            "ET" => 'Ethiopia',
            "FK" => 'Falkland Islands',
            "FO" => 'Faroe Islands',
            "FJ" => 'Fiji',
            "FI" => 'Finland',
            "FR" => 'France',
            "GA" => 'Gabon',
            "GM" => 'Gambia',
            "GE" => 'Georgia',
            "DE" => 'Germany',
            "GH" => 'Ghana',
            "GI" => 'Gibraltar',
            "GB" => 'Great Britain',
            "GR" => 'Greece',
            "GL" => 'Greenland',
            "GD" => 'Grenada',
            "GU" => 'Guam (USA)',
            "GT" => 'Guatemala',
            "GN" => 'Guinea',
            "GW" => 'Guinea Bissau',
            "GY" => 'Guyana',
            "HT" => 'Haiti',
            "HN" => 'Honduras',
            "HK" => 'Hong Kong',
            "HU" => 'Hungary',
            "IS" => 'Iceland',
            "IN" => 'India',
            "ID" => 'Indonesia',
            "IR" => 'Iran',
            "IQ" => 'Iraq',
            "IE" => 'Ireland',
            "IL" => 'Israel',
            "IT" => 'Italy',
            "CI" => 'Ivory Coast',
            "JM" => 'Jamaica',
            "JP" => 'Japan',
            "JO" => 'Jordan',
            "KZ" => 'Kazakhstan',
            "KE" => 'Kenya',
            "KI" => 'Kiribati',
            "KW" => 'Kuwait',
            "KG" => 'Kyrgyzstan',
            "LA" => 'Laos',
            "LV" => 'Latvia',
            "LB" => 'Lebanon',
            "LS" => 'Lesotho',
            "LR" => 'Liberia',
            "LY" => 'Libya',
            "LI" => 'Liechtenstein',
            "LT" => 'Lithuania',
            "LU" => 'Luxembourg',
            "MO" => 'Macau',
            "MK" => 'Macedonia',
            "MG" => 'Madagascar',
            "MW" => 'Malawi',
            "MY" => 'Malaysia',
            "MV" => 'Maldives',
            "ML" => 'Mali',
            "MT" => 'Malta',
            "MR" => 'Mauritania',
            "MU" => 'Mauritius',
            "YT" => 'Mayotte',
            "MX" => 'Mexico',
            "FM" => 'Micronesia',
            "MD" => 'Moldavia',
            "MC" => 'Monaco',
            "MN" => 'Mongolia',
            "MS" => 'Montserrat',
            "MA" => 'Morocco',
            "MZ" => 'Mozambique',
            "MM" => 'Myanmar',
            "NA" => 'Namibia',
            "NR" => 'Nauru',
            "NP" => 'Nepal',
            "NL" => 'Netherlands',
            "AN" => 'Netherlands Antilles',
            "NT" => 'Neutral Zone',
            "NZ" => 'New Zealand',
            "NI" => 'Nicaragua',
            "NE" => 'Niger',
            "NG" => 'Nigeria',
            "NU" => 'Niue',
            "NF" => 'Norfolk Island',
            "KP" => 'North Korea',
            "NO" => 'Norway',
            "OM" => 'Oman',
            "PK" => 'Pakistan',
            "PW" => 'Palau',
            "PA" => 'Panama',
            "PG" => 'Papua New Guinea',
            "PY" => 'Paraguay',
            "PE" => 'Peru',
            "PH" => 'Philippines',
            "PN" => 'Pitcairn Island',
            "PL" => 'Poland',
            "PF" => 'Polynesia (French)',
            "PT" => 'Portugal',
            "PR" => 'Puerto Rico',
            "QA" => 'Qatar',
            "RE" => 'Reunion (French)',
            "RO" => 'Romania',
            "RU" => 'Russian Federation',
            "RW" => 'Rwanda',
            "SH" => 'Saint Helena',
            "LC" => 'Saint Lucia',
            "WS" => 'Samoa',
            "SM" => 'San Marino',
            "SA" => 'Saudi Arabia',
            "SN" => 'Senegal',
            "SC" => 'Seychelles',
            "SL" => 'Sierra Leone',
            "SG" => 'Singapore',
            "SK" => 'Slovak Republic',
            "SI" => 'Slovenia',
            "SB" => 'Solomon Islands',
            "SO" => 'Somalia',
            "ZA" => 'South Africa',
            "KR" => 'South Korea',
            "ES" => 'Spain',
            "LK" => 'Sri Lanka',
            "SD" => 'Sudan',
            "SR" => 'Suriname',
            "SZ" => 'Swaziland',
            "SE" => 'Sweden',
            "CH" => 'Switzerland',
            "SY" => 'Syria',
            "TJ" => 'Tadjikistan',
            "TW" => 'Taiwan',
            "TZ" => 'Tanzania',
            "TH" => 'Thailand',
            "TG" => 'Togo',
            "TK" => 'Tokelau',
            "TO" => 'Tonga',
            "TT" => 'Trinidad and Tobago',
            "TN" => 'Tunisia',
            "TR" => 'Turkey',
            "TM" => 'Turkmenistan',
            "TV" => 'Tuvalu',
            "UG" => 'Uganda',
            "UA" => 'Ukraine',
            "AE" => 'United Arab Emirates',
            "UK" => 'United Kingdom',
            "US" => 'United States',
            "UY" => 'Uruguay',
            "UZ" => 'Uzbekistan',
            "VU" => 'Vanuatu',
            "VA" => 'Vatican City State',
            "VE" => 'Venezuela',
            "VN" => 'Vietnam',
            "EH" => 'Western Sahara',
            "YE" => 'Yemen',
            "YU" => 'Yugoslavia',
            "ZR" => 'Zaire',
            "ZM" => 'Zambia',
            "ZW" => 'Zimbabwe'
        ];

        return $countries;
    }

    public static function getCurrentDateTime()
    {
        return date("Y-m-d H:i:s");
    }

    public static function resetCollectionFirstArrayInstance($collection)
    {

        $new_collection = [];
        foreach ($collection as $module_id => $data) {
            $new_collection[$module_id] = $data[0];
        }

        return \Illuminate\Support\Collection::make($new_collection);

    }

    public static function resetCollectionFirstArrayInstanceGetRole($collection)
    {
        $new_collection = [];
        foreach ($collection as $module_id => $data) {
            $new_collection[$module_id]['view'] = $data[0]->view;
            $new_collection[$module_id]['add'] = $data[0]->add;
            $new_collection[$module_id]['edit'] = $data[0]->edit;
            $new_collection[$module_id]['delete'] = $data[0]->delete;
            $new_collection[$module_id]['changeStatus'] = $data[0]->changeStatus;
        }

        return \Illuminate\Support\Collection::make($new_collection);

    }

        public static function get_neapl_Address(){
        return SiteSetting::where('is_active',1)->where('key','nepal_address')->value('description');
    }

         public static function get_neapl_Contact(){
        return SiteSetting::where('is_active',1)->where('key','nepal_contact')->value('description');
    }

      public static function get_neapl_Gmail(){
        return SiteSetting::where('is_active',1)->where('key','nepal_gamil')->value('description');
    }


         public static function get_new_york_Address(){
        return SiteSetting::where('is_active',1)->where('key','new_york_address')->value('description');
    }

         public static function get_new_york_Contact(){
        return SiteSetting::where('is_active',1)->where('key','new_york_contact')->value('description');
    }

      public static function get_new_york_Gmail(){
        return SiteSetting::where('is_active',1)->where('key','new_york_gmail')->value('description');
    }


       public static function get_canada_Address(){
        return SiteSetting::where('is_active',1)->where('key','canada_address')->value('description');
    }

         public static function get_canada_Contact(){
        return SiteSetting::where('is_active',1)->where('key','canada_contact')->value('description');
    }

      public static function get_canada_Gmail(){
        return SiteSetting::where('is_active',1)->where('key','canada_gmail')->value('description');
    }
}
