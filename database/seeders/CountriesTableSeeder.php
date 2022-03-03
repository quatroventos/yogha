<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nome' => 'Brazil',
                'nome_pt' => 'Brasil',
                'sigla' => 'BR',
                'bacen' => 1058,
            ),
            1 => 
            array (
                'id' => 2,
                'nome' => 'Afghanistan',
                'nome_pt' => 'Afeganistão',
                'sigla' => 'AF',
                'bacen' => 132,
            ),
            2 => 
            array (
                'id' => 3,
                'nome' => 'Albania',
                'nome_pt' => 'Albânia, Republica da',
                'sigla' => 'AL',
                'bacen' => 175,
            ),
            3 => 
            array (
                'id' => 4,
                'nome' => 'Algeria',
                'nome_pt' => 'Argélia',
                'sigla' => 'DZ',
                'bacen' => 590,
            ),
            4 => 
            array (
                'id' => 5,
                'nome' => 'American Samoa',
                'nome_pt' => 'Samoa Americana',
                'sigla' => 'AS',
                'bacen' => 6912,
            ),
            5 => 
            array (
                'id' => 6,
                'nome' => 'Andorra',
                'nome_pt' => 'Andorra',
                'sigla' => 'AD',
                'bacen' => 370,
            ),
            6 => 
            array (
                'id' => 7,
                'nome' => 'Angola',
                'nome_pt' => 'Angola',
                'sigla' => 'AO',
                'bacen' => 400,
            ),
            7 => 
            array (
                'id' => 8,
                'nome' => 'Anguilla',
                'nome_pt' => 'Anguilla',
                'sigla' => 'AI',
                'bacen' => 418,
            ),
            8 => 
            array (
                'id' => 9,
                'nome' => 'Antarctica',
                'nome_pt' => 'Antártida',
                'sigla' => 'AQ',
                'bacen' => 3596,
            ),
            9 => 
            array (
                'id' => 10,
                'nome' => 'Antigua and Barbuda',
                'nome_pt' => 'Antigua e Barbuda',
                'sigla' => 'AG',
                'bacen' => 434,
            ),
            10 => 
            array (
                'id' => 11,
                'nome' => 'Argentina',
                'nome_pt' => 'Argentina',
                'sigla' => 'AR',
                'bacen' => 639,
            ),
            11 => 
            array (
                'id' => 12,
                'nome' => 'Armenia',
                'nome_pt' => 'Armênia, Republica da',
                'sigla' => 'AM',
                'bacen' => 647,
            ),
            12 => 
            array (
                'id' => 13,
                'nome' => 'Aruba',
                'nome_pt' => 'Aruba',
                'sigla' => 'AW',
                'bacen' => 655,
            ),
            13 => 
            array (
                'id' => 14,
                'nome' => 'Australia',
                'nome_pt' => 'Austrália',
                'sigla' => 'AU',
                'bacen' => 698,
            ),
            14 => 
            array (
                'id' => 15,
                'nome' => 'Austria',
                'nome_pt' => 'Áustria',
                'sigla' => 'AT',
                'bacen' => 728,
            ),
            15 => 
            array (
                'id' => 16,
                'nome' => 'Azerbaijan',
                'nome_pt' => 'Azerbaijão, Republica do',
                'sigla' => 'AZ',
                'bacen' => 736,
            ),
            16 => 
            array (
                'id' => 17,
                'nome' => 'Bahamas',
                'nome_pt' => 'Bahamas, Ilhas',
                'sigla' => 'BS',
                'bacen' => 779,
            ),
            17 => 
            array (
                'id' => 18,
                'nome' => 'Bahrain',
                'nome_pt' => 'Bahrein, Ilhas',
                'sigla' => 'BH',
                'bacen' => 809,
            ),
            18 => 
            array (
                'id' => 19,
                'nome' => 'Bangladesh',
                'nome_pt' => 'Bangladesh',
                'sigla' => 'BD',
                'bacen' => 817,
            ),
            19 => 
            array (
                'id' => 20,
                'nome' => 'Barbados',
                'nome_pt' => 'Barbados',
                'sigla' => 'BB',
                'bacen' => 833,
            ),
            20 => 
            array (
                'id' => 21,
                'nome' => 'Belarus',
                'nome_pt' => 'Belarus, Republica da',
                'sigla' => 'BY',
                'bacen' => 850,
            ),
            21 => 
            array (
                'id' => 22,
                'nome' => 'Belgium',
                'nome_pt' => 'Bélgica',
                'sigla' => 'BE',
                'bacen' => 876,
            ),
            22 => 
            array (
                'id' => 23,
                'nome' => 'Belize',
                'nome_pt' => 'Belize',
                'sigla' => 'BZ',
                'bacen' => 884,
            ),
            23 => 
            array (
                'id' => 24,
                'nome' => 'Benin',
                'nome_pt' => 'Benin',
                'sigla' => 'BJ',
                'bacen' => 2291,
            ),
            24 => 
            array (
                'id' => 25,
                'nome' => 'Bermuda',
                'nome_pt' => 'Bermudas',
                'sigla' => 'BM',
                'bacen' => 906,
            ),
            25 => 
            array (
                'id' => 26,
                'nome' => 'Bhutan',
                'nome_pt' => 'Butão',
                'sigla' => 'BT',
                'bacen' => 1198,
            ),
            26 => 
            array (
                'id' => 27,
                'nome' => 'Bolivia',
                'nome_pt' => 'Bolívia',
                'sigla' => 'BO',
                'bacen' => 973,
            ),
            27 => 
            array (
                'id' => 28,
                'nome' => 'Bosnia and Herzegowina',
            'nome_pt' => 'Bósnia-herzegovina (Republica da)',
                'sigla' => 'BA',
                'bacen' => 981,
            ),
            28 => 
            array (
                'id' => 29,
                'nome' => 'Botswana',
                'nome_pt' => 'Botsuana',
                'sigla' => 'BW',
                'bacen' => 1015,
            ),
            29 => 
            array (
                'id' => 30,
                'nome' => 'Bouvet Island',
                'nome_pt' => 'Bouvet, Ilha',
                'sigla' => 'BV',
                'bacen' => 1023,
            ),
            30 => 
            array (
                'id' => 31,
                'nome' => 'British Indian Ocean Territory',
                'nome_pt' => 'Território Britânico do Oceano Indico',
                'sigla' => 'IO',
                'bacen' => 7820,
            ),
            31 => 
            array (
                'id' => 32,
                'nome' => 'Brunei Darussalam',
                'nome_pt' => 'Brunei',
                'sigla' => 'BN',
                'bacen' => 1082,
            ),
            32 => 
            array (
                'id' => 33,
                'nome' => 'Bulgaria',
                'nome_pt' => 'Bulgária, Republica da',
                'sigla' => 'BG',
                'bacen' => 1112,
            ),
            33 => 
            array (
                'id' => 34,
                'nome' => 'Burkina Faso',
                'nome_pt' => 'Burkina Faso',
                'sigla' => 'BF',
                'bacen' => 310,
            ),
            34 => 
            array (
                'id' => 35,
                'nome' => 'Burundi',
                'nome_pt' => 'Burundi',
                'sigla' => 'BI',
                'bacen' => 1155,
            ),
            35 => 
            array (
                'id' => 36,
                'nome' => 'Cambodia',
                'nome_pt' => 'Camboja',
                'sigla' => 'KH',
                'bacen' => 1414,
            ),
            36 => 
            array (
                'id' => 37,
                'nome' => 'Cameroon',
                'nome_pt' => 'Camarões',
                'sigla' => 'CM',
                'bacen' => 1457,
            ),
            37 => 
            array (
                'id' => 38,
                'nome' => 'Canada',
                'nome_pt' => 'Canada',
                'sigla' => 'CA',
                'bacen' => 1490,
            ),
            38 => 
            array (
                'id' => 39,
                'nome' => 'Cape Verde',
                'nome_pt' => 'Cabo Verde, Republica de',
                'sigla' => 'CV',
                'bacen' => 1279,
            ),
            39 => 
            array (
                'id' => 40,
                'nome' => 'Cayman Islands',
                'nome_pt' => 'Cayman, Ilhas',
                'sigla' => 'KY',
                'bacen' => 1376,
            ),
            40 => 
            array (
                'id' => 41,
                'nome' => 'Central African Republic',
                'nome_pt' => 'Republica Centro-Africana',
                'sigla' => 'CF',
                'bacen' => 6408,
            ),
            41 => 
            array (
                'id' => 42,
                'nome' => 'Chad',
                'nome_pt' => 'Chade',
                'sigla' => 'TD',
                'bacen' => 7889,
            ),
            42 => 
            array (
                'id' => 43,
                'nome' => 'Chile',
                'nome_pt' => 'Chile',
                'sigla' => 'CL',
                'bacen' => 1589,
            ),
            43 => 
            array (
                'id' => 44,
                'nome' => 'China',
                'nome_pt' => 'China, Republica Popular',
                'sigla' => 'CN',
                'bacen' => 1600,
            ),
            44 => 
            array (
                'id' => 45,
                'nome' => 'Christmas Island',
            'nome_pt' => 'Christmas, Ilha (Navidad)',
                'sigla' => 'CX',
                'bacen' => 5118,
            ),
            45 => 
            array (
                'id' => 46,
            'nome' => 'Cocos (Keeling) Islands',
            'nome_pt' => 'Cocos (Keeling), Ilhas',
                'sigla' => 'CC',
                'bacen' => 1651,
            ),
            46 => 
            array (
                'id' => 47,
                'nome' => 'Colombia',
                'nome_pt' => 'Colômbia',
                'sigla' => 'CO',
                'bacen' => 1694,
            ),
            47 => 
            array (
                'id' => 48,
                'nome' => 'Comoros',
                'nome_pt' => 'Comores, Ilhas',
                'sigla' => 'KM',
                'bacen' => 1732,
            ),
            48 => 
            array (
                'id' => 49,
                'nome' => 'Congo',
                'nome_pt' => 'Congo',
                'sigla' => 'CG',
                'bacen' => 1775,
            ),
            49 => 
            array (
                'id' => 50,
                'nome' => 'Congo, the Democratic Republic of the',
                'nome_pt' => 'Congo, Republica Democrática do',
                'sigla' => 'CD',
                'bacen' => 8885,
            ),
            50 => 
            array (
                'id' => 51,
                'nome' => 'Cook Islands',
                'nome_pt' => 'Cook, Ilhas',
                'sigla' => 'CK',
                'bacen' => 1830,
            ),
            51 => 
            array (
                'id' => 52,
                'nome' => 'Costa Rica',
                'nome_pt' => 'Costa Rica',
                'sigla' => 'CR',
                'bacen' => 1961,
            ),
            52 => 
            array (
                'id' => 53,
                'nome' => 'Cote d`Ivoire',
                'nome_pt' => 'Costa do Marfim',
                'sigla' => 'CI',
                'bacen' => 1937,
            ),
            53 => 
            array (
                'id' => 54,
            'nome' => 'Croatia (Hrvatska)',
            'nome_pt' => 'Croácia (Republica da)',
                'sigla' => 'HR',
                'bacen' => 1953,
            ),
            54 => 
            array (
                'id' => 55,
                'nome' => 'Cuba',
                'nome_pt' => 'Cuba',
                'sigla' => 'CU',
                'bacen' => 1996,
            ),
            55 => 
            array (
                'id' => 56,
                'nome' => 'Cyprus',
                'nome_pt' => 'Chipre',
                'sigla' => 'CY',
                'bacen' => 1635,
            ),
            56 => 
            array (
                'id' => 57,
                'nome' => 'Czech Republic',
                'nome_pt' => 'Tcheca, Republica',
                'sigla' => 'CZ',
                'bacen' => 7919,
            ),
            57 => 
            array (
                'id' => 58,
                'nome' => 'Denmark',
                'nome_pt' => 'Dinamarca',
                'sigla' => 'DK',
                'bacen' => 2321,
            ),
            58 => 
            array (
                'id' => 59,
                'nome' => 'Djibouti',
                'nome_pt' => 'Djibuti',
                'sigla' => 'DJ',
                'bacen' => 7838,
            ),
            59 => 
            array (
                'id' => 60,
                'nome' => 'Dominica',
                'nome_pt' => 'Dominica, Ilha',
                'sigla' => 'DM',
                'bacen' => 2356,
            ),
            60 => 
            array (
                'id' => 61,
                'nome' => 'Dominican Republic',
                'nome_pt' => 'Republica Dominicana',
                'sigla' => 'DO',
                'bacen' => 6475,
            ),
            61 => 
            array (
                'id' => 62,
                'nome' => 'East Timor',
                'nome_pt' => 'Timor Leste',
                'sigla' => 'TL',
                'bacen' => 7951,
            ),
            62 => 
            array (
                'id' => 63,
                'nome' => 'Ecuador',
                'nome_pt' => 'Equador',
                'sigla' => 'EC',
                'bacen' => 2399,
            ),
            63 => 
            array (
                'id' => 64,
                'nome' => 'Egypt',
                'nome_pt' => 'Egito',
                'sigla' => 'EG',
                'bacen' => 2402,
            ),
            64 => 
            array (
                'id' => 65,
                'nome' => 'El Salvador',
                'nome_pt' => 'El Salvador',
                'sigla' => 'SV',
                'bacen' => 6874,
            ),
            65 => 
            array (
                'id' => 66,
                'nome' => 'Equatorial Guinea',
                'nome_pt' => 'Guine-Equatorial',
                'sigla' => 'GQ',
                'bacen' => 3310,
            ),
            66 => 
            array (
                'id' => 67,
                'nome' => 'Eritrea',
                'nome_pt' => 'Eritreia',
                'sigla' => 'ER',
                'bacen' => 2437,
            ),
            67 => 
            array (
                'id' => 68,
                'nome' => 'Estonia',
                'nome_pt' => 'Estônia, Republica da',
                'sigla' => 'EE',
                'bacen' => 2518,
            ),
            68 => 
            array (
                'id' => 69,
                'nome' => 'Ethiopia',
                'nome_pt' => 'Etiópia',
                'sigla' => 'ET',
                'bacen' => 2534,
            ),
            69 => 
            array (
                'id' => 70,
            'nome' => 'Falkland Islands (Malvinas)',
            'nome_pt' => 'Falkland (Ilhas Malvinas)',
                'sigla' => 'FK',
                'bacen' => 2550,
            ),
            70 => 
            array (
                'id' => 71,
                'nome' => 'Faroe Islands',
                'nome_pt' => 'Feroe, Ilhas',
                'sigla' => 'FO',
                'bacen' => 2593,
            ),
            71 => 
            array (
                'id' => 72,
                'nome' => 'Fiji',
                'nome_pt' => 'Fiji',
                'sigla' => 'FJ',
                'bacen' => 8702,
            ),
            72 => 
            array (
                'id' => 73,
                'nome' => 'Finland',
                'nome_pt' => 'Finlândia',
                'sigla' => 'FI',
                'bacen' => 2712,
            ),
            73 => 
            array (
                'id' => 74,
                'nome' => 'France',
                'nome_pt' => 'Franca',
                'sigla' => 'FR',
                'bacen' => 2755,
            ),
            74 => 
            array (
                'id' => 76,
                'nome' => 'French Guiana',
                'nome_pt' => 'Guiana francesa',
                'sigla' => 'GF',
                'bacen' => 3255,
            ),
            75 => 
            array (
                'id' => 77,
                'nome' => 'French Polynesia',
                'nome_pt' => 'Polinésia Francesa',
                'sigla' => 'PF',
                'bacen' => 5991,
            ),
            76 => 
            array (
                'id' => 78,
                'nome' => 'French Southern Territories',
                'nome_pt' => 'Terras Austrais e Antárticas Francesas',
                'sigla' => 'TF',
                'bacen' => 3607,
            ),
            77 => 
            array (
                'id' => 79,
                'nome' => 'Gabon',
                'nome_pt' => 'Gabão',
                'sigla' => 'GA',
                'bacen' => 2810,
            ),
            78 => 
            array (
                'id' => 80,
                'nome' => 'Gambia',
                'nome_pt' => 'Gambia',
                'sigla' => 'GM',
                'bacen' => 2852,
            ),
            79 => 
            array (
                'id' => 81,
                'nome' => 'Georgia',
                'nome_pt' => 'Georgia, Republica da',
                'sigla' => 'GE',
                'bacen' => 2917,
            ),
            80 => 
            array (
                'id' => 82,
                'nome' => 'Germany',
                'nome_pt' => 'Alemanha',
                'sigla' => 'DE',
                'bacen' => 230,
            ),
            81 => 
            array (
                'id' => 83,
                'nome' => 'Ghana',
                'nome_pt' => 'Gana',
                'sigla' => 'GH',
                'bacen' => 2895,
            ),
            82 => 
            array (
                'id' => 84,
                'nome' => 'Gibraltar',
                'nome_pt' => 'Gibraltar',
                'sigla' => 'GI',
                'bacen' => 2933,
            ),
            83 => 
            array (
                'id' => 85,
                'nome' => 'Greece',
                'nome_pt' => 'Grécia',
                'sigla' => 'GR',
                'bacen' => 3018,
            ),
            84 => 
            array (
                'id' => 86,
                'nome' => 'Greenland',
                'nome_pt' => 'Groenlândia',
                'sigla' => 'GL',
                'bacen' => 3050,
            ),
            85 => 
            array (
                'id' => 87,
                'nome' => 'Grenada',
                'nome_pt' => 'Granada',
                'sigla' => 'GD',
                'bacen' => 2976,
            ),
            86 => 
            array (
                'id' => 88,
                'nome' => 'Guadeloupe',
                'nome_pt' => 'Guadalupe',
                'sigla' => 'GP',
                'bacen' => 3093,
            ),
            87 => 
            array (
                'id' => 89,
                'nome' => 'Guam',
                'nome_pt' => 'Guam',
                'sigla' => 'GU',
                'bacen' => 3131,
            ),
            88 => 
            array (
                'id' => 90,
                'nome' => 'Guatemala',
                'nome_pt' => 'Guatemala',
                'sigla' => 'GT',
                'bacen' => 3174,
            ),
            89 => 
            array (
                'id' => 91,
                'nome' => 'Guinea',
                'nome_pt' => 'Guine',
                'sigla' => 'GN',
                'bacen' => 3298,
            ),
            90 => 
            array (
                'id' => 92,
                'nome' => 'Guinea-Bissau',
                'nome_pt' => 'Guine-Bissau',
                'sigla' => 'GW',
                'bacen' => 3344,
            ),
            91 => 
            array (
                'id' => 93,
                'nome' => 'Guyana',
                'nome_pt' => 'Guiana',
                'sigla' => 'GY',
                'bacen' => 3379,
            ),
            92 => 
            array (
                'id' => 94,
                'nome' => 'Haiti',
                'nome_pt' => 'Haiti',
                'sigla' => 'HT',
                'bacen' => 3417,
            ),
            93 => 
            array (
                'id' => 95,
                'nome' => 'Heard and Mc Donald Islands',
                'nome_pt' => 'Ilha Heard e Ilhas McDonald',
                'sigla' => 'HM',
                'bacen' => 3603,
            ),
            94 => 
            array (
                'id' => 96,
            'nome' => 'Holy See (Vatican City State)',
                'nome_pt' => 'Vaticano, Estado da Cidade do',
                'sigla' => 'VA',
                'bacen' => 8486,
            ),
            95 => 
            array (
                'id' => 97,
                'nome' => 'Honduras',
                'nome_pt' => 'Honduras',
                'sigla' => 'HN',
                'bacen' => 3450,
            ),
            96 => 
            array (
                'id' => 98,
                'nome' => 'Hong Kong',
                'nome_pt' => 'Hong Kong',
                'sigla' => 'HK',
                'bacen' => 3514,
            ),
            97 => 
            array (
                'id' => 99,
                'nome' => 'Hungary',
                'nome_pt' => 'Hungria, Republica da',
                'sigla' => 'HU',
                'bacen' => 3557,
            ),
            98 => 
            array (
                'id' => 100,
                'nome' => 'Iceland',
                'nome_pt' => 'Islândia',
                'sigla' => 'IS',
                'bacen' => 3794,
            ),
            99 => 
            array (
                'id' => 101,
                'nome' => 'India',
                'nome_pt' => 'Índia',
                'sigla' => 'IN',
                'bacen' => 3611,
            ),
            100 => 
            array (
                'id' => 102,
                'nome' => 'Indonesia',
                'nome_pt' => 'Indonésia',
                'sigla' => 'ID',
                'bacen' => 3654,
            ),
            101 => 
            array (
                'id' => 103,
            'nome' => 'Iran (Islamic Republic of)',
                'nome_pt' => 'Ira, Republica Islâmica do',
                'sigla' => 'IR',
                'bacen' => 3727,
            ),
            102 => 
            array (
                'id' => 104,
                'nome' => 'Iraq',
                'nome_pt' => 'Iraque',
                'sigla' => 'IQ',
                'bacen' => 3697,
            ),
            103 => 
            array (
                'id' => 105,
                'nome' => 'Ireland',
                'nome_pt' => 'Irlanda',
                'sigla' => 'IE',
                'bacen' => 3751,
            ),
            104 => 
            array (
                'id' => 106,
                'nome' => 'Israel',
                'nome_pt' => 'Israel',
                'sigla' => 'IL',
                'bacen' => 3832,
            ),
            105 => 
            array (
                'id' => 107,
                'nome' => 'Italy',
                'nome_pt' => 'Itália',
                'sigla' => 'IT',
                'bacen' => 3867,
            ),
            106 => 
            array (
                'id' => 108,
                'nome' => 'Jamaica',
                'nome_pt' => 'Jamaica',
                'sigla' => 'JM',
                'bacen' => 3913,
            ),
            107 => 
            array (
                'id' => 109,
                'nome' => 'Japan',
                'nome_pt' => 'Japão',
                'sigla' => 'JP',
                'bacen' => 3999,
            ),
            108 => 
            array (
                'id' => 110,
                'nome' => 'Jordan',
                'nome_pt' => 'Jordânia',
                'sigla' => 'JO',
                'bacen' => 4030,
            ),
            109 => 
            array (
                'id' => 111,
                'nome' => 'Kazakhstan',
                'nome_pt' => 'Cazaquistão, Republica do',
                'sigla' => 'KZ',
                'bacen' => 1538,
            ),
            110 => 
            array (
                'id' => 112,
                'nome' => 'Kenya',
                'nome_pt' => 'Quênia',
                'sigla' => 'KE',
                'bacen' => 6238,
            ),
            111 => 
            array (
                'id' => 113,
                'nome' => 'Kiribati',
                'nome_pt' => 'Kiribati',
                'sigla' => 'KI',
                'bacen' => 4111,
            ),
            112 => 
            array (
                'id' => 114,
                'nome' => 'Korea, Democratic People`s Republic of',
                'nome_pt' => 'Coreia, Republica Popular Democrática da',
                'sigla' => 'KP',
                'bacen' => 1872,
            ),
            113 => 
            array (
                'id' => 115,
                'nome' => 'Korea, Republic of',
                'nome_pt' => 'Coreia, Republica da',
                'sigla' => 'KR',
                'bacen' => 1902,
            ),
            114 => 
            array (
                'id' => 116,
                'nome' => 'Kuwait',
                'nome_pt' => 'Kuwait',
                'sigla' => 'KW',
                'bacen' => 1988,
            ),
            115 => 
            array (
                'id' => 117,
                'nome' => 'Kyrgyzstan',
                'nome_pt' => 'Quirguiz, Republica',
                'sigla' => 'KG',
                'bacen' => 6254,
            ),
            116 => 
            array (
                'id' => 118,
                'nome' => 'Lao People`s Democratic Republic',
                'nome_pt' => 'Laos, Republica Popular Democrática do',
                'sigla' => 'LA',
                'bacen' => 4200,
            ),
            117 => 
            array (
                'id' => 119,
                'nome' => 'Latvia',
                'nome_pt' => 'Letônia, Republica da',
                'sigla' => 'LV',
                'bacen' => 4278,
            ),
            118 => 
            array (
                'id' => 120,
                'nome' => 'Lebanon',
                'nome_pt' => 'Líbano',
                'sigla' => 'LB',
                'bacen' => 4316,
            ),
            119 => 
            array (
                'id' => 121,
                'nome' => 'Lesotho',
                'nome_pt' => 'Lesoto',
                'sigla' => 'LS',
                'bacen' => 4260,
            ),
            120 => 
            array (
                'id' => 122,
                'nome' => 'Liberia',
                'nome_pt' => 'Libéria',
                'sigla' => 'LR',
                'bacen' => 4340,
            ),
            121 => 
            array (
                'id' => 123,
                'nome' => 'Libyan Arab Jamahiriya',
                'nome_pt' => 'Líbia',
                'sigla' => 'LY',
                'bacen' => 4383,
            ),
            122 => 
            array (
                'id' => 124,
                'nome' => 'Liechtenstein',
                'nome_pt' => 'Liechtenstein',
                'sigla' => 'LI',
                'bacen' => 4405,
            ),
            123 => 
            array (
                'id' => 125,
                'nome' => 'Lithuania',
                'nome_pt' => 'Lituânia, Republica da',
                'sigla' => 'LT',
                'bacen' => 4421,
            ),
            124 => 
            array (
                'id' => 126,
                'nome' => 'Luxembourg',
                'nome_pt' => 'Luxemburgo',
                'sigla' => 'LU',
                'bacen' => 4456,
            ),
            125 => 
            array (
                'id' => 127,
                'nome' => 'Macau',
                'nome_pt' => 'Macau',
                'sigla' => 'MO',
                'bacen' => 4472,
            ),
            126 => 
            array (
                'id' => 128,
                'nome' => 'North Macedonia',
                'nome_pt' => 'Macedônia do Norte',
                'sigla' => 'MK',
                'bacen' => 4499,
            ),
            127 => 
            array (
                'id' => 129,
                'nome' => 'Madagascar',
                'nome_pt' => 'Madagascar',
                'sigla' => 'MG',
                'bacen' => 4502,
            ),
            128 => 
            array (
                'id' => 130,
                'nome' => 'Malawi',
                'nome_pt' => 'Malavi',
                'sigla' => 'MW',
                'bacen' => 4588,
            ),
            129 => 
            array (
                'id' => 131,
                'nome' => 'Malaysia',
                'nome_pt' => 'Malásia',
                'sigla' => 'MY',
                'bacen' => 4553,
            ),
            130 => 
            array (
                'id' => 132,
                'nome' => 'Maldives',
                'nome_pt' => 'Maldivas',
                'sigla' => 'MV',
                'bacen' => 4618,
            ),
            131 => 
            array (
                'id' => 133,
                'nome' => 'Mali',
                'nome_pt' => 'Mali',
                'sigla' => 'ML',
                'bacen' => 4642,
            ),
            132 => 
            array (
                'id' => 134,
                'nome' => 'Malta',
                'nome_pt' => 'Malta',
                'sigla' => 'MT',
                'bacen' => 4677,
            ),
            133 => 
            array (
                'id' => 135,
                'nome' => 'Marshall Islands',
                'nome_pt' => 'Marshall, Ilhas',
                'sigla' => 'MH',
                'bacen' => 4766,
            ),
            134 => 
            array (
                'id' => 136,
                'nome' => 'Martinique',
                'nome_pt' => 'Martinica',
                'sigla' => 'MQ',
                'bacen' => 4774,
            ),
            135 => 
            array (
                'id' => 137,
                'nome' => 'Mauritania',
                'nome_pt' => 'Mauritânia',
                'sigla' => 'MR',
                'bacen' => 4880,
            ),
            136 => 
            array (
                'id' => 138,
                'nome' => 'Mauritius',
                'nome_pt' => 'Mauricio',
                'sigla' => 'MU',
                'bacen' => 4855,
            ),
            137 => 
            array (
                'id' => 139,
                'nome' => 'Mayotte',
            'nome_pt' => 'Mayotte (Ilhas Francesas)',
                'sigla' => 'YT',
                'bacen' => 4885,
            ),
            138 => 
            array (
                'id' => 140,
                'nome' => 'Mexico',
                'nome_pt' => 'México',
                'sigla' => 'MX',
                'bacen' => 4936,
            ),
            139 => 
            array (
                'id' => 141,
                'nome' => 'Micronesia, Federated States of',
                'nome_pt' => 'Micronesia',
                'sigla' => 'FM',
                'bacen' => 4995,
            ),
            140 => 
            array (
                'id' => 142,
                'nome' => 'Moldova, Republic of',
                'nome_pt' => 'Moldávia, Republica da',
                'sigla' => 'MD',
                'bacen' => 4944,
            ),
            141 => 
            array (
                'id' => 143,
                'nome' => 'Monaco',
                'nome_pt' => 'Mônaco',
                'sigla' => 'MC',
                'bacen' => 4952,
            ),
            142 => 
            array (
                'id' => 144,
                'nome' => 'Mongolia',
                'nome_pt' => 'Mongólia',
                'sigla' => 'MN',
                'bacen' => 4979,
            ),
            143 => 
            array (
                'id' => 145,
                'nome' => 'Montserrat',
                'nome_pt' => 'Montserrat, Ilhas',
                'sigla' => 'MS',
                'bacen' => 5010,
            ),
            144 => 
            array (
                'id' => 146,
                'nome' => 'Morocco',
                'nome_pt' => 'Marrocos',
                'sigla' => 'MA',
                'bacen' => 4740,
            ),
            145 => 
            array (
                'id' => 147,
                'nome' => 'Mozambique',
                'nome_pt' => 'Moçambique',
                'sigla' => 'MZ',
                'bacen' => 5053,
            ),
            146 => 
            array (
                'id' => 148,
                'nome' => 'Myanmar',
            'nome_pt' => 'Mianmar (Birmânia)',
                'sigla' => 'MM',
                'bacen' => 930,
            ),
            147 => 
            array (
                'id' => 149,
                'nome' => 'Namibia',
                'nome_pt' => 'Namíbia',
                'sigla' => 'NA',
                'bacen' => 5070,
            ),
            148 => 
            array (
                'id' => 150,
                'nome' => 'Nauru',
                'nome_pt' => 'Nauru',
                'sigla' => 'NR',
                'bacen' => 5088,
            ),
            149 => 
            array (
                'id' => 151,
                'nome' => 'Nepal',
                'nome_pt' => 'Nepal',
                'sigla' => 'NP',
                'bacen' => 5177,
            ),
            150 => 
            array (
                'id' => 152,
                'nome' => 'Netherlands',
            'nome_pt' => 'Países Baixos (Holanda)',
                'sigla' => 'NL',
                'bacen' => 5738,
            ),
            151 => 
            array (
                'id' => 154,
                'nome' => 'New Caledonia',
                'nome_pt' => 'Nova Caledonia',
                'sigla' => 'NC',
                'bacen' => 5428,
            ),
            152 => 
            array (
                'id' => 155,
                'nome' => 'New Zealand',
                'nome_pt' => 'Nova Zelândia',
                'sigla' => 'NZ',
                'bacen' => 5487,
            ),
            153 => 
            array (
                'id' => 156,
                'nome' => 'Nicaragua',
                'nome_pt' => 'Nicarágua',
                'sigla' => 'NI',
                'bacen' => 5215,
            ),
            154 => 
            array (
                'id' => 157,
                'nome' => 'Niger',
                'nome_pt' => 'Níger',
                'sigla' => 'NE',
                'bacen' => 5258,
            ),
            155 => 
            array (
                'id' => 158,
                'nome' => 'Nigeria',
                'nome_pt' => 'Nigéria',
                'sigla' => 'NG',
                'bacen' => 5282,
            ),
            156 => 
            array (
                'id' => 159,
                'nome' => 'Niue',
                'nome_pt' => 'Niue, Ilha',
                'sigla' => 'NU',
                'bacen' => 5312,
            ),
            157 => 
            array (
                'id' => 160,
                'nome' => 'Norfolk Island',
                'nome_pt' => 'Norfolk, Ilha',
                'sigla' => 'NF',
                'bacen' => 5355,
            ),
            158 => 
            array (
                'id' => 161,
                'nome' => 'Northern Mariana Islands',
                'nome_pt' => 'Marianas do Norte',
                'sigla' => 'MP',
                'bacen' => 4723,
            ),
            159 => 
            array (
                'id' => 162,
                'nome' => 'Norway',
                'nome_pt' => 'Noruega',
                'sigla' => 'NO',
                'bacen' => 5380,
            ),
            160 => 
            array (
                'id' => 163,
                'nome' => 'Oman',
                'nome_pt' => 'Oma',
                'sigla' => 'OM',
                'bacen' => 5568,
            ),
            161 => 
            array (
                'id' => 164,
                'nome' => 'Pakistan',
                'nome_pt' => 'Paquistão',
                'sigla' => 'PK',
                'bacen' => 5762,
            ),
            162 => 
            array (
                'id' => 165,
                'nome' => 'Palau',
                'nome_pt' => 'Palau',
                'sigla' => 'PW',
                'bacen' => 5754,
            ),
            163 => 
            array (
                'id' => 166,
                'nome' => 'Panama',
                'nome_pt' => 'Panamá',
                'sigla' => 'PA',
                'bacen' => 5800,
            ),
            164 => 
            array (
                'id' => 167,
                'nome' => 'Papua New Guinea',
                'nome_pt' => 'Papua Nova Guine',
                'sigla' => 'PG',
                'bacen' => 5452,
            ),
            165 => 
            array (
                'id' => 168,
                'nome' => 'Paraguay',
                'nome_pt' => 'Paraguai',
                'sigla' => 'PY',
                'bacen' => 5860,
            ),
            166 => 
            array (
                'id' => 169,
                'nome' => 'Peru',
                'nome_pt' => 'Peru',
                'sigla' => 'PE',
                'bacen' => 5894,
            ),
            167 => 
            array (
                'id' => 170,
                'nome' => 'Philippines',
                'nome_pt' => 'Filipinas',
                'sigla' => 'PH',
                'bacen' => 2674,
            ),
            168 => 
            array (
                'id' => 171,
                'nome' => 'Pitcairn',
                'nome_pt' => 'Pitcairn, Ilha',
                'sigla' => 'PN',
                'bacen' => 5932,
            ),
            169 => 
            array (
                'id' => 172,
                'nome' => 'Poland',
                'nome_pt' => 'Polônia, Republica da',
                'sigla' => 'PL',
                'bacen' => 6033,
            ),
            170 => 
            array (
                'id' => 173,
                'nome' => 'Portugal',
                'nome_pt' => 'Portugal',
                'sigla' => 'PT',
                'bacen' => 6076,
            ),
            171 => 
            array (
                'id' => 174,
                'nome' => 'Puerto Rico',
                'nome_pt' => 'Porto Rico',
                'sigla' => 'PR',
                'bacen' => 6114,
            ),
            172 => 
            array (
                'id' => 175,
                'nome' => 'Qatar',
                'nome_pt' => 'Catar',
                'sigla' => 'QA',
                'bacen' => 1546,
            ),
            173 => 
            array (
                'id' => 176,
                'nome' => 'Reunion',
                'nome_pt' => 'Reunião, Ilha',
                'sigla' => 'RE',
                'bacen' => 6602,
            ),
            174 => 
            array (
                'id' => 177,
                'nome' => 'Romania',
                'nome_pt' => 'Romênia',
                'sigla' => 'RO',
                'bacen' => 6700,
            ),
            175 => 
            array (
                'id' => 178,
                'nome' => 'Russian Federation',
                'nome_pt' => 'Rússia, Federação da',
                'sigla' => 'RU',
                'bacen' => 6769,
            ),
            176 => 
            array (
                'id' => 179,
                'nome' => 'Rwanda',
                'nome_pt' => 'Ruanda',
                'sigla' => 'RW',
                'bacen' => 6750,
            ),
            177 => 
            array (
                'id' => 180,
                'nome' => 'Saint Kitts and Nevis',
                'nome_pt' => 'São Cristovão e Neves, Ilhas',
                'sigla' => 'KN',
                'bacen' => 6955,
            ),
            178 => 
            array (
                'id' => 181,
                'nome' => 'Saint LUCIA',
                'nome_pt' => 'Santa Lucia',
                'sigla' => 'LC',
                'bacen' => 7153,
            ),
            179 => 
            array (
                'id' => 182,
                'nome' => 'Saint Vincent and the Grenadines',
                'nome_pt' => 'São Vicente e Granadinas',
                'sigla' => 'VC',
                'bacen' => 7056,
            ),
            180 => 
            array (
                'id' => 183,
                'nome' => 'Samoa',
                'nome_pt' => 'Samoa',
                'sigla' => 'WS',
                'bacen' => 6904,
            ),
            181 => 
            array (
                'id' => 184,
                'nome' => 'San Marino',
                'nome_pt' => 'San Marino',
                'sigla' => 'SM',
                'bacen' => 6971,
            ),
            182 => 
            array (
                'id' => 185,
                'nome' => 'Sao Tome and Principe',
                'nome_pt' => 'São Tome e Príncipe, Ilhas',
                'sigla' => 'ST',
                'bacen' => 7200,
            ),
            183 => 
            array (
                'id' => 186,
                'nome' => 'Saudi Arabia',
                'nome_pt' => 'Arábia Saudita',
                'sigla' => 'SA',
                'bacen' => 531,
            ),
            184 => 
            array (
                'id' => 187,
                'nome' => 'Senegal',
                'nome_pt' => 'Senegal',
                'sigla' => 'SN',
                'bacen' => 7285,
            ),
            185 => 
            array (
                'id' => 188,
                'nome' => 'Seychelles',
                'nome_pt' => 'Seychelles',
                'sigla' => 'SC',
                'bacen' => 7315,
            ),
            186 => 
            array (
                'id' => 189,
                'nome' => 'Sierra Leone',
                'nome_pt' => 'Serra Leoa',
                'sigla' => 'SL',
                'bacen' => 7358,
            ),
            187 => 
            array (
                'id' => 190,
                'nome' => 'Singapore',
                'nome_pt' => 'Cingapura',
                'sigla' => 'SG',
                'bacen' => 7412,
            ),
            188 => 
            array (
                'id' => 191,
            'nome' => 'Slovakia (Slovak Republic)',
                'nome_pt' => 'Eslovaca, Republica',
                'sigla' => 'SK',
                'bacen' => 2470,
            ),
            189 => 
            array (
                'id' => 192,
                'nome' => 'Slovenia',
                'nome_pt' => 'Eslovênia, Republica da',
                'sigla' => 'SI',
                'bacen' => 2461,
            ),
            190 => 
            array (
                'id' => 193,
                'nome' => 'Solomon Islands',
                'nome_pt' => 'Salomão, Ilhas',
                'sigla' => 'SB',
                'bacen' => 6777,
            ),
            191 => 
            array (
                'id' => 194,
                'nome' => 'Somalia',
                'nome_pt' => 'Somalia',
                'sigla' => 'SO',
                'bacen' => 7480,
            ),
            192 => 
            array (
                'id' => 195,
                'nome' => 'South Africa',
                'nome_pt' => 'África do Sul',
                'sigla' => 'ZA',
                'bacen' => 7560,
            ),
            193 => 
            array (
                'id' => 196,
                'nome' => 'South Georgia and the South Sandwich Islands',
                'nome_pt' => 'Ilhas Geórgia do Sul e Sandwich do Sul',
                'sigla' => 'GS',
                'bacen' => 2925,
            ),
            194 => 
            array (
                'id' => 197,
                'nome' => 'Spain',
                'nome_pt' => 'Espanha',
                'sigla' => 'ES',
                'bacen' => 2453,
            ),
            195 => 
            array (
                'id' => 198,
                'nome' => 'Sri Lanka',
                'nome_pt' => 'Sri Lanka',
                'sigla' => 'LK',
                'bacen' => 7501,
            ),
            196 => 
            array (
                'id' => 199,
                'nome' => 'St. Helena',
                'nome_pt' => 'Santa Helena',
                'sigla' => 'SH',
                'bacen' => 7102,
            ),
            197 => 
            array (
                'id' => 200,
                'nome' => 'St. Pierre and Miquelon',
                'nome_pt' => 'São Pedro e Miquelon',
                'sigla' => 'PM',
                'bacen' => 7005,
            ),
            198 => 
            array (
                'id' => 201,
                'nome' => 'Sudan',
                'nome_pt' => 'Sudão',
                'sigla' => 'SD',
                'bacen' => 7595,
            ),
            199 => 
            array (
                'id' => 202,
                'nome' => 'Suriname',
                'nome_pt' => 'Suriname',
                'sigla' => 'SR',
                'bacen' => 7706,
            ),
            200 => 
            array (
                'id' => 203,
                'nome' => 'Svalbard and Jan Mayen Islands',
                'nome_pt' => 'Svalbard e Jan Mayen',
                'sigla' => 'SJ',
                'bacen' => 7552,
            ),
            201 => 
            array (
                'id' => 204,
                'nome' => 'Swaziland',
                'nome_pt' => 'Eswatini',
                'sigla' => 'SZ',
                'bacen' => 7544,
            ),
            202 => 
            array (
                'id' => 205,
                'nome' => 'Sweden',
                'nome_pt' => 'Suécia',
                'sigla' => 'SE',
                'bacen' => 7641,
            ),
            203 => 
            array (
                'id' => 206,
                'nome' => 'Switzerland',
                'nome_pt' => 'Suíça',
                'sigla' => 'CH',
                'bacen' => 7676,
            ),
            204 => 
            array (
                'id' => 207,
                'nome' => 'Syrian Arab Republic',
                'nome_pt' => 'Síria, Republica Árabe da',
                'sigla' => 'SY',
                'bacen' => 7447,
            ),
            205 => 
            array (
                'id' => 208,
                'nome' => 'Taiwan, Province of China',
            'nome_pt' => 'Formosa (Taiwan)',
                'sigla' => 'TW',
                'bacen' => 1619,
            ),
            206 => 
            array (
                'id' => 209,
                'nome' => 'Tajikistan',
                'nome_pt' => 'Tadjiquistao, Republica do',
                'sigla' => 'TJ',
                'bacen' => 7722,
            ),
            207 => 
            array (
                'id' => 210,
                'nome' => 'Tanzania, United Republic of',
                'nome_pt' => 'Tanzânia, Republica Unida da',
                'sigla' => 'TZ',
                'bacen' => 7803,
            ),
            208 => 
            array (
                'id' => 211,
                'nome' => 'Thailand',
                'nome_pt' => 'Tailândia',
                'sigla' => 'TH',
                'bacen' => 7765,
            ),
            209 => 
            array (
                'id' => 212,
                'nome' => 'Togo',
                'nome_pt' => 'Togo',
                'sigla' => 'TG',
                'bacen' => 8001,
            ),
            210 => 
            array (
                'id' => 213,
                'nome' => 'Tokelau',
                'nome_pt' => 'Toquelau, Ilhas',
                'sigla' => 'TK',
                'bacen' => 8052,
            ),
            211 => 
            array (
                'id' => 214,
                'nome' => 'Tonga',
                'nome_pt' => 'Tonga',
                'sigla' => 'TO',
                'bacen' => 8109,
            ),
            212 => 
            array (
                'id' => 215,
                'nome' => 'Trinidad and Tobago',
                'nome_pt' => 'Trinidad e Tobago',
                'sigla' => 'TT',
                'bacen' => 8150,
            ),
            213 => 
            array (
                'id' => 216,
                'nome' => 'Tunisia',
                'nome_pt' => 'Tunísia',
                'sigla' => 'TN',
                'bacen' => 8206,
            ),
            214 => 
            array (
                'id' => 217,
                'nome' => 'Turkey',
                'nome_pt' => 'Turquia',
                'sigla' => 'TR',
                'bacen' => 8273,
            ),
            215 => 
            array (
                'id' => 218,
                'nome' => 'Turkmenistan',
                'nome_pt' => 'Turcomenistão, Republica do',
                'sigla' => 'TM',
                'bacen' => 8249,
            ),
            216 => 
            array (
                'id' => 219,
                'nome' => 'Turks and Caicos Islands',
                'nome_pt' => 'Turcas e Caicos, Ilhas',
                'sigla' => 'TC',
                'bacen' => 8230,
            ),
            217 => 
            array (
                'id' => 220,
                'nome' => 'Tuvalu',
                'nome_pt' => 'Tuvalu',
                'sigla' => 'TV',
                'bacen' => 8281,
            ),
            218 => 
            array (
                'id' => 221,
                'nome' => 'Uganda',
                'nome_pt' => 'Uganda',
                'sigla' => 'UG',
                'bacen' => 8338,
            ),
            219 => 
            array (
                'id' => 222,
                'nome' => 'Ukraine',
                'nome_pt' => 'Ucrânia',
                'sigla' => 'UA',
                'bacen' => 8311,
            ),
            220 => 
            array (
                'id' => 223,
                'nome' => 'United Arab Emirates',
                'nome_pt' => 'Emirados Árabes Unidos',
                'sigla' => 'AE',
                'bacen' => 2445,
            ),
            221 => 
            array (
                'id' => 224,
                'nome' => 'United Kingdom',
                'nome_pt' => 'Reino Unido',
                'sigla' => 'GB',
                'bacen' => 6289,
            ),
            222 => 
            array (
                'id' => 225,
                'nome' => 'United States',
                'nome_pt' => 'Estados Unidos',
                'sigla' => 'US',
                'bacen' => 2496,
            ),
            223 => 
            array (
                'id' => 226,
                'nome' => 'United States Minor Outlying Islands',
                'nome_pt' => 'Ilhas Menores Distantes dos Estados Unidos',
                'sigla' => 'UM',
                'bacen' => 18664,
            ),
            224 => 
            array (
                'id' => 227,
                'nome' => 'Uruguay',
                'nome_pt' => 'Uruguai',
                'sigla' => 'UY',
                'bacen' => 8451,
            ),
            225 => 
            array (
                'id' => 228,
                'nome' => 'Uzbekistan',
                'nome_pt' => 'Uzbequistão, Republica do',
                'sigla' => 'UZ',
                'bacen' => 8478,
            ),
            226 => 
            array (
                'id' => 229,
                'nome' => 'Vanuatu',
                'nome_pt' => 'Vanuatu',
                'sigla' => 'VU',
                'bacen' => 5517,
            ),
            227 => 
            array (
                'id' => 230,
                'nome' => 'Venezuela',
                'nome_pt' => 'Venezuela',
                'sigla' => 'VE',
                'bacen' => 8508,
            ),
            228 => 
            array (
                'id' => 231,
                'nome' => 'Viet Nam',
                'nome_pt' => 'Vietnã',
                'sigla' => 'VN',
                'bacen' => 8583,
            ),
            229 => 
            array (
                'id' => 232,
            'nome' => 'Virgin Islands (British)',
            'nome_pt' => 'Virgens, Ilhas (Britânicas)',
                'sigla' => 'VG',
                'bacen' => 8630,
            ),
            230 => 
            array (
                'id' => 233,
            'nome' => 'Virgin Islands (U.S.)',
            'nome_pt' => 'Virgens, Ilhas (E.U.A.)',
                'sigla' => 'VI',
                'bacen' => 8664,
            ),
            231 => 
            array (
                'id' => 234,
                'nome' => 'Wallis and Futuna Islands',
                'nome_pt' => 'Wallis e Futuna, Ilhas',
                'sigla' => 'WF',
                'bacen' => 8753,
            ),
            232 => 
            array (
                'id' => 235,
                'nome' => 'Western Sahara',
                'nome_pt' => 'Saara Ocidental',
                'sigla' => 'EH',
                'bacen' => 6858,
            ),
            233 => 
            array (
                'id' => 236,
                'nome' => 'Yemen',
                'nome_pt' => 'Iémen',
                'sigla' => 'YE',
                'bacen' => 3573,
            ),
            234 => 
            array (
                'id' => 237,
                'nome' => 'Yugoslavia',
                'nome_pt' => 'Iugoslávia, República Fed. da',
                'sigla' => 'YU',
                'bacen' => 3883,
            ),
            235 => 
            array (
                'id' => 238,
                'nome' => 'Zambia',
                'nome_pt' => 'Zâmbia',
                'sigla' => 'ZM',
                'bacen' => 8907,
            ),
            236 => 
            array (
                'id' => 239,
                'nome' => 'Zimbabwe',
                'nome_pt' => 'Zimbabue',
                'sigla' => 'ZW',
                'bacen' => 6653,
            ),
            237 => 
            array (
                'id' => 240,
                'nome' => 'Bailiwick of Guernsey',
            'nome_pt' => 'Guernsey, Ilha do Canal (Inclui Alderney e Sark)',
                'sigla' => 'GG',
                'bacen' => 1504,
            ),
            238 => 
            array (
                'id' => 241,
                'nome' => 'Bailiwick of Jersey',
                'nome_pt' => 'Jersey, Ilha do Canal',
                'sigla' => 'JE',
                'bacen' => 1508,
            ),
            239 => 
            array (
                'id' => 243,
                'nome' => 'Isle of Man',
                'nome_pt' => 'Man, Ilha de',
                'sigla' => 'IM',
                'bacen' => 3595,
            ),
            240 => 
            array (
                'id' => 246,
            'nome' => 'Crna Gora (Montenegro)',
                'nome_pt' => 'Montenegro',
                'sigla' => 'ME',
                'bacen' => 4985,
            ),
            241 => 
            array (
                'id' => 247,
                'nome' => 'SÉRVIA',
                'nome_pt' => 'Republika Srbija',
                'sigla' => 'RS',
                'bacen' => 7370,
            ),
            242 => 
            array (
                'id' => 248,
                'nome' => 'Republic of South Sudan',
                'nome_pt' => 'Sudao do Sul',
                'sigla' => 'SS',
                'bacen' => 7600,
            ),
            243 => 
            array (
                'id' => 249,
                'nome' => 'Zona del Canal de Panamá',
                'nome_pt' => 'Zona do Canal do Panamá',
                'sigla' => NULL,
                'bacen' => 8958,
            ),
            244 => 
            array (
                'id' => 252,
                'nome' => 'Dawlat Filasṭīn',
                'nome_pt' => 'Palestina',
                'sigla' => 'PS',
                'bacen' => 5780,
            ),
            245 => 
            array (
                'id' => 253,
                'nome' => 'Åland Islands',
                'nome_pt' => 'Aland, Ilhas',
                'sigla' => 'AX',
                'bacen' => 153,
            ),
            246 => 
            array (
                'id' => 254,
                'nome' => 'Saint Barthélemy',
                'nome_pt' => 'Coletividade de São Bartolomeu',
                'sigla' => 'BL',
                'bacen' => 3598,
            ),
            247 => 
            array (
                'id' => 255,
                'nome' => 'Curaçao',
                'nome_pt' => 'Curaçao',
                'sigla' => 'CW',
                'bacen' => 200,
            ),
            248 => 
            array (
                'id' => 256,
                'nome' => 'Saint Martin',
            'nome_pt' => 'São Martinho, Ilha de (Parte Francesa)',
                'sigla' => 'SM',
                'bacen' => 6980,
            ),
            249 => 
            array (
                'id' => 258,
                'nome' => 'Bonaire',
                'nome_pt' => 'Bonaire',
                'sigla' => 'AN',
                'bacen' => 990,
            ),
            250 => 
            array (
                'id' => 259,
                'nome' => 'Antartica',
                'nome_pt' => 'Antartica',
                'sigla' => 'AQ',
                'bacen' => 420,
            ),
            251 => 
            array (
                'id' => 260,
                'nome' => 'Heard Island and McDonald Islands',
                'nome_pt' => 'Ilha Herad e Ilhas Macdonald',
                'sigla' => 'AU',
                'bacen' => 3433,
            ),
            252 => 
            array (
                'id' => 261,
                'nome' => 'Saint-Barthélemy',
                'nome_pt' => 'São Bartolomeu',
                'sigla' => 'FR',
                'bacen' => 6939,
            ),
            253 => 
            array (
                'id' => 262,
                'nome' => 'Saint Martin',
            'nome_pt' => 'São Martinho, Ilha de (Parte Holandesa)',
                'sigla' => 'SM',
                'bacen' => 6998,
            ),
            254 => 
            array (
                'id' => 263,
                'nome' => 'Terres Australes et Antarctiques Françaises',
                'nome_pt' => 'Terras Austrais e Antárcticas Francesas',
                'sigla' => 'TF',
                'bacen' => 7811,
            ),
        ));
        
        
    }
}