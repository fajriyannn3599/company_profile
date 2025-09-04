@extends('layouts.frontend')

@section('title', $service->meta_title ?: $service->title . ' - ' . setting('site_name'))
@section('meta_description', $service->meta_description ?: $service->short_description)

@section('content')
    <!-- Service Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center bg-gradient-to-br from-red-900 to-red-700">
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="text-white mb-8">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-200" style="font-family: 'Poppins', sans-serif;">Beranda</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li><a href="{{ route('services.index') }}" class="hover:text-blue-200" style="font-family: 'Poppins', sans-serif;">Produk</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-blue-200" style="font-family: 'Poppins', sans-serif;">{{ $service->title }}</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-white">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6" style="font-family: 'Poppins', sans-serif;">{{ $service->title }}</h1>
                    <p class="text-xl opacity-90 leading-relaxed" style="font-family: 'Poppins', sans-serif;">{{ $service->short_description }}</p>

                    @if($service->serviceCategory)
                        <div class="mt-6">
                            <span class="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-full">
                                <i class="fas fa-star mr-1"></i>
                                {{ $service->serviceCategory->name }}
                            </span>
                        </div>
                    @endif
                </div>

                <div class="text-center">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                        class="w-full max-w-md mx-auto rounded-lg shadow-xl">
                    @elseif($service->icon)
                            <div class="text-8xl mb-6 text-blue-200">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- Service Content -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start"
                style="font-family: 'Poppins', sans-serif;">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="prose prose-lg max-w-none">
                        @if($service->description)
                            @foreach(explode("\n", strip_tags($service->description)) as $paragraph)
                                @if(str_contains($paragraph, ':'))
                                    @php
                                        $parts = explode(':', $paragraph, 2);
                                        $title = trim($parts[0]);
                                        $content = trim($parts[1] ?? '');
                                    @endphp
                                    @if(str_starts_with($title, '-') || str_starts_with($content, '-'))
                                        <!-- List Section -->
                                        <div class="my-6">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ str_replace('-', '', $title) }}</h3>
                                            <ul class="columns-2 gap-20 space-y-2">
                                                @foreach(explode('-', strip_tags($content)) as $item)
                                                    @if(trim($item))
                                                        <li class="break-inside-avoid flex items-start" style="font-family: 'Poppins', sans-serif;">
                                                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                                                            <span>{{ trim($item) }}</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <!-- Regular Section -->
                                        <div class="my-6">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $title }}</h3>
                                            <p class="text-gray-600 leading-relaxed">{{ $content }}</p>
                                        </div>
                                    @endif
                                @else
                                    <!-- Regular Paragraph -->
                                    <p class="text-gray-600 leading-relaxed mb-6">{{ $paragraph }}</p>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Requirement_Description -->
                <div class="lg:col-span-2">
                <div class="prose prose-lg max-w-none">

                @foreach ([
                    'requirement_description' => 'Deskripsi 1',
                    'requirement_description_2' => 'Deskripsi 2',
                    'requirement_description_3' => 'Deskripsi 3',
                ] as $field => $defaultTitle)

                @php
                    $content = strip_tags($service->$field ?? '');
                @endphp

                    @if(!empty($content))
                        @foreach(explode("\n", $content) as $index => $paragraph)
                            @if(str_contains($paragraph, ':'))
                                @php
                                    $parts = explode(':', $paragraph, 2);
                                    $title = trim($parts[0]) ?: $defaultTitle;
                                    $list = trim($parts[1] ?? '');
                                    $accordionId = "{$field}-accordion-{$index}";
                                @endphp

                        @if(str_starts_with($list, '-') || str_starts_with($title, '-'))
                            <!-- Accordion List Section -->
                            <div class="my-6 border border-gray-300 rounded-md">
                                <button type="button"
                                    onclick="toggleAccordion('{{ $accordionId }}')"
                                    class="w-full text-left px-4 py-3 bg-red-900 text-white font-semibold flex justify-between items-center">
                                    <span>{{ str_replace('-', '', $title) }}</span>
                                    <svg id="icon-{{ $accordionId }}" class="w-5 h-5 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <div id="{{ $accordionId }}" class="hidden px-6 py-4 bg-white">
                                    <ul class="space-y-2">
                                        @foreach(explode('-', $list) as $item)
                                            @if(trim($item))
                                                <li class="flex items-start">
                                                    <i class="fas fa-check-circle text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                                                    <span>{{ trim($item) }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <!-- Section Biasa -->
                            <div class="my-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $title }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $list }}</p>
                            </div>
                        @endif
                    @else
                        <!-- Paragraf Biasa -->
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $paragraph }}</p>
                    @endif
                        @endforeach
                @endif

                @endforeach

            </div>
        </div>


                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Contact Card -->
                    <div class="bg-blue-50 rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4" style="font-family: 'Poppins', sans-serif;">Butuh Konsultasi?</h3>
                        <p class="text-gray-600 mb-6" style="font-family: 'Poppins', sans-serif;">Diskusikan kebutuhan produk Anda dengan tim ahli kami</p>

                        <div class="space-y-4">
                            <a href="{{ route('hubungi-kami') }}"
                                class="block bg-orange-700 hover:bg-blue-700 text-white text-center px-6 py-3 rounded-lg font-semibold transition-colors" style="font-family: 'Poppins', sans-serif;">
                                Konsultasi Gratis
                            </a>

                            @if(setting('contact_whatsapp'))
                                <a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', setting('contact_whatsapp')) }}"
                                    target="_blank"
                                    class="block bg-green-600 hover:bg-green-700 text-white text-center px-6 py-3 rounded-lg font-semibold transition-colors" style="font-family: 'Poppins', sans-serif;">
                                    <i class="fab fa-whatsapp mr-2"></i>
                                    WhatsApp
                                </a>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Simulasi Pembiayaan Kendaraan -->
