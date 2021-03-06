# アプリケーション名: Nonda?

# アプリケーション概要

### 家族のつながりと、健康をサポートするアプリです。

- 家族（主に別居されている高齢者）の健康を管理します。
  - 薬やサプリの服用の際にボタンをクリックしてもらうことで、管理者ユーザーにメールで通知を送信します。

- 薬の服用の辛さを和らげます。
  - 服用後に家族の写真、メッセージを表示することで気持ちを和らげます。

- 大切な家族の記憶を守ります。
  - 別居していても、毎日家族の写真を見ることで、家族のことを忘れません。（前日の投稿、なければランダムに表示されます。）

# 制作のきっかけ、目指している課題解決
**祖母は私のことを忘れてしまいました。**

私の祖母は数年前から介護施設に入っていて、なかなか会う機会が得られません。

施設に入って初めの頃は、久しぶりに会っても祖母は私の名前を呼んでくれて、喜んでくれていました。

しかし数年経つ間に、会っても祖母は私のことがわからず、手を握ろうとしても怖がって触れさせてもくれなくなってしまいました。

祖母が元気で生きていてくれることは嬉しいのですが、久しぶりに会えた時には笑顔がみたいと思ってしまうため、祖母に忘れられてしまったことはやはり寂しく感じてしまいます。

そんな祖母が、毎日顔をみてくれれば自分や家族のことを思い出してくれるかな、と考えて制作しています。




**現在、コロナ禍で老人介護施設への面会ができなくなり、家族の記憶が薄れていってしまっている方も多くいらっしゃると思います。**

会ったときに、家族が自分のことを覚えてくれている。それだけでも介護や会いに行く気持ちが楽になるはずです。

また、共通の思い出がまとまっていると、家族との会話もスムーズになり、一緒の時間が楽しくなるはずです。

そんな方の役に立てればいいなとも考えています。

# URL
近日デプロイ予定です。

## テスト用アカウント
準備中

## 利用方法

1. 管理者を新規作成してください
1. 管理者アカウントからユーザーを作成します。（服用を管理したい方のアカウントです。）
1. 管理者アカウントから家蔵アカウントを作成します。(写真やメッセージのアップロードを行うアカウントです。)

上記により、家族アカウントがアップロードした写真を、ユーザーが閲覧できるようになります。

## 使用例動画
### 画面遷移
- ログイン→薬を飲んだボタン→写真表示

[![Image from Gyazo](https://i.gyazo.com/d725eb19701252c3800b94248e35192e.gif)](https://gyazo.com/d725eb19701252c3800b94248e35192e)

- アップロード画像一覧
[![Image from Gyazo](https://i.gyazo.com/449d0595a5ce5e3504a1bfae8c4e3062.png)](https://gyazo.com/449d0595a5ce5e3504a1bfae8c4e3062)

### 動作環境
- PHP 8.0.6
- Laravel8.4
- MySQL
- tailwindcss
- SendgridAPI(実装予定)

## データベース設計
![nonda](https://user-images.githubusercontent.com/79580640/128128362-becd1fa1-b3a5-43d4-b31f-2a3a8c42dea5.png)