<x-layout>
    <x-slot name="title">Tentang Kami</x-slot>
    {{-- <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tentang Kami - Desa Cidadap</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <style>
            .text-justify {
                text-align: justify;
            }
        </style>
    </head> --}}

    <body class="font-sans antialiased">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Selamat Datang di Desa Cidadap
            </h1>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
                Kenali kami lebih jauh melalui profil kami di bawah ini
            </p>
        </div>
        <section class="bg-white-100 p-16 ">
            <div class="container mx-auto">
                <div class="bg-white-200 text-grey  rounded-lg  flex flex-col md:flex-row items-center md:items-start">
                    <!-- Sambutan Kepala Desa -->
                    <div class="md:w-2/3">
                        <div class="container mx-auto">
                            <h2 class="text-3xl font-bold mb-4">Sambutan Kepala Desa</h2>
                            <p class="text-lg text-justify">
                                Assalamu'alaikum Warahmatullahi Wabarakatuh,
                            </p>
                            <p class="text-lg text-justify mb-4">
                                Selamat datang di website resmi Desa Cidadap. Sebagai kepala desa, saya merasa terhormat
                                dan bersemangat
                                untuk memperkenalkan desa kita yang indah ini kepada dunia. Desa Cidadap bukan hanya
                                sekadar tempat tinggal,
                                tetapi juga komunitas yang kaya akan budaya, tradisi, dan semangat gotong royong.
                                Melalui website ini, kami
                                berharap dapat memberikan informasi yang berguna dan terkini tentang berbagai kegiatan,
                                program, dan
                                perkembangan yang ada di desa kita. Kami juga berharap bahwa website ini dapat menjadi
                                sarana komunikasi
                                yang efektif antara pemerintah desa dan seluruh warga, baik yang berada di dalam desa
                                maupun di perantauan.
                            </p>
                            <p class="text-lg text-justify">
                                Saya mengajak seluruh warga Desa Cidadap untuk aktif berpartisipasi dalam pembangunan
                                desa kita tercinta.
                                Mari kita bersama-sama menjaga dan melestarikan nilai-nilai luhur yang telah diwariskan
                                oleh leluhur kita,
                                sambil terus berinovasi dan beradaptasi dengan perkembangan zaman. Semoga dengan adanya
                                website ini,
                                transparansi dan akuntabilitas dalam pemerintahan desa dapat semakin meningkat, dan kita
                                semua dapat
                                bekerja sama untuk mewujudkan Desa Cidadap yang maju, mandiri, dan sejahtera. Terima
                                kasih atas perhatian
                                dan partisipasi Anda.
                            </p>
                            <p class="text-lg text-justify">
                                Wassalamu'alaikum Warahmatullahi Wabarakatuh.
                            </p>
                        </div>
                    </div>
                    <!-- Foto Kepala Desa -->
                    <div
                        class="md:w-1/3 mt-4 md:mt-0 md:ml-6 mx-auto h-full w-full dark:hidden rounded-lg object-cover">
                        <img src="https://png.pngtree.com/png-clipart/20221020/original/pngtree-kepala-daerah-png-image_8708543.png"
                            alt="Foto Kepala Desa" class="rounded-lg shadow-lg w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- Visi dan Misi Desa Section -->
        <section class="bg-white-200 p-8 mt-8 mb-8">
            <div class="container mx-auto">
                <h2 class="text-4xl font-bold mb-4 text-center">Visi dan Misi Desa Cidadap</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-2">
                    <!-- Blok 1 -->
                    <div class="p-4 bg-gray-100 text-black shadow">
                        <h2 class="text-2xl font-bold mb-2 text-center">Visi</h2>
                        <p>Menjadikan Desa Cidadap sebagai desa yang makmur dan sejahtera, berlandaskan pada nilai-nilai
                            budaya dan gotong royong.
                        </p>
                    </div>
                    <!-- Blok 2 -->
                    <div class="p-4 bg-gray-100 text-black shadow">
                        <h2 class="text-2xl font-bold mb-2 text-center">Misi</h2>
                        <ol class="ps-5 mt-2 space-y-1 list-decimal list-inside">
                            <li>Meningkatkan kualitas hidup masyarakat melalui program pembangunan berkelanjutan.</li>
                            <li>Memajukan sektor pertanian dan ekonomi kreatif sebagai sumber pendapatan utama.</li>
                            <li>Menjaga dan melestarikan lingkungan serta kearifan lokal.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sejarah Desa Section -->
        <section class="bg-white dark:bg-gray-900">
            <div class="bg-gray-100 rounded-lg max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h2 class="text-4xl text-center font-bold mb-4">Sejarah dan Asal Usul Desa Cidadap</h2>
                    <p class="text-lg text-center">
                        Desa Cidadap, yang didirikan pada tahun 1865, merupakan salah satu desa tertua di wilayah
                        Kecamatan Cingambul,
                        Kabupaten Majalengka. Nama Desa Cidadap diambil dari hasil musyawarah para sesepuh dan tokoh
                        ulama,
                        yang terinspirasi dari pohon Dadap yang tumbuh besar dan kokoh di Kampung Ciulu. Pohon ini
                        diyakini
                        memiliki khasiat obat dan menjadi simbol kekuatan serta kesehatan bagi masyarakat desa.
                    </p>

                    <p class="text-lg text-center">Pada awalnya, Desa Cidadap dihuni oleh penduduk yang mayoritas
                        bermata pencaharian sebagai petani.
                        Luas lahan pertanian di desa ini mencapai 552 hektar, menjadikannya salah satu sumber daya alam
                        yang utama.
                        Hingga saat ini, sektor pertanian masih menjadi tulang punggung perekonomian desa.
                    </p>
                </div>
            </div>
        </section>

        <!-- Demografik Desa Section -->
        <section class="bg-white-200 p-8 mt-8 mb-8 ">
            <div class="container mx-auto">
                <div class="bg-white-200 text-grey  rounded-lg  flex flex-col md:flex-row items-center md:items-start">
                    <div class="md:w-1/2 mt-4 md:mt-0 md:ml-6 mx-auto dark:hidden rounded-lg object-cover">
                        <img class="mx-auto h-70 w-50 dark:hidden rounded-lg object-cover"
                            src="https://imgur.com/MB1tTu7" alt="Foto peta desa">
                    </div>
                    <div class="md:w-1/2 p-6">
                        <div class="container mx-auto">
                            <h2 class="text-3xl font-bold mb-4">Wilayah Desa Cidadap</h2>
                            <p class="text-lg">Desa Cidadap memiliki luas wilayah sebesar 274.548,5 hektar yang terdiri
                                dari 3 dusun, 6 Rukun Warga (RW),
                                dan 12 Rukun Tetangga (RT). Berikut adalah batas wilayah administratif Desa Cidadap:
                            <ul class="text-lg mt-4 list-disc list-inside">
                                <li>
                                    <strong>Utara</strong> : Desa Sindang, Kecamatan Talaga
                                </li>
                                <li>
                                    <strong>Selatan</strong>: Desa Maniis, Kecamatan Cingambul
                                </li>
                                <li>
                                    <strong> Timur</strong>: Desa Rawa, Kecamatan Cingambul
                                </li>
                                <li>
                                    <strong> Barat</strong> : Desa Cintaasih, Kecamatan Cingambul
                            </ul>
                            </p>
                            <p class="text-lg mt-4">Desa Cidadap memiliki total luas tanah sebesar 184,496 hektar, di
                                mana lahan pertanian merupakan yang paling dominan.
                                Lahan di desa ini umumnya digunakan secara produktif, menunjukkan potensi besar untuk
                                pengembangan sumber daya alam.
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Statistik Desa Section -->
        <section class="bg-white dark:bg-gray-900">
            <div class="bg-gray-100 rounded-lg max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
                <h2 class="text-3xl font-bold mb-4">Penduduk Desa Cidadap</h2>
                <p class="text-lg mb-4">Jumlah penduduk Desa Cidadap berdasarkan data terakhir tercatat sebanyak 2.785
                    jiwa dengan jumlah
                    826 kartu keluarga. Dengan sebaran penduduk sebagai berikut.
                </p>

                <div class="md:w-1/2 p-6">
                    <table class="w-full text-sm text-left rtl:text-right text-black-500 dark:text-gray-400">
                        <thead class="text-m text-black-700 uppercase dark:text-black-400">
                            <tr>
                                <th>Jenis Kelamin</th>
                                <th>Jumlah</th>
                                <th>Persentase (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Laki-Laki</td>
                                <td>1.421 orang</td>
                                <td><strong>51.5%</strong></td>
                            </tr>
                            <tr>
                                <td>Perempuan</td>
                                <td>1.364 orang</td>
                                <td><strong>48.5%</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
                <div class="mx-auto mb-6 max-w-screen-sm lg:mb-16">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Struktur
                        Organisasi</h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Pemerintah Desa Cidadap Kecamatan
                        Cingambul Kabupaten Majalengka</p>
                </div>

                <div class="text-center text-gray-500 dark:text-gray-400 mb-8">
                    <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                        alt="Jese Avatar">
                    <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="#">Suntono</a>
                    </h3>
                    <p>Kepala Desa</p>
                </div>

                <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                            alt="Bonnie Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Hendra, S.Pd</a>
                        </h3>
                        <p>Sekretaris Desa</p>
                    </div>

                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png"
                            alt="Helene Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Aang Syahrowardi</a>
                        </h3>
                        <p>Kaur Keuangan</p>
                    </div>

                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                            alt="Jese Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Hendriyana</a>
                        </h3>
                        <p>Kaur Umum</p>
                    </div>

                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                            alt="Joseph Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Rudi Rusmayadi</a>
                        </h3>
                        <p>Kaur Perencanaan</p>
                    </div>

                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/sofia-mcguire.png"
                            alt="Sofia Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Mamat Rahmat</a>
                        </h3>
                        <p>Kasi Pelayanan</p>
                    </div>

                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/thomas-lean.png"
                            alt="Leslie Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Nurjamal</a>
                        </h3>
                        <p>Kasi Pemerintahan</p>
                    </div>

                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png"
                            alt="Michael Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Rona Judrat</a>
                        </h3>
                        <p>Kasi Kesra</p>
                    </div>

                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/neil-sims.png"
                            alt="Neil Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Ujang Yana Taryana</a>
                        </h3>
                        <p>Kadus I</p>

                    </div>
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/neil-sims.png"
                            alt="Neil Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Jajang Gunawan</a>
                        </h3>
                        <p>Kadus II</p>

                    </div>
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/neil-sims.png"
                            alt="Neil Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">Dian Maulana</a>
                        </h3>
                        <p>Kadus III</p>
                    </div>
                </div>
            </div>
        </section>


    </body>
</x-layout>
