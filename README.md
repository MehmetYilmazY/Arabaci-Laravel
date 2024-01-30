# Laravel 2. El Araç Yükleme Uygulaması

Bu proje, Laravel kullanılarak geliştirilmiş bir 2. el araç yükleme uygulamasıdır. Kullanıcılar, araçlarını sisteme yükleyebilir, güncelleyebilir ve silebilirler. Ayrıca, eklenen araçlar ana sayfada listelenir.

## Özellikler

- CRUD (Create, Read, Update, Delete) işlemleri: Kullanıcılar, araç ekleyebilir, güncelleyebilir ve silebilirler.
- Anasayfada araç listesi: Eklenen araçlar anasayfada listelenir.
- Kullanıcı yetkilendirmesi: Yalnızca yetkili kullanıcılar araç ekleyebilir, güncelleyebilir ve silebilir.

## Kurulum

**Laravel Kurulumu:**
   composer install
   cp .env.example .env
   php artisan key:generate
   
## Veritabanı Ayarları:
.env dosyasını açın ve veritabanı bağlantı bilgilerinizi güncelleyin.

Gerekli Paketlerin Yüklenmesi:

composer require laravel/ui
php artisan ui bootstrap --auth

**Migrasyonlar ve Seederlar:**
php artisan migrate --seed

Katkıda Bulunma
Bu depoyu fork edin.
Yeni bir branch oluşturun (git checkout -b yeni-ozellik)
Değişikliklerinizi commit edin (git commit -am 'Yeni özellik: <ad>')
Branch'inizi push edin (git push origin yeni-ozellik)
Bir pull request açın.