@if($service->vehicle_simulation)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Form Input -->
        <form id="simulasiFormKendaraan" class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Kendaraan</h2>

            <div class="space-y-4">
            <div>
                <label class="block font-semibold">Harga Kendaraan (OTR)</label>
                <input type="text" id="hargaMobilKendaraan" value="Rp. 0" class="w-full border rounded p-2 text-left" />
            </div>

            <div>
                <label class="block font-semibold">Total Uang Muka</label>
                <input type="text" id="uangMukaKendaraan" value="Rp. 0" class="w-full border rounded p-2 text-left" />
            </div>

            <div>
                <label class="block font-semibold">Tenor (Bulan)</label>
                <select id="tenorKendaraan" class="w-full border rounded p-2">
                <option value="" selected disabled>Pilih tenor</option>
                <option value="12">12</option>
                <option value="24">24</option>
                <option value="36">36</option>
                <option value="48">48</option>
                <option value="60">60</option>
                </select>
            </div>
            </div>

            <!-- Error Alert -->
            <div id="errorBoxKendaraan" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul id="errorListKendaraan" class="list-disc pl-5 text-sm"></ul>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6">
            <button type="submit" 
                    class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Hitung Simulasi
            </button>
            </div>
        </form>

        <!-- Ringkasan -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
            <ul class="space-y-2 text-gray-700">
            <li>Harga Kendaraan (OTR): <span id="outHargaKendaraan">Rp. 0</span></li>
            <li>Uang Muka Murni: <span id="outUangMukaKendaraan">Rp. 0</span></li>
            <li>Plafon Pembiayaan: <span id="outPlafonKendaraan">Rp. 0</span></li>
            <li>Tenor: <span id="outTenorKendaraan">0</span> bulan</li>
            <li class="font-bold">Angsuran Perbulan: <span id="outAngsuranKendaraan" class="text-red-700">Rp. 0</span></li>
            </ul>

            <h4 class="mt-6 font-bold">Rincian Biaya</h4>
            <ul class="space-y-1 text-gray-600">
            <li>Asuransi jiwa</li>
            <li>Asuransi Kendaraan (TLO)</li>
            <li>Biaya Notaris</li>
            <li>Biaya Pengecekan Kendaraan</li>
            <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon</li>
            </ul>
        </div>
        </div>
    </div>
</section>
@endif

