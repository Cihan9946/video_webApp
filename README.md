# WEB  Video
# Laravel Video Projesi

Bu proje, Laravel framework'ü kullanılarak geliştirilen bir video yükleme ve yönetim sistemidir. Kullanıcılar, video dosyalarını yükleyebilir, listeleyebilir ve izleyebilir.

## Özellikler
- **Video Yükleme:** Kullanıcılar, video dosyalarını platforma yükleyebilir.
- **Video Listeleme:** Yüklenen videoları listeleyerek görüntüleyebilirsiniz.
- **Video Oynatma:** Yüklenen videolar doğrudan platform üzerinden oynatılabilir.
- **Güvenlik Analizi:** Bandit kütüphanesi kullanılarak kod güvenlik analizi yapılabilir.


```bash
cp .env.example .env
php artisan key:generate
```
`.env` dosyasını açarak veritabanı bilgilerinizi düzenleyin.

###  Veritabanını Migrasyon ve Seed Etme
```bash
php artisan migrate --seed
```

###  Sunucuyu Başlatın
```bash
php artisan serve
```

Tarayıcınızda `http://127.0.0.1:8000` adresini ziyaret ederek projeyi görüntüleyebilirsiniz.

## Kullanılan Teknolojiler
- Laravel
- MySQL
- Bootstrap
- JavaScript
- Blade Template Engine

## API Kullanımı
Projede API endpointleri bulunmaktadır. Örnek kullanım:

- **Video Yükleme:**
```http
POST /api/videos/upload
```

- **Video Listeleme:**
```http
GET /api/videos
```

- **Belirli Bir Videoyu Getirme:**
```http
GET /api/videos/{id}
```

## Katkıda Bulunma
Projeye katkıda bulunmak için aşağıdaki adımları takip edebilirsiniz:
1. Projeyi forklayın.
2. Yeni bir branch oluşturun: `git checkout -b yeni-ozellik`
3. Değişikliklerinizi yapın ve commitleyin: `git commit -m 'Yeni özellik eklendi'`
4. Branch’i gönderin: `git push origin yeni-ozellik`
5. Bir pull request oluşturun.




