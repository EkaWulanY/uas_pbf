1️⃣ Persiapan Folder & Clone Backend

Buat folder proyek, misal: uas_pbf

Buka folder tersebut di VS Code

Buka terminal di VS Code, jalankan:

```bash

    git clone https://github.com/Alledanaralle/PBF.git
    
```

 2. Buat Frontend Laravel
    
Masuk ke folder uas_pbf via File Explorer
    
Tekan Ctrl + A, lalu ketik cmd dan tekan Enter Jalankan:

```bash

    composer create-project laravel/laravel frontend-uas-230202059
```

Jalankan Project di Laragon
    
3. Buka folder BE dan FE di Laragon (bisa satu jendela atau dua window) Jalankan BE dengan:

```bash
    php spark serve
        
```


Pastikan BE dapat diakses via Postman: 

        GET : http://localhost:8080/mahasiswa
        POST : http://localhost:8080/mahasiswa
        UPDATE : http://localhost:8080/mahasiswa/npm
        DELETE : http://localhost:8080/mahasiswa/npm

lalu buat tampilan FE pada VScode mulai dari Controller, Model, dan View