<script>
function formatRupiah(angka) {
  if (!angka) return "Rp. 0";
  return "Rp. " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function unformatRupiah(str) {
  return parseInt(str.replace(/[^0-9]/g, "")) || 0;
}

function hitungSimulasiKendaraan() {
  let harga = unformatRupiah(document.getElementById("hargaMobilKendaraan").value);
  let dp = unformatRupiah(document.getElementById("uangMukaKendaraan").value);
  let tenor = parseInt(document.getElementById("tenorKendaraan").value);

  let admin = Math.round(harga * 0.0125);
  let fiducia = 275000;
  let asuransi = Math.round(harga * 0.026);
  let bbnkb = Math.round(harga * 0.05);

  let errors = [];
  let minDp = Math.round(harga * 0.05);

  if (dp <= 0) {
    errors.push("Uang muka harus lebih dari 0.");
  } else if (dp < minDp) {
    errors.push("Minimum Total Uang Muka adalah " + formatRupiah(minDp));
  }

  if (!tenor) {
    errors.push("Silakan pilih tenor terlebih dahulu.");
  }

  if (errors.length > 0) {
    document.getElementById("errorBoxKendaraan").classList.remove("hidden");
    document.getElementById("errorListKendaraan").innerHTML = errors.map(e => `<li>${e}</li>`).join("");
    return;
  } else {
    document.getElementById("errorBoxKendaraan").classList.add("hidden");
  }

  let plafon = harga - dp;
  let angsuranBerdasarkanPersen = plafon * 0.0125 * tenor;
  let totalAngsuran = angsuranBerdasarkanPersen + plafon;
  let angsuran = totalAngsuran / tenor;
  angsuran = Math.round(angsuran);

  document.getElementById("outHargaKendaraan").innerText = formatRupiah(harga);
  document.getElementById("outUangMukaKendaraan").innerText = formatRupiah(dp);
  document.getElementById("outPlafonKendaraan").innerText = formatRupiah(plafon);
  document.getElementById("outTenorKendaraan").innerText = tenor || 0;
  document.getElementById("outAngsuranKendaraan").innerText = formatRupiah(angsuran);
}

document.querySelectorAll("#hargaMobilKendaraan, #uangMukaKendaraan").forEach(el => {
  el.addEventListener("input", e => {
    let cursor = el.selectionStart;
    el.value = formatRupiah(unformatRupiah(el.value));
    el.setSelectionRange(cursor, cursor);
  });
});

document.getElementById("simulasiFormKendaraan").addEventListener("submit", function(e) {
  e.preventDefault();
  hitungSimulasiKendaraan();
});
</script>

    <script>
function formatRupiah(angka) {
  if (!angka) return "Rp. 0";
  return "Rp. " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function unformatRupiah(str) {
  return parseInt(str.replace(/[^0-9]/g, "")) || 0;
}

function hitungSimulasi() {
  let harga = unformatRupiah(document.getElementById("hargaMobil").value);
  let dp = unformatRupiah(document.getElementById("uangMuka").value);
  let tenor = parseInt(document.getElementById("tenor").value);

  // biaya tetap
  let admin = Math.round(harga * 0.0125); // Biaya administrasi
  let fiducia = 275000;  // Biaya Fiducia
  let asuransi = Math.round(harga * 0.026); // Biaya Asuransi
  let bbnkb = Math.round(harga * 0.05); // Biaya BBNKB

  let errors = [];

  // validasi DP
  let minDp = Math.round(harga * 0.05); // Minimum uang muka 15%
  if (dp <= 0) {
    errors.push("Uang muka harus lebih dari 0.");
  } else if (dp < minDp) {
    errors.push("Minimum Total Uang Muka adalah " + formatRupiah(minDp));
  }

  if (!tenor) {
    errors.push("Silakan pilih tenor terlebih dahulu.");
  }

  if (errors.length > 0) {
    document.getElementById("errorBox").classList.remove("hidden");
    document.getElementById("errorList").innerHTML = errors.map(e => `<li>${e}</li>`).join("");
    return; // stop hitung
  } else {
    document.getElementById("errorBox").classList.add("hidden");
  }

  // Menghitung Plafon Pembiayaan
  let plafon = harga - dp;

  // Menghitung Angsuran Berdasarkan 1.25% dari Plafon, dikali Tenor
  let angsuranBerdasarkanPersen = plafon * 0.0125 * tenor;

  // Menambahkan Angsuran Berdasarkan Persen dengan Plafon, dan membaginya dengan tenor yang dipilih
  let totalAngsuran = angsuranBerdasarkanPersen + plafon;
  let angsuran = totalAngsuran / tenor; // Pembagian berdasarkan tenor yang dipilih

  // Membulatkan hasil angsuran
  angsuran = Math.round(angsuran);

  // Output hasil simulasi
  document.getElementById("outHarga").innerText = formatRupiah(harga);
  document.getElementById("outUangMukaMurni").innerText = formatRupiah(dp);
  document.getElementById("outPlafon").innerText = formatRupiah(plafon);
  document.getElementById("outTenor").innerText = tenor || 0;
  document.getElementById("outAngsuran").innerText = formatRupiah(angsuran);
  document.getElementById("outAsuransi").innerText = formatRupiah(asuransi);
  document.getElementById("outAdmin").innerText = formatRupiah(admin);
  document.getElementById("outFiducia").innerText = formatRupiah(fiducia);
  document.getElementById("outBbnkb").innerText = formatRupiah(bbnkb);
}

// auto format input
document.querySelectorAll("#hargaMobil, #uangMuka").forEach(el => {
  el.addEventListener("input", e => {
    let cursor = el.selectionStart;
    el.value = formatRupiah(unformatRupiah(el.value));
    el.setSelectionRange(cursor, cursor);
  });
});

// submit button action
document.getElementById("simulasiForm").addEventListener("submit", function(e) {
  e.preventDefault();
  hitungSimulasi();
});

// trigger awal
hitungSimulasi();
</script>

    <!-- Simulasi Pembiayaan Pernikahan -->
    @if($service->marriage_simulation)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
              
              <!-- Form Input -->
              <form id="simulasiForm" class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Pernikahan </h2>

                <div class="space-y-4">
                  <div>
                    <label class="block font-semibold">Harga Kendaraan (OTR)</label>
                    <input type="text" id="hargaMobil" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Total Uang Muka</label>
                    <input type="text" id="uangMuka" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Tenor (Bulan)</label>
                    <select id="tenor" class="w-full border rounded p-2">
                      <option value="" selected disabled>Pilih tenor</option>
                      <option value="12">12</option>
                      <option value="24">24</option>
                      <option value="36">36</option>
                      <option value="48">48</option>
                      <option value="60">60</option>
                    </select>
                  </div>
                </div>

                <!-- Error Alert -->
                <div id="errorBox" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                  <ul id="errorList" class="list-disc pl-5 text-sm"></ul>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                  <button type="submit" 
                          class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Hitung Simulasi
                  </button>
                </div>
              </form>

              <!-- Ringkasan -->
              <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
                <ul class="space-y-2 text-gray-700">
                  <li>Harga Kendaraan (OTR): <span id="outHarga">Rp. 0</span></li>
                  <li>Uang Muka Murni: <span id="outUangMukaMurni">Rp. 0</span></li>
                  <li>Plafon Pembiayaan: <span id="outPlafon">Rp. 0</span></li>
                  <li>Tenor: <span id="outTenor">0</span> bulan</li>
                  <li class="font-bold">Angsuran Perbulan: <span id="outAngsuran" class="text-red-700">Rp. 0</span></li>
                </ul>

                <h4 class="mt-6 font-bold">Rincian Biaya</h4>
                <ul class="space-y-1 text-gray-600">
                  <li>Asuransi jiwa
                  <li>Asuransi Kendaraan (TLO)
                  <li>Biaya Notaris
                  <li>Biaya Pengecekan Kendaraan
                  <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon
                </ul>
              </div>
            </div>
        </div>
    </section>
@endif


   <!-- Simulasi Pembiayaan Multijasa -->
@if($service->education_simulation)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          
          <!-- Form Input -->
          <form id="simulasiFormPendidikan" class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Multijasa</h2>

            <div class="space-y-4">
              <div>
                <label class="block font-semibold">Nilai Pembiayaan</label>
                <input type="text" id="hargaPendidikan" value="Rp. 0" class="w-full border rounded p-2 text-left" />
              </div>

              <div>
                <label class="block font-semibold">Total Uang Muka</label>
                <input type="text" id="uangMukaPendidikan" value="Rp. 0" class="w-full border rounded p-2 text-left" />
              </div>

              <div>
                <label class="block font-semibold">Tenor (Bulan)</label>
                <select id="tenorPendidikan" class="w-full border rounded p-2">
                  <option value="" selected disabled>Pilih tenor</option>
                  <option value="12">12</option>
                  <option value="24">24</option>
                  <option value="36">36</option>
                </select>
              </div>
            </div>

            <!-- Error Alert -->
            <div id="errorBoxPendidikan" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
              <ul id="errorListPendidikan" class="list-disc pl-5 text-sm"></ul>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6">
              <button type="submit" 
                      class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Hitung Simulasi
              </button>
            </div>
          </form>

          <!-- Ringkasan -->
          <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
            <ul class="space-y-2 text-gray-700">
              <li>Nilai Pembiayaan Multijasa <span id="outHargaPendidikan">Rp. 0</span></li>
              <li>Uang Muka Murni: <span id="outUangMukaPendidikan">Rp. 0</span></li>
              <li>Plafon Pembiayaan: <span id="outPlafonPendidikan">Rp. 0</span></li>
              <li>Tenor: <span id="outTenorPendidikan">0</span> bulan</li>
              <li class="font-bold">Angsuran Perbulan: <span id="outAngsuranPendidikan" class="text-red-700">Rp. 0</span></li>
            </ul>

            <h4 class="mt-6 font-bold">Rincian Biaya</h4>
            <ul class="space-y-1 text-gray-600">
              <li>Asuransi Jiwa</li>
              <li>Biaya Administrasi</li>
            </ul>
          </div>
        </div>
    </div>
</section>
@endif

<script>
function formatRupiah(angka) {
  if (!angka) return "Rp. 0";
  return "Rp. " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function unformatRupiah(str) {
  return parseInt(str.replace(/[^0-9]/g, "")) || 0;
}

function hitungSimulasiPendidikan() {
  let hargaPendidikan = unformatRupiah(document.getElementById("hargaPendidikan").value);
  let dpPendidikan = unformatRupiah(document.getElementById("uangMukaPendidikan").value);
  let tenorPendidikan = parseInt(document.getElementById("tenorPendidikan").value);

  let admin = Math.round(hargaPendidikan * 0.0125);  // Biaya administrasi
  let fiducia = 275000;  // Biaya Fiducia
  let asuransi = Math.round(hargaPendidikan * 0.026);  // Biaya Asuransi
  let bbnkb = Math.round(hargaPendidikan * 0.05);  // Biaya BBNKB

  let errors = [];

  // Set minDp menjadi 0 agar DP bisa 0
  let minDp = 0;

  // Validasi DP
  if (dpPendidikan < minDp) {
    errors.push("Uang muka tidak boleh kurang dari 0.");
  }

  if (!tenorPendidikan) {
    errors.push("Silakan pilih tenor terlebih dahulu.");
  }

  if (errors.length > 0) {
    document.getElementById("errorBoxPendidikan").classList.remove("hidden");
    document.getElementById("errorListPendidikan").innerHTML = errors.map(e => `<li>${e}</li>`).join("");
    return; // Stop hitung
  } else {
    document.getElementById("errorBoxPendidikan").classList.add("hidden");
  }

  let plafonPendidikan = hargaPendidikan - dpPendidikan;
  let angsuranPendidikan = (plafonPendidikan * 0.0125 * tenorPendidikan + plafonPendidikan) / tenorPendidikan;
  angsuranPendidikan = Math.round(angsuranPendidikan);

  // Output hasil simulasi
  document.getElementById("outHargaPendidikan").innerText = formatRupiah(hargaPendidikan);
  document.getElementById("outUangMukaPendidikan").innerText = formatRupiah(dpPendidikan);
  document.getElementById("outPlafonPendidikan").innerText = formatRupiah(plafonPendidikan);
  document.getElementById("outTenorPendidikan").innerText = tenorPendidikan || 0;
  document.getElementById("outAngsuranPendidikan").innerText = formatRupiah(angsuranPendidikan);
}

document.querySelectorAll("#hargaPendidikan, #uangMukaPendidikan").forEach(el => {
  el.addEventListener("input", e => {
    let cursor = el.selectionStart;
    el.value = formatRupiah(unformatRupiah(el.value));
    el.setSelectionRange(cursor, cursor);
  });
});

document.getElementById("simulasiFormPendidikan").addEventListener("submit", function(e) {
  e.preventDefault();
  hitungSimulasiPendidikan();
});
</script>

    <!-- Simulasi Pembiayaan Rumah -->
@if($service->property_simulation)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          
          <!-- Form Input -->
          <form id="simulasiFormRumah" class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Rumah</h2>

            <div class="space-y-4">
              <div>
                <label class="block font-semibold">Harga Rumah (OTR)</label>
                <input type="text" id="hargaRmh" value="Rp. 0" class="w-full border rounded p-2 text-left" />
              </div>

              <div>
                <label class="block font-semibold">Total Uang Muka</label>
                <input type="text" id="uangMukaRmh" value="Rp. 0" class="w-full border rounded p-2 text-left" />
              </div>

              <div>
                <label class="block font-semibold">Tenor (Bulan)</label>
                <select id="tenorRmh" class="w-full border rounded p-2">
                  <option value="" selected disabled>Pilih tenor</option>
                  <option value="12">12</option>
                  <option value="24">24</option>
                  <option value="36">36</option>
                  <option value="48">48</option>
                  <option value="60">60</option>
                </select>
              </div>
            </div>

            <!-- Error Alert -->
            <div id="errorBoxRumah" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
              <ul id="errorListRumah" class="list-disc pl-5 text-sm"></ul>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6">
              <button type="submit" 
                      class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Hitung Simulasi
              </button>
            </div>
          </form>

          <!-- Ringkasan -->
          <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
            <ul class="space-y-2 text-gray-700">
              <li>Harga Rumah (OTR): <span id="outHargaRumah">Rp. 0</span></li>
              <li>Uang Muka Murni: <span id="outUangMukaRumah">Rp. 0</span></li>
              <li>Plafon Pembiayaan: <span id="outPlafonRumah">Rp. 0</span></li>
              <li>Tenor: <span id="outTenorRumah">0</span> bulan</li>
              <li class="font-bold">Angsuran Perbulan: <span id="outAngsuranRumah" class="text-red-700">Rp. 0</span></li>
            </ul>

            <h4 class="mt-6 font-bold">Rincian Biaya</h4>
            <ul class="space-y-1 text-gray-600">
              <li>Asuransi jiwa</li>
              <li>Asuransi Kebakaran</li>
              <li>Biaya Notaris</li>
              <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon</li>
            </ul>
          </div>
        </div>
    </div>
</section>
@endif

 <script>
function hitungSimulasiRumah() {
  let hargaRmh = unformatRupiah(document.getElementById("hargaRmh").value);
  let dpRmh = unformatRupiah(document.getElementById("uangMukaRmh").value);
  let tenorRmh = parseInt(document.getElementById("tenorRmh").value);

  let admin = Math.round(hargaRmh * 0.0125);
  let fiducia = 275000;
  let asuransi = Math.round(hargaRmh * 0.026);
  let bbnkb = Math.round(hargaRmh * 0.05);

  let errors = [];
  let minDp = Math.round(hargaRmh * 0.05);

  if (dpRmh <= 0) {
    errors.push("Uang muka harus lebih dari 0.");
  } else if (dpRmh < minDp) {
    errors.push("Minimum Total Uang Muka adalah " + formatRupiah(minDp));
  }

  if (!tenorRmh) {
    errors.push("Silakan pilih tenor terlebih dahulu.");
  }

  if (errors.length > 0) {
    document.getElementById("errorBoxRumah").classList.remove("hidden");
    document.getElementById("errorListRumah").innerHTML = errors.map(e => `<li>${e}</li>`).join("");
    return;
  } else {
    document.getElementById("errorBoxRumah").classList.add("hidden");
  }

  let plafonRumah = hargaRmh - dpRmh;
  let angsuranRumah = (plafonRumah * 0.0125 * tenorRmh + plafonRumah) / tenorRmh;
  angsuranRumah = Math.round(angsuranRumah);

  document.getElementById("outHargaRumah").innerText = formatRupiah(hargaRmh);
  document.getElementById("outUangMukaRumah").innerText = formatRupiah(dpRmh);
  document.getElementById("outPlafonRumah").innerText = formatRupiah(plafonRumah);
  document.getElementById("outTenorRumah").innerText = tenorRmh || 0;
  document.getElementById("outAngsuranRumah").innerText = formatRupiah(angsuranRumah);
}

document.querySelectorAll("#hargaRmh, #uangMukaRmh").forEach(el => {
  el.addEventListener("input", e => {
    let cursor = el.selectionStart;
    el.value = formatRupiah(unformatRupiah(el.value));
    el.setSelectionRange(cursor, cursor);
  });
});

document.getElementById("simulasiFormRumah").addEventListener("submit", function(e) {
  e.preventDefault();
  hitungSimulasiRumah();
});
</script>


    <!-- Simulasi Pembiayaan Haji -->
@if($service->hajj_simulation)
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          
          <!-- Form Input -->
          <form id="simulasiFormHaji" class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Haji</h2>

            <div class="space-y-4">
              <div>
                <label class="block font-semibold">Nilai Biaya Tour&Travel Umroh & Haji Khusus</label>
                <input type="text" id="hargaHaji" value="Rp. 0" class="w-full border rounded p-2 text-left" />
              </div>

              <div>
                <label class="block font-semibold">Total Uang Muka</label>
                <input type="text" id="uangMukaHaji" value="Rp. 0" class="w-full border rounded p-2 text-left" />
              </div>

              <div>
                <label class="block font-semibold">Tenor (Bulan)</label>
                <select id="tenorHaji" class="w-full border rounded p-2">
                  <option value="" selected disabled>Pilih tenor</option>
                  <option value="12">12</option>
                  <option value="24">24</option>
                  <option value="36">36</option>
                </select>
              </div>
            </div>

            <!-- Error Alert -->
            <div id="errorBoxHaji" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
              <ul id="errorListHaji" class="list-disc pl-5 text-sm"></ul>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-6">
              <button type="submit" 
                      class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Hitung Simulasi
              </button>
            </div>
          </form>

          <!-- Ringkasan -->
          <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
            <ul class="space-y-2 text-gray-700">
              <li>Nilai Biaya Tour&Travel Umroh & Haji Khusus <span id="outHargaHaji">Rp. 0</span></li>
              <li>Uang Muka Murni: <span id="outUangMukaHaji">Rp. 0</span></li>
              <li>Plafon Pembiayaan: <span id="outPlafonHaji">Rp. 0</span></li>
              <li>Tenor: <span id="outTenorHaji">0</span> bulan</li>
              <li class="font-bold">Angsuran Perbulan: <span id="outAngsuranHaji" class="text-red-700">Rp. 0</span></li>
            </ul>

            <h4 class="mt-6 font-bold">Rincian Biaya</h4>
            <ul class="space-y-1 text-gray-600">
              <li>Asuransi jiwa</li>
              <li>Biaya Notaris</li>
            </ul>
          </div>
        </div>
    </div>
</section>
@endif

<script>
function formatRupiah(angka) {
  if (!angka) return "Rp. 0";
  return "Rp. " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function unformatRupiah(str) {
  return parseInt(str.replace(/[^0-9]/g, "")) || 0;
}

function hitungSimulasiHaji() {
  let hargaHaji = unformatRupiah(document.getElementById("hargaHaji").value);
  let dpHaji = unformatRupiah(document.getElementById("uangMukaHaji").value);
  let tenorHaji = parseInt(document.getElementById("tenorHaji").value);

  let admin = Math.round(hargaHaji * 0.0125);
  let fiducia = 275000;
  let asuransi = Math.round(hargaHaji * 0.026);
  let bbnkb = Math.round(hargaHaji * 0.05);

  let errors = [];
  let minDp = 5000000;

  if (dpHaji <= 0) {
    errors.push("Uang muka harus lebih dari 0.");
  } else if (dpHaji < minDp) {
    errors.push("Minimum Total Uang Muka adalah " + formatRupiah(minDp));
  }

  if (!tenorHaji) {
    errors.push("Silakan pilih tenor terlebih dahulu.");
  }

  if (errors.length > 0) {
    document.getElementById("errorBoxHaji").classList.remove("hidden");
    document.getElementById("errorListHaji").innerHTML = errors.map(e => `<li>${e}</li>`).join("");
    return;
  } else {
    document.getElementById("errorBoxHaji").classList.add("hidden");
  }

  let plafonHaji = hargaHaji - dpHaji;
  let angsuranHaji = (plafonHaji * 0.0125 * tenorHaji + plafonHaji) / tenorHaji;
  angsuranHaji = Math.round(angsuranHaji);

  document.getElementById("outHargaHaji").innerText = formatRupiah(hargaHaji);
  document.getElementById("outUangMukaHaji").innerText = formatRupiah(dpHaji);
  document.getElementById("outPlafonHaji").innerText = formatRupiah(plafonHaji);
  document.getElementById("outTenorHaji").innerText = tenorHaji || 0;
  document.getElementById("outAngsuranHaji").innerText = formatRupiah(angsuranHaji);
}

document.querySelectorAll("#hargaHaji, #uangMukaHaji").forEach(el => {
  el.addEventListener("input", e => {
    let cursor = el.selectionStart;
    el.value = formatRupiah(unformatRupiah(el.value));
    el.setSelectionRange(cursor, cursor);
  });
});

document.getElementById("simulasiFormHaji").addEventListener("submit", function(e) {
  e.preventDefault();
  hitungSimulasiHaji();
});
</script>

    <!-- Simulasi Pembiayaan Modal Kerja-->
    @if($service->working_capital_simulation)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
              
              <!-- Form Input -->
              <form id="simulasiForm" class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Modal Kerja </h2>

                <div class="space-y-4">
                  <div>
                    <label class="block font-semibold">Harga Kendaraan (OTR)</label>
                    <input type="text" id="hargaMobil" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Total Uang Muka</label>
                    <input type="text" id="uangMuka" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Tenor (Bulan)</label>
                    <select id="tenor" class="w-full border rounded p-2">
                      <option value="" selected disabled>Pilih tenor</option>
                      <option value="12">12</option>
                      <option value="24">24</option>
                      <option value="36">36</option>
                      <option value="48">48</option>
                      <option value="60">60</option>
                    </select>
                  </div>
                </div>

                <!-- Error Alert -->
                <div id="errorBox" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                  <ul id="errorList" class="list-disc pl-5 text-sm"></ul>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                  <button type="submit" 
                          class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Hitung Simulasi
                  </button>
                </div>
              </form>

              <!-- Ringkasan -->
              <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
                <ul class="space-y-2 text-gray-700">
                  <li>Harga Kendaraan (OTR): <span id="outHarga">Rp. 0</span></li>
                  <li>Uang Muka Murni: <span id="outUangMukaMurni">Rp. 0</span></li>
                  <li>Plafon Pembiayaan: <span id="outPlafon">Rp. 0</span></li>
                  <li>Tenor: <span id="outTenor">0</span> bulan</li>
                  <li class="font-bold">Angsuran Perbulan: <span id="outAngsuran" class="text-red-700">Rp. 0</span></li>
                </ul>

                <h4 class="mt-6 font-bold">Rincian Biaya</h4>
                <ul class="space-y-1 text-gray-600">
                  <li>Asuransi jiwa
                  <li>Asuransi Kendaraan (TLO)
                  <li>Biaya Notaris
                  <li>Biaya Pengecekan Kendaraan
                  <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon
                </ul>
              </div>
            </div>
        </div>
    </section>
@endif


<!-- Simulasi Pembiayaan Mesin Usaha -->
    @if($service->business_machine_simulation)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
              
              <!-- Form Input -->
              <form id="simulasiForm" class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Mesin Usaha </h2>

                <div class="space-y-4">
                  <div>
                    <label class="block font-semibold">Harga Kendaraan (OTR)</label>
                    <input type="text" id="hargaMobil" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Total Uang Muka</label>
                    <input type="text" id="uangMuka" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Tenor (Bulan)</label>
                    <select id="tenor" class="w-full border rounded p-2">
                      <option value="" selected disabled>Pilih tenor</option>
                      <option value="12">12</option>
                      <option value="24">24</option>
                      <option value="36">36</option>
                      <option value="48">48</option>
                      <option value="60">60</option>
                    </select>
                  </div>
                </div>

                <!-- Error Alert -->
                <div id="errorBox" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                  <ul id="errorList" class="list-disc pl-5 text-sm"></ul>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                  <button type="submit" 
                          class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Hitung Simulasi
                  </button>
                </div>
              </form>

              <!-- Ringkasan -->
              <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
                <ul class="space-y-2 text-gray-700">
                  <li>Harga Kendaraan (OTR): <span id="outHarga">Rp. 0</span></li>
                  <li>Uang Muka Murni: <span id="outUangMukaMurni">Rp. 0</span></li>
                  <li>Plafon Pembiayaan: <span id="outPlafon">Rp. 0</span></li>
                  <li>Tenor: <span id="outTenor">0</span> bulan</li>
                  <li class="font-bold">Angsuran Perbulan: <span id="outAngsuran" class="text-red-700">Rp. 0</span></li>
                </ul>

                <h4 class="mt-6 font-bold">Rincian Biaya</h4>
                <ul class="space-y-1 text-gray-600">
                  <li>Asuransi jiwa
                  <li>Asuransi Kendaraan (TLO)
                  <li>Biaya Notaris
                  <li>Biaya Pengecekan Kendaraan
                  <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon
                </ul>
              </div>
            </div>
        </div>
    </section>
@endif

<!-- Simulasi Pembiayaan Renovasi Usaha-->
    @if($service->business_renovation_simulation)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
              
              <!-- Form Input -->
              <form id="simulasiForm" class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Renovasi Usaha</h2>

                <div class="space-y-4">
                  <div>
                    <label class="block font-semibold">Harga Kendaraan (OTR)</label>
                    <input type="text" id="hargaMobil" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Total Uang Muka</label>
                    <input type="text" id="uangMuka" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Tenor (Bulan)</label>
                    <select id="tenor" class="w-full border rounded p-2">
                      <option value="" selected disabled>Pilih tenor</option>
                      <option value="12">12</option>
                      <option value="24">24</option>
                      <option value="36">36</option>
                      <option value="48">48</option>
                      <option value="60">60</option>
                    </select>
                  </div>
                </div>

                <!-- Error Alert -->
                <div id="errorBox" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                  <ul id="errorList" class="list-disc pl-5 text-sm"></ul>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                  <button type="submit" 
                          class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Hitung Simulasi
                  </button>
                </div>
              </form>

              <!-- Ringkasan -->
              <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
                <ul class="space-y-2 text-gray-700">
                  <li>Harga Kendaraan (OTR): <span id="outHarga">Rp. 0</span></li>
                  <li>Uang Muka Murni: <span id="outUangMukaMurni">Rp. 0</span></li>
                  <li>Plafon Pembiayaan: <span id="outPlafon">Rp. 0</span></li>
                  <li>Tenor: <span id="outTenor">0</span> bulan</li>
                  <li class="font-bold">Angsuran Perbulan: <span id="outAngsuran" class="text-red-700">Rp. 0</span></li>
                </ul>

                <h4 class="mt-6 font-bold">Rincian Biaya</h4>
                <ul class="space-y-1 text-gray-600">
                  <li>Asuransi jiwa
                  <li>Asuransi Kendaraan (TLO)
                  <li>Biaya Notaris
                  <li>Biaya Pengecekan Kendaraan
                  <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon
                </ul>
              </div>
            </div>
        </div>
    </section>
@endif

<!-- Simulasi Pembiayaan -->
    @if($service->deposit_simulation)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
              
              <!-- Form Input -->
              <form id="simulasiForm" class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Deposit </h2>

                <div class="space-y-4">
                  <div>
                    <label class="block font-semibold">Harga Kendaraan (OTR)</label>
                    <input type="text" id="hargaMobil" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Total Uang Muka</label>
                    <input type="text" id="uangMuka" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Tenor (Bulan)</label>
                    <select id="tenor" class="w-full border rounded p-2">
                      <option value="" selected disabled>Pilih tenor</option>
                      <option value="12">12</option>
                      <option value="24">24</option>
                      <option value="36">36</option>
                      <option value="48">48</option>
                      <option value="60">60</option>
                    </select>
                  </div>
                </div>

                <!-- Error Alert -->
                <div id="errorBox" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                  <ul id="errorList" class="list-disc pl-5 text-sm"></ul>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                  <button type="submit" 
                          class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Hitung Simulasi
                  </button>
                </div>
              </form>

              <!-- Ringkasan -->
              <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
                <ul class="space-y-2 text-gray-700">
                  <li>Harga Kendaraan (OTR): <span id="outHarga">Rp. 0</span></li>
                  <li>Uang Muka Murni: <span id="outUangMukaMurni">Rp. 0</span></li>
                  <li>Plafon Pembiayaan: <span id="outPlafon">Rp. 0</span></li>
                  <li>Tenor: <span id="outTenor">0</span> bulan</li>
                  <li class="font-bold">Angsuran Perbulan: <span id="outAngsuran" class="text-red-700">Rp. 0</span></li>
                </ul>

                <h4 class="mt-6 font-bold">Rincian Biaya</h4>
                <ul class="space-y-1 text-gray-600">
                  <li>Asuransi jiwa
                  <li>Asuransi Kendaraan (TLO)
                  <li>Biaya Notaris
                  <li>Biaya Pengecekan Kendaraan
                  <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon
                </ul>
              </div>
            </div>
        </div>
    </section>
@endif

<!-- Simulasi Pembiayaan -->
    @if($service->saving_simulation)
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
              
              <!-- Form Input -->
              <form id="simulasiForm" class="bg-white shadow-md rounded-xl p-6">
                <h2 class="text-xl font-bold mb-6">Simulasi Pembiayaan Tabungan </h2>

                <div class="space-y-4">
                  <div>
                    <label class="block font-semibold">Harga Kendaraan (OTR)</label>
                    <input type="text" id="hargaMobil" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Total Uang Muka</label>
                    <input type="text" id="uangMuka" value="Rp. 0" class="w-full border rounded p-2 text-left" />
                  </div>

                  <div>
                    <label class="block font-semibold">Tenor (Bulan)</label>
                    <select id="tenor" class="w-full border rounded p-2">
                      <option value="" selected disabled>Pilih tenor</option>
                      <option value="12">12</option>
                      <option value="24">24</option>
                      <option value="36">36</option>
                      <option value="48">48</option>
                      <option value="60">60</option>
                    </select>
                  </div>
                </div>

                <!-- Error Alert -->
                <div id="errorBox" class="hidden mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                  <ul id="errorList" class="list-disc pl-5 text-sm"></ul>
                </div>

                <!-- Tombol Submit -->
                <div class="mt-6">
                  <button type="submit" 
                          class="w-full bg-gradient-to-r from-yellow-600 to-red-600 hover:from-red-700 hover:to-yellow-700 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Hitung Simulasi
                  </button>
                </div>
              </form>

              <!-- Ringkasan -->
              <div class="bg-white shadow-md rounded-xl p-6">
                <h3 class="text-lg font-bold mb-4">Ringkasan Pembiayaan</h3>
                <ul class="space-y-2 text-gray-700">
                  <li>Harga Kendaraan (OTR): <span id="outHarga">Rp. 0</span></li>
                  <li>Uang Muka Murni: <span id="outUangMukaMurni">Rp. 0</span></li>
                  <li>Plafon Pembiayaan: <span id="outPlafon">Rp. 0</span></li>
                  <li>Tenor: <span id="outTenor">0</span> bulan</li>
                  <li class="font-bold">Angsuran Perbulan: <span id="outAngsuran" class="text-red-700">Rp. 0</span></li>
                </ul>

                <h4 class="mt-6 font-bold">Rincian Biaya</h4>
                <ul class="space-y-1 text-gray-600">
                  <li>Asuransi jiwa
                  <li>Asuransi Kendaraan (TLO)
                  <li>Biaya Notaris
                  <li>Biaya Pengecekan Kendaraan
                  <li class="font-bold">Total Estimasi Biaya (±) 3% dari Plafon
                </ul>
              </div>
            </div>
        </div>
    </section>
@endif

    <!-- Related Services -->
    @if($relatedServices && $relatedServices->count() > 0)
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Produk Terkait</h2>
                    <p class="text-xl text-gray-600">Produk lain yang mungkin Anda butuhkan</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedServices as $relatedService)
                        <x-service-card :service="$relatedService" variant="compact" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <!-- <section class="py-20 bg-blue-900 text-white">
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Proyek Anda?</h2>
                                    <p class="text-xl mb-8 opacity-90 max-w-3xl mx-auto">
                                        Konsultasikan kebutuhan {{ $service->title }} Anda dengan tim expert kami dan dapatkan solusi terbaik
                                    </p>

                                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                        <a href="{{ route('contact') }}" class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                                            Dapatkan Penawaran
                                        </a>
                                        <a href="{{ route('projects.index') }}" class="border-2 border-white text-white hover:bg-white hover:text-blue-900 px-8 py-4 rounded-lg text-lg font-semibold transition-all">
                                            Lihat Portfolio
                                        </a>
                                    </div>
                                </div>
                            </section> -->
@endsection

<!-- JavaScript Toggle Accordion -->
<script>
    function toggleAccordion(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('icon-' + id);

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-90');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-90');
        }
    }
</script>