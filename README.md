# (Laravel版)ショッピングWebアプリケーションの開発
- スマホのECサイトアプリケーション 
- Servlet&JSPで作成したアプリケーション構造をベースに作成
- 出品者側のシステムは作らず利用者の利用のみ設計
- 商品を見る、検索する、ユーザー機能、カート処理、購入処理、購入履歴閲覧をベースに作成

# 参照先
- 要件定義書やデータベース設計書はmaterialsフォルダ内にPDFで保存しています。
- OneDriveにもPPT形式で保存しており、閲覧可能です。
  - [要件定義書](https://1drv.ms/p/s!Agh3uNl6nfsKgQOwHuJjH14V8Bzf?e=MMRmgZ)
  - [データベース設計書](https://1drv.ms/p/s!Agh3uNl6nfsKgQjbGrT_ZZL-hqaq?e=cUKeay)
- Herokuを利用してLaravelとMySQLでデプロイしています。
  - URLは[こちら](https://laravelec12345.herokuapp.com/)

- GitHubからダウンロードしてローカル上で動かす場合はlaravel_ECのdokerブランチからダウンロードして、migrationとseedを実行していただくことで実際に動かすことができます。

___
## なぜスマホのECサイトアプリケーションを作ろうと思ったか？
- ショッピングサイトにはユーザー認証機能や商品閲覧機能、購入機能などひととおりのCRUD機能が揃っており、理解することで、いい勉強なると感じました。
- 商品内容を絞り込まないと必要な機能が増えてしまうと判断して商品をスマートフォンだけに絞りこむことにしました。
- 前回Servlet&JSPで作った反省点として
  - 基本的な学習を終えた段階で作成したので、自分の知識や当時の理解力では、できることがかなり限られていた。
  - HTMLとCSSの知識がなくレイアウトの崩れが修正できなかった。
  - データベース設計も簡易的に設計
  - カートに商品を登録した際、同一商品の重複登録を防ぐための処理が決めた期間内で組めなかった

  など中途半端になってしまいましたが、制作を一度中断して学習を進めて得た知識で内容を修正するべきだと判断しました。
- Webアプリケーションやバックエンド関連の業務で就職を目指していた事もあり、就労移行先の講師に、Web制作に特化したPHPとLaravelのスキル習得を勧められたことから学習を始めて、基礎学習を終えた段階で新たなポートフォリオ制作を決めましたが、新たなアプリケーションを作成するよりも前回の反省点を改善して、Laravelで新たに作り直したいと思った事から作成しました。

___
## ポートフォリオ作りで意識した事
- 完成までの制作日数を設定し、システムの規模を設定する。
- 制作日数と現在の自分の能力からできる事と、できない事を切り分け、完成までの優先順位や習得しなければいけない知識などを決めていく。
- 作成する上での手順、工程をある程度決めておき、タスク管理することで計画通りに作成する事を意識する。
- 前回の反省点から要件定義や作業工程を見直す。
  - システムの規模よりも要件定義で決めたシステムの完成度を意識する。
  - 前回作成したデータベース設計や機能を見直し、前回よりも本格的なECサイト作りを理解する。
  - HTML ,CSSの学習時間が少ないので基本的にBootstrapを使用し、主にレイアウトが崩れない程度で作成する事にする。
- 前回と違い人に見てもらう作品になるので、コメント内容や読みやすいコード書くように意識して作成する。
___
# 今後の課題・反省点
- Laravelの学習時間や理解力が足りず、システムを完成させまでに、自分の想定よりも大幅に時間がかかりました。
  - 特に認証機能をカスタマイズして利用する事が難しかった事から、ユーザー登録機能を実装するまでかなり時間が掛かってしまいました。
  - 今後学習の中で利用するシステムの構造や仕組みをポイントを抑えて、しっかりと理解する事を意識するべきだと思いました。
- ライブラリの利用やマイグレーションの手順など、一度覚えた事を忘れてしまう事が多々あリました。
  - インターン先の先輩がGoogleドキュメントで手順書を作成して、閲覧できるようにしておくことで手戻りを減らす工夫をされている事を教えてもらった事から、私にも改善できる方法だと思い、重要だと思う知識を記載した手順書を作成しています。
  - ドキュメントのサンプルは[こちら](https://docs.google.com/document/d/1jsjU2PCkMKIoynjwrPuID--6yjjOf3lt-RSoU3yqrc0/edit?usp=sharing)
- 前回と同じくレイアウトの修正に時間がかかってしまいました。その原因は作成を進める中でシステムの仕様変更や日々の学習の中で得た知識から最適な答えを求めすぎて、制作途中でシステムを一から作り直したり、修正を何度も加えるなど要件定義で決めた仕様を大きく変更してしまったことだと思っています。
  - インターン先の社員の方にもまずは要件定義で決めた仕様通りの物を作る意識を持ち、その上でどうしても実現が難しいものや、変更を加えたい場合は、顧客や上司に相談する意識を持つべきだと教わりました。
  - 要件定義をより丁寧に作成し、仕様通りの物を作る意識を高く持つ事の重要性を学び、他者とのコミュニケーションを密にとる事の重要性を再認識した反省点でした。

- 購入履歴閲覧ページで必要なデータを取得するループ処理のコーディングに時間がかかってしまったり、PHPの理解が不十分であったために発生したエラー原因の特定と修正に時間がかかってしまった事から、基本的な事がまだまだ理解できていないと痛感しました。
  - 今のままでは入社してから苦労する事が多くなると感じたので、もう一度PHPや基礎をしっかり学習し直す事で、応用力を身につけていきたいと思います。
