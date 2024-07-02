<x-layout>
    <x-slot name="title">Artikel</x-slot>
    <x-dashboard-section route='dashboard.articles.index'>
        <article
            class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 bg-green-400 rounded-full"
                            src="{{ asset('img/static/Lambang_Kabupaten_Majalengka.svg') }}" alt="profile-photo">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                Admin
                            </a>
                            <p class="text-base text-gray-700 dark:text-gray-400">
                                Pemerintah Desa Cidadap
                            </p>
                            <p class="text-base text-gray-700 dark:text-gray-400">
                                <time pubdate datetime="2024-06-12" title="June 12th, 2024">
                                    Feb. 6, 2024
                                </time>
                            </p>
                        </div>
                    </div>
                </address>
                <h1
                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    Pembangunan Jalan Desa Baru
                </h1>
            </header>
            <p class="lead">
                Proyek pembangunan jalan desa baru telah resmi dimulai minggu ini. Pembangunan ini merupakan salah
                satu program unggulan pemerintah Desa Cidadap untuk meningkatkan kualitas infrastruktur dan
                kesejahteraan masyarakat. Jalan baru ini diharapkan akan membawa berbagai manfaat signifikan bagi
                warga desa.
            </p>

            <figure>
                <img class="w-full h-96 rounded-lg object-cover"
                    src="https://images.pexels.com/photos/2489/street-building-construction-industry.jpg?auto=compress&cs=tinysrgb&w=600"
                    alt="road-construction">
                <figcaption>Pembangunan Jalan Baru</figcaption>
            </figure>
            <h2>Tujuan dan Manfaat Pembangunan Jalan Desa Baru</h2>
            <p>
                Tujuan utama dari pembangunan jalan ini adalah untuk meningkatkan aksesibilitas dan kenyamanan bagi
                warga Desa Cidadap. Selama ini, kondisi jalan yang kurang memadai sering kali menjadi hambatan dalam
                kegiatan sehari-hari warga, terutama dalam hal mobilitas dan transportasi. Dengan adanya jalan baru
                ini, diharapkan warga dapat menikmati perjalanan yang lebih lancar dan aman.
            </p>
            <p>
                Selain itu, pembangunan jalan baru ini juga bertujuan untuk mempermudah transportasi hasil pertanian
                dan produk lokal. Desa Cidadap dikenal dengan hasil pertanian yang melimpah serta produk-produk
                lokal yang berkualitas. Dengan akses jalan yang lebih baik, distribusi hasil pertanian dan produk
                lokal akan menjadi lebih efisien, sehingga dapat meningkatkan perekonomian desa secara keseluruhan.
            </p>
            <h2>Tujuan dan Manfaat Pembangunan Jalan Desa Baru</h2>
            <p>
                Proyek pembangunan jalan desa ini melibatkan berbagai pihak, termasuk pemerintah desa, kontraktor
                lokal, dan warga setempat. Pemerintah desa telah melakukan koordinasi dengan berbagai pihak terkait
                untuk memastikan proses pembangunan berjalan lancar dan tepat waktu. Selain itu, warga desa juga
                turut berpartisipasi dalam proyek ini, baik melalui gotong royong maupun memberikan masukan yang
                konstruktif.
            </p>
            <p>
                Kepala Desa Cidadap, Bapak Ahmad Syahroni, menyampaikan apresiasinya atas partisipasi aktif warga
                dalam proyek ini. "Kami sangat menghargai dukungan dan partisipasi warga Desa Cidadap dalam
                pembangunan jalan desa baru ini. Ini adalah bukti nyata semangat gotong royong dan kebersamaan kita
                dalam membangun desa yang lebih baik," ujarnya.
            </p>
            <h2>Harapan untuk Masa Depan</h2>
            <p>
                Dengan dimulainya proyek pembangunan jalan desa baru ini, pemerintah desa berharap bahwa berbagai
                hambatan yang selama ini dirasakan oleh warga dapat teratasi. Jalan baru ini tidak hanya akan
                meningkatkan mobilitas dan transportasi, tetapi juga diharapkan dapat mendorong pertumbuhan ekonomi
                desa.
            </p>
            <p>
                Pembangunan jalan desa baru ini juga merupakan bagian dari rencana jangka panjang pemerintah Desa
                Cidadap untuk meningkatkan kualitas hidup warganya. Ke depan, pemerintah desa berencana untuk terus
                mengembangkan infrastruktur dan fasilitas publik lainnya guna menciptakan desa yang lebih maju dan
                sejahtera.
            </p>

            <h2>Kesimpulan</h2>
            <p>Proyek pembangunan jalan desa baru di Desa Cidadap adalah langkah penting dalam meningkatkan
                aksesibilitas dan kenyamanan bagi warga, serta mempermudah transportasi hasil pertanian dan produk
                lokal. Dengan partisipasi aktif dari warga dan dukungan penuh dari pemerintah desa, diharapkan
                proyek ini dapat selesai tepat waktu dan memberikan manfaat yang besar bagi seluruh masyarakat Desa
                Cidadap.
            </p>
            <p>
                Untuk informasi lebih lanjut mengenai perkembangan proyek ini, warga desa dapat mengunjungi kantor
                desa atau mengakses situs web resmi Desa Cidadap. Mari kita bersama-sama mendukung pembangunan ini
                demi kemajuan dan kesejahteraan Desa Cidadap.
            </p>
        </article>

        <div class="flex gap-4 justify-center items-center">
            <div class="flex items-center space-x-3 sm:space-x-4">
                <a href="{{ route('dashboard.articles.edit', $detail['id']) }}" type="button"
                    class="text-white inline-flex items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd"
                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                            clip-rule="evenodd" />
                    </svg>
                    Ubah
                </a>
            </div>
            <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                data-id="
                {{ $detail['id'] }} 
                 "
                class="delete-button text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                Hapus
            </button>
        </div>

        <!-- Delete modal -->
        <div id="deleteModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <button type="button"
                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="deleteModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <svg class="text-gray-400 dark:text-gray-700 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mb-4 text-gray-700 dark:text-gray-300">Apakah Anda yakin ingin menghapus item ini?</p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="deleteModal" type="button"
                            class="py-2 px-3 text-sm font-medium text-gray-700 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Batalkan</button>
                        <form action="{{ route('dashboard.gallery.destroy', $detail['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Hapus
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-dashboard-section>
</x-layout>

<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', () => {
            const itemId = button.getAttribute('data-id');

            document.getElementById('delete-form').setAttribute('action',
                `/dashboard/gallery/${itemId}`);
        })
    })
</script>
