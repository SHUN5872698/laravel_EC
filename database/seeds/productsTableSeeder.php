<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            /**iPhone 12 Pro Max 512GB*/
            [
                'name' => 'iPhone 12 Pro Max パシフィックブルー 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 150800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max シルバー 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 150800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max ゴールド 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 150800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max グラファイト 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 150800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],

            /**iPhone 12 Pro Max 256GB */
            [
                'name' => 'iPhone 12 Pro Max パシフィックブルー 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 128800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max シルバー 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 128800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max ゴールド 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 128800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max グラファイト 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 128800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],

            /**iPhone 12 Pro Max 128GB */
            [
                'name' => 'iPhone 12 Pro Max パシフィックブルー 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max シルバー 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max ゴールド 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 Pro Max グラファイト 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],

            /**iPhone 12 Pro 512GB */
            [
                'name' => 'iPhone 12 Pro パシフィックブルー 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 139800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],

            [
                'name' => 'iPhone 12 Pro シルバー 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 139800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],

            [
                'name' => 'iPhone 12 Pro ゴールド 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 139800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],

            [
                'name' => 'iPhone 12 Pro グラファイト 512GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 139800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '512GB',
            ],

            /** iPhone 12 Pro 256GB*/
            [
                'name' => 'iPhone 12 Pro パシフィックブルー 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 Pro シルバー 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 Pro ゴールド 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 Pro グラファイト 256GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 117800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],

            /**iPhone 12 Pro 128GB */
            [
                'name' => 'iPhone 12 Pro パシフィックブルー 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 106800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 Pro シルバー 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 106800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 Pro ゴールド 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 106800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 Pro グラファイト 128GB',
                'description' => '5GをProで。どんなスマートフォンのチップよりも飛び抜けて高性能なA14 Bionic。暗い場所で撮った写真をつぎのレベルへ引き上げる、Proのカメラシステム。iPhone 12 Pro Maxなら、さらにその上の性能を持つ
                カメラが使えます。耐落下性能を4倍向上させるCeramic Shieldも採用。',
                'price' => 106800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],

            /**iPhone 12 256GB*/
            [
                'name' => 'iPhone 12 レッド 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 101800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 ブルー 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 101800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 ブラック 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 101800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 グリーン 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 101800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],

            /**iPhone 12 128GB*/
            [
                'name' => 'iPhone 12 レッド 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90891,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 ブルー 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90891,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone12 ブラック 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90891,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 グリーン 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90891,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],

            /**iPhone 12 64GB */
            [
                'name' => 'iPhone 12 レッド 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 85800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 12 ブルー 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 85800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 12 ブラック 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 85800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 12 グリーン 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 85800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],

            /**iPhone 12 mini 256GB */
            [
                'name' => 'iPhone 12 mini レッド 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 mini ブルー 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 mini ブラック 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 12 mini グリーン 256GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 90800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '256GB',
            ],

            /**iPhone 12 mini 128GB */
            [
                'name' => 'iPhone 12 mini レッド 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 79800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 mini ブルー 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 79800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 mini ブラック 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 79800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 12 mini グリーン 128GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 79800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '128GB',
            ],

            /**iPhone 12 mini 64GB */
            [
                'name' => 'iPhone 12 mini レッド 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 74800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 12 mini ブルー 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 74800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 12 mini ブラック 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 74800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 12 mini グリーン 64GB',
                'description' => '5Gの速さ。スマートフォンで最速のA14 Bionicチップ。
                エッジからエッジまで広がるOLEDディスプレイ。耐落下性能を
                4倍向上させるCeramic Shield。どのカメラでも使えるナイトモード。
                そのすべてを2つの完璧なサイズで。iPhone 12、登場。',
                'price' => 74800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 12',
                'capacity' => '64GB',
            ],

            /**iPhone 11 Pro Max 512GB */
            [
                'name' => 'iPhone 11 Pro Max ミッドナイトグリーン512GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 157800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '512GB',
            ],
            [
                'name' => 'iPhone 11 Pro Max シルバー 512GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 157800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '512GB',
            ],

            /**iPhone 11 Pro 64GB */
            [
                'name' => 'iPhone 11 Pro ミッドナイトグリーン 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 106800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 11 Pro シルバー 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 106800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],

            /**iPhone 11 256GB */
            [
                'name' => 'iPhone 11 ホワイト 256GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 80800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 11 レッド 256GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 80800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 11 ブラック 256GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 80800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 11 パープル 256GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 80800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 11 グリーン 256GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 80800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone 11 イエロー 256GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 80800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '256GB',
            ],

            /**iPhone 11 128GB */
            [
                'name' => 'iPhone 11 レッド 128GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 69800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 11 ホワイト 128GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 69800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 11 ブラック 128GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 69800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 11 パープル 128GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 69800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 11 グリーン 128GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 69800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone 11 イエロー 128GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 69800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '128GB',
            ],

            /**iPhone 11 64GB */
            [
                'name' => 'iPhone 11 レッド 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 64800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 11 ホワイト 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 64800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 11 ブラック 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 64800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 11 パープル 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 64800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 11 グリーン 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 64800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone 11 イエロー 64GB',
                'description' => 'iPhone 11はデュアルカメラシステム、一日中持続するバッテリー、パワフルなA13 Bionicチップを搭載。背面には傷に強い、とても頑丈なガラスを採用。',
                'price' => 64800,
                'category_master' => 'iPhone',
                'category' => 'iPhone 11',
                'capacity' => '64GB',
            ],

            /** iPhone SE 256GB*/
            [
                'name' => 'iPhone SE レッド 256GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 60800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone SE ホワイト 256GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 60800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone SE ブラック 256GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 60800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '256GB',
            ],
            /**iPhone SE 128GB */
            [
                'name' => 'iPhone SE レッド 128GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 49800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone SE ホワイト 128GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 49800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone SE ブラック 128GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 49800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '128GB',
            ],
            /** iPhone SE 64GB*/
            [
                'name' => 'iPhone SE レッド 64GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 44800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone SE ホワイト 64GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 44800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone SE ブラック 64GB',
                'description' => '手にしたくなるものを、手にしやすく
                耐久性の高いガラスとアルミニウムのボディ
                あざやかな4.7インチ　Retina HDディスプレイ
                iPhone 11 Proと同じチップ',
                'price' => 44800,
                'category_master' => 'iPhone',
                'category' => 'iPhone SE',
                'capacity' => '64GB',
            ],

            /**iPhone XS Max 256GB */
            [
                'name' => 'iPhone XS Max シルバー 256GB',
                'description' => 'Super Retinaに2つのサイズ。その1つは、これまでの iPhone の中で最大のディスプレイ。さらに速くなった Face ID も。スマートフォンの中で最も賢く、最もパワフルなチップも。画期的なデュアルカメラシステムも。iPhone の魅力のすべてを極限まで高めた姿。それが、iPhone XS です。',
                'price' => 86182,
                'category_master' => 'iPhone',
                'category' => 'iPhone XS',
                'capacity' => '256GB',
            ],
            /** iPhone XS Max 64GB*/
            [
                'name' => 'iPhone XS Max スペースグレイ 64GB',
                'description' => 'Super Retinaに2つのサイズ。その1つは、これまでの iPhone の中で最大のディスプレイ。さらに速くなった Face ID も。スマートフォンの中で最も賢く、最もパワフルなチップも。画期的なデュアルカメラシステムも。iPhone の魅力のすべてを極限まで高めた姿。それが、iPhone XS です。',
                'price' => 76182,
                'category_master' => 'iPhone',
                'category' => 'iPhone XS',
                'capacity' => '64GB',
            ],
            /**iPhone XS 256GB */
            [
                'name' => 'iPhone XS スペースグレイ 256GB',
                'description' => 'Super Retinaに2つのサイズ。その1つは、これまでの iPhone の中で最大のディスプレイ。さらに速くなった Face ID も。スマートフォンの中で最も賢く、最もパワフルなチップも。画期的なデュアルカメラシステムも。iPhone の魅力のすべてを極限まで高めた姿。それが、iPhone XS です。',
                'price' => 74364,
                'category_master' => 'iPhone',
                'category' => 'iPhone XS',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone XS シルバー 256GB',
                'description' => 'Super Retinaに2つのサイズ。その1つは、これまでの iPhone の中で最大のディスプレイ。さらに速くなった Face ID も。スマートフォンの中で最も賢く、最もパワフルなチップも。画期的なデュアルカメラシステムも。iPhone の魅力のすべてを極限まで高めた姿。それが、iPhone XS です。',
                'price' => 74364,
                'category_master' => 'iPhone',
                'category' => 'iPhone XS',
                'capacity' => '256GB',
            ],
            [
                'name' => 'iPhone XS ゴールド 256GB',
                'description' => 'Super Retinaに2つのサイズ。その1つは、これまでの iPhone の中で最大のディスプレイ。さらに速くなった Face ID も。スマートフォンの中で最も賢く、最もパワフルなチップも。画期的なデュアルカメラシステムも。iPhone の魅力のすべてを極限まで高めた姿。それが、iPhone XS です。',
                'price' => 74364,
                'category_master' => 'iPhone',
                'category' => 'iPhone XS',
                'capacity' => '256GB',
            ],

            /**iPhone XR 128GB */
            [
                'name' => 'iPhone XR レッド 128GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 59800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone XR ホワイト 128GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 59800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone XR ブルー 128GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 59800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone XR ブラック 128GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 59800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone XR コーラル 128GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 59800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '128GB',
            ],
            [
                'name' => 'iPhone XR イエロー 128GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 59800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '128GB',
            ],
            /**iPhone XR 64GB */
            [
                'name' => 'iPhone XR レッド 64GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 54800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone XR ホワイト 64GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 54800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone XR ブルー 64GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 54800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone XR ブラック 64GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 54800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone XR コーラル 64GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 54800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '64GB',
            ],
            [
                'name' => 'iPhone XR イエロー 64GB',
                'description' => '触れるたびに鮮やか。
                すべてが新しいLiquid Retinaディスプレイ。それは、業界の中で
                最も先進的なLCD。さらに速くなったFace IDも。スマートフォンの中で
                最も賢く、最もパワフルなチップも。画期的なカメラシステムも。
                iPhone XR は、どこから見ても美しい。',
                'price' => 54800,
                'category_master' => 'iPhone',
                'category' => 'iPhone XR',
                'capacity' => '64GB',
            ],

            /**Galaxy Note20 Ultra*/
            [
                'name' => 'Galaxy Note20 Ultra ブロンズ 256GB',
                'description' => 'ビジネスやプライベートを彩るミスティックカラー
                精巧なディテールと卓越したカラーによって昇華されたメタルボディに、高耐久ガラスのCorning® Gorilla® Glass Victus™を装備。1 本体との統一感を損なわない同色のSペンが付属します。',
                'price' => 107273,
                'category_master' => 'Galaxy',
                'category' => 'Note20 Ultra',
                'capacity' => '256GB',
            ],
            [
                'name' => 'Galaxy Note20 Ultra ブラック 256GB',
                'description' => 'ビジネスやプライベートを彩るミスティックカラー
                精巧なディテールと卓越したカラーによって昇華されたメタルボディに、高耐久ガラスのCorning® Gorilla® Glass Victus™を装備。1 本体との統一感を損なわない同色のSペンが付属します。',
                'price' => 107273,
                'category_master' => 'Galaxy',
                'category' => 'Note20 Ultra',
                'capacity' => '256GB',
            ],

            /**Galaxy Z Fold2 256GB */
            [
                'name' => 'Galaxy Z Fold2 ブロンズ 256GB',
                'description' => '未来の形を変えるスマートフォンが今ここに。
                最先端の折りたたみスマホ Galaxy Z Fold2 5Gは、パワフルな性能、フォルダブルガラス、
                一日中利用可能な大容量バッテリーを搭載した手のひらサイズのデバイスです。',
                'price' => 203909,
                'category_master' => 'Galaxy',
                'category' => 'Z Fold2',
                'capacity' => '256GB',
            ],
            [
                'name' => 'Galaxy Z Fold2 ブラック 256GB',
                'description' => '未来の形を変えるスマートフォンが今ここに。
                最先端の折りたたみスマホ Galaxy Z Fold2 5Gは、パワフルな性能、フォルダブルガラス、
                一日中利用可能な大容量バッテリーを搭載した手のひらサイズのデバイスです。',
                'price' => 203909,
                'category_master' => 'Galaxy',
                'category' => 'Z Fold2',
                'capacity' => '256GB',
            ],

            /**Galaxy Z FLIP 256GB */
            [
                'name' => 'Galaxy Z FLIP ブラック 256GB',
                'description' => '革命的なフレキシブルガラスが生み出したのは、フルスクリーンなのに折りたたんでポケットにすっぽりと収まるスマホ。カメラは自立での撮影が可能に。デュアルバッテリーで、一日中ストレスなく操作できます。
                あなたが手にするのは、スマホの未来を変える、新たなカタチです。',
                'price' => 85818,
                'category_master' => 'Galaxy',
                'category' => 'Z FLIP',
                'capacity' => '256GB',
            ],
            [
                'name' => 'Galaxy Z FLIP パープル 256GB',
                'description' => '革命的なフレキシブルガラスが生み出したのは、フルスクリーンなのに折りたたんでポケットにすっぽりと収まるスマホ。カメラは自立での撮影が可能に。デュアルバッテリーで、一日中ストレスなく操作できます。
                あなたが手にするのは、スマホの未来を変える、新たなカタチです。',
                'price' => 85818,
                'category_master' => 'Galaxy',
                'category' => 'Z FLIP',
                'capacity' => '256GB',
            ],
            [
                'name' => 'Galaxy Z FLIP ゴールド 256GB',
                'description' => '革命的なフレキシブルガラスが生み出したのは、フルスクリーンなのに折りたたんでポケットにすっぽりと収まるスマホ。カメラは自立での撮影が可能に。デュアルバッテリーで、一日中ストレスなく操作できます。
                あなたが手にするのは、スマホの未来を変える、新たなカタチです。',
                'price' => 85818,
                'category_master' => 'Galaxy',
                'category' => 'Z FLIP',
                'capacity' => '256GB',
            ],

            /**Xperia 1 II 256GB */
            [
                'name' => 'Xperia 1 II ホワイト 256GB',
                'description' => '体験は進化する、かつてないスピードで。初の5G対応Xperia。
                カメラやシネマ、テレビ、オーディオ、ゲーム、パフォーマンスすべての領域を極めてきた、ソニーの技術をひとつに。あらゆる体験を革新する次世代高速通信5Gによって、エンタテインメントはこれまでにない感動の世界へ。',
                'price' => 124000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 1 II',
                'capacity' => '256GB',
            ],
            [
                'name' => 'Xperia 1 II フロストブラック 256GB',
                'description' => '体験は進化する、かつてないスピードで。初の5G対応Xperia。
                カメラやシネマ、テレビ、オーディオ、ゲーム、パフォーマンスすべての領域を極めてきた、ソニーの技術をひとつに。あらゆる体験を革新する次世代高速通信5Gによって、エンタテインメントはこれまでにない感動の世界へ。',
                'price' => 124000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 1 II',
                'capacity' => '256GB',
            ],
            [
                'name' => 'Xperia 1 II パープル 256GB',
                'description' => '体験は進化する、かつてないスピードで。初の5G対応Xperia。
                カメラやシネマ、テレビ、オーディオ、ゲーム、パフォーマンスすべての領域を極めてきた、ソニーの技術をひとつに。あらゆる体験を革新する次世代高速通信5Gによって、エンタテインメントはこれまでにない感動の世界へ。',
                'price' => 124000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 1 II',
                'capacity' => '256GB',
            ],
            /**Xperia 5 128GB */
            [
                'name' => 'Xperia 5 レッド 128GB',
                'description' => 'ハンドフィットサイズの新Xperiaで、21：9シネマワイドの感動体験を。',
                'price' => 69000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 5',
                'capacity' => '128GB',
            ],
            [
                'name' => 'Xperia 5 ブルー 128GB',
                'description' => 'ハンドフィットサイズの新Xperiaで、21：9シネマワイドの感動体験を。',
                'price' => 69000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 5',
                'capacity' => '128GB',
            ],
            [
                'name' => 'Xperia 5 ブラック 128GB',
                'description' => 'ハンドフィットサイズの新Xperiaで、21：9シネマワイドの感動体験を。',
                'price' => 69000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 5',
                'capacity' => '128GB',
            ],
            [
                'name' => 'Xperia 5 グレー 128GB',
                'description' => 'ハンドフィットサイズの新Xperiaで、21：9シネマワイドの感動体験を。',
                'price' => 69000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 5',
                'capacity' => '128GB',
            ],

            /**Xperia 1 128GB */
            [
                'name' => 'Xperia 1 ブラック 128GB',
                'description' => '1から生まれ変わった、ソニー渾身のフラッグシップ。',
                'price' => 79000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 1',
                'capacity' => '128GB',
            ],
            [
                'name' => 'Xperia 1 パープル 128GB',
                'description' => '1から生まれ変わった、ソニー渾身のフラッグシップ。',
                'price' => 79000,
                'category_master' => 'Xperia',
                'category' => 'Xperia 1',
                'capacity' => '128GB',
            ],

            /**AQUOS zero2 256GB */
            [
                'name' => 'AQUOS zero2 ブラック 256GB',
                'description' => '世界最軽量4倍速ディスプレイで異次元の操作体験へ',
                'price' => 80727,
                'category_master' => 'AQUOS',
                'category' => 'zero2',
                'capacity' => '256GB',
            ],
            [
                'name' => 'AQUOS zero2 シルバー 256GB',
                'description' => '世界最軽量4倍速ディスプレイで異次元の操作体験へ',
                'price' => 80727,
                'category_master' => 'AQUOS',
                'category' => 'zero2',
                'capacity' => '256GB',
            ],

            /**AQUOS sense4 ライトカッパー 64GB */
            [
                'name' => 'AQUOS sense4 ライトカッパー 64GB',
                'description' => 'AQUOS 史上最大容量のバッテリーを備え、長時間の電池持ちをかなえたモデルです。',
                'price' => 33636,
                'category_master' => 'AQUOS',
                'category' => 'sense4',
                'capacity' => '64GB',
            ],
            [
                'name' => 'AQUOS sense4 ブラック 64GB',
                'description' => 'AQUOS 史上最大容量のバッテリーを備え、長時間の電池持ちをかなえたモデルです。',
                'price' => 33636,
                'category_master' => 'AQUOS',
                'category' => 'sense4',
                'capacity' => '64GB',
            ],
            [
                'name' => 'AQUOS sense4 シルバーホワイト',
                'description' => 'AQUOS 史上最大容量のバッテリーを備え、長時間の電池持ちをかなえたモデルです。',
                'price' => 33636,
                'category_master' => 'AQUOS',
                'category' => 'sense4',
                'capacity' => '64GB',
            ],

            /**AQUOS sense3 64GB */
            [
                'name' => 'AQUOS sense3 ライトカッパー 64GB',
                'description' => '充電から、あなたを解き放つ。圧倒的な電池持ちを追求したモデルです。4,000mAhの大容量バッテリーを搭載。これまで同様の持ちやすさもキープしつつ、長時間の電池持ちを実現しました。消費電力の低減を追及したシャープ独自のIGZOディスプレイと、大容量バッテリーとの相乗効果で、充電を気にせず使えます。急速充電を繰り返しても電池が劣化しにくいよう、充電を賢くコントロールする「インテリジェントチャージ」に対応。急速充電規格「USB Power Delivery」に対応している同梱のACアダプターを使用すれば、高速充電が可能です。',
                'price' => 29091,
                'category_master' => 'AQUOS',
                'category' => 'sense3',
                'capacity' => '64GB',
            ],
            [
                'name' => 'AQUOS sense3 ブラック 64GB',
                'description' => '充電から、あなたを解き放つ。圧倒的な電池持ちを追求したモデルです。4,000mAhの大容量バッテリーを搭載。これまで同様の持ちやすさもキープしつつ、長時間の電池持ちを実現しました。消費電力の低減を追及したシャープ独自のIGZOディスプレイと、大容量バッテリーとの相乗効果で、充電を気にせず使えます。急速充電を繰り返しても電池が劣化しにくいよう、充電を賢くコントロールする「インテリジェントチャージ」に対応。急速充電規格「USB Power Delivery」に対応している同梱のACアダプターを使用すれば、高速充電が可能です。',
                'price' => 29091,
                'category_master' => 'AQUOS',
                'category' => 'sense3',
                'capacity' => '64GB',
            ],
            [
                'name' => 'AQUOS sense3 シルバーホワイト 64GB',
                'description' => '充電から、あなたを解き放つ。圧倒的な電池持ちを追求したモデルです。4,000mAhの大容量バッテリーを搭載。これまで同様の持ちやすさもキープしつつ、長時間の電池持ちを実現しました。消費電力の低減を追及したシャープ独自のIGZOディスプレイと、大容量バッテリーとの相乗効果で、充電を気にせず使えます。急速充電を繰り返しても電池が劣化しにくいよう、充電を賢くコントロールする「インテリジェントチャージ」に対応。急速充電規格「USB Power Delivery」に対応している同梱のACアダプターを使用すれば、高速充電が可能です。',
                'price' => 29091,
                'category_master' => 'AQUOS',
                'category' => 'sense3',
                'capacity' => '64GB',
            ],
        ]);
    }
}
