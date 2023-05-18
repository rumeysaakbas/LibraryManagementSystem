# LibraryAutomationSystem
Kütüphane Otomasyon Sistemi

Kullanılan teknolojiler:
PHP, MYSQL, Apache server, Bootstrap, HTML, CSS, SweetAlert

Kütüphanelerde kullanılmak üzere kitap alış/veriş işlemlerini ve üye işlemlerini gerçekleştirebilecek bir uygulama geliştirilmiştir.

Başlangıçta giriş yapma ekranı bizi karşılamaktadır. sisteme kayıtlı görevlinin giriş bilgileri ile giriş yapılmakta ve ana sayfaya yönlendirilmektedir. Kayıtlı değil ise gerekli bilgilerle kaydolma işlemi gerçekleştirilmektedir.

<p align="center">
  <img src="images_for_readme/login.png" alt="Fotoğraf 1" width="400" height="250">
  <img src="images_for_readme/sign_up.png" alt="Fotoğraf 2" width="400" height="250">
</p>

Ana sayfada kitap arama, kitap ekleme, kategoriler, kitap verme, kitap alma, üye ekleme, üye listeleme ve kayıtlı görevlileri görüntüleme işlemlerini gerçekleştirmek üzere ilgili alanlar bulunmaktadır.

<p align="center">
  <img src="images_for_readme/home.png" alt="Fotoğraf 2" width="500" height="300">
</p>

Kitap arama sayfasında kitap adıyla veya yazar adıyla arama yapılabilmektedir.

<p align="center">
  <img src="images_for_readme/search_book.png" alt="Fotoğraf 2" width="500" height="300">
</p>
Kitap ekleme bölümünde ilgili bilgiler girilerek kitap sisteme kaydedilebilmektedir. Kategoriler kısmından ise kütüphanede bulunan tüm kitapların kategorileri ve sayıları görüntülenebilmektedir.

Kitap listesi/kitap verme sayfasında kütüphanede bulunan tüm kitaplar listelenmektedir. Bu sayfada kitap ver butonuna basılarak kitabın verileceği üyenin üyelik numarası ile kitap okuyucuya verilebilmektedir. Bir okuyucu aynı anda en fazla iki kitap alabilmekte, 2'den fazla kitap alma işleminde bulunursa sistem uyarmaktadır. Kitap okuyucuya verildikten sonra kitap listesinden ilgili kitabın sayısı bir azalmakta, eğer mevcutta bulunan son kitap verildi ise "kitap okuyucuda" şeklinde sistemde belirtilmektedir. Kitap verme işlemi sırasında kayıtlı olmayan bir üyeye kitap verilmeye çalışılırsa sistem tarafından uyarı gösterilmektedir. 

<p align="center">
  <img src="images_for_readme/book_process_1.png" alt="Fotoğraf 2" width="400" height="300">
  <img src="images_for_readme/book_process_2.png" alt="Fotoğraf 2" width="400" height="300">
</p>
<p align="center">
  <img src="images_for_readme/book_process_3.png" alt="Fotoğraf 2" width="400" height="300">
</p>

Kitap geri alma sayfasında, kitap verilen tüm üyeler aldığı kitap ve tarih ile listelenmektedir. İlgili üyeden kitap alma işlemi belirtilen buton ile gerçekleştirilebilmektedir. İşlem gerçekleştikten sonra kitap listesinde ilgili kitabın sayısı güncellenecek ve üye 1 kitap daha alma iznine erişecektir, aynı anda iki kitaba kadar alabilmektedir.

<p align="center">
  <img src="images_for_readme/book_process_4.png" alt="Fotoğraf 2" width="500" height="300">
</p>

Sisteme yeni bir üye kayıt olacağı zaman sistemi kullanan görevli tarafından bu üyelik işlemi gerçekleştirilmekte, üye listesi görüntülenebilmekte, üyelerin bilgileri güncelenebilmekte veya üye silinebilmektedir.
Sistemde kayıtlı görevlileri görüntüleyebilmek için "Görevliler" adlı bir sayfa bulunmaktadır. Burada sisteme giriş yapmış kullanıcı dışındaki diğer kullanıcılar silinebilmektedir.




