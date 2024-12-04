<?php
session_start(); 
if (basename($_SERVER['PHP_SELF']) != 'landingpage.php') {
    if (!isset($_SESSION['loggedin'])) {
        header("Location: ../../landingpage.php");
        exit(); 
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="bg-light dark:[color-scheme:light]">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/styles.css" rel="stylesheet">
    <title>Lestari - Marketplace</title>
      <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'poppins': ['Poppins', 'sans-serif']
          }
        }
      }
    }
  </script>
    <script>
        function toggleModal() {
            const modal = document.getElementById("location-modal");
            modal.classList.toggle("hidden");
        }
    </script>
</head>
<body class="font-poppins">
<!-- NAVBAR -->
<div class="navbar bg-light h-20 pr-10 justify-between sticky top-0 z-50">
   <!-- MOBILE SCREEN MODE -->
   <div class="navbar-start pl-1/2">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden" id="hamburger-btn">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h8m-8 6h16" />
            </svg>
            </div>
            <ul
            id="dropdown-menu"
            class="menu menu-sm dropdown-content bg-white rounded-box z-[1] mt-3 w-52 p-2 shadow hidden">
            <li><a href="../../landingpage.php">Home</a></li>
            <li><a href="../../user/tentang.php">Tentang kami</a></li>
            <li>
              <a>Layanan</a>
              <ul class="p-2">
                <!-- Drop Off -->
                <li>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <button onclick="window.location.href='../../user/drop_off/dropoff.php'" >
                        <p>Drop Off</p>
                    </button>
                    <?php else: ?>
                    <button onclick="showModal()" >
                        <p>Drop Off</p>
                    </button>
                    <?php endif; ?>
                </li>
                 <!-- Rewards -->
                <li>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <button onclick="window.location.href='../../user/drop_off/poin.php'" >
                        <p>Rewards</p>
                    </button>
                    <?php else: ?>
                    <button onclick="showModal()" >
                        <p>Rewards</p>
                    </button>
                    <?php endif; ?>
                </li>
                
                <!-- Marketplace -->
                <li>
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <button onclick="window.location.href='../../user/marketplace/marketplace.php'">
                        <p>Marketplace</p>
                    </button>
                    <?php else: ?>
                    <button onclick="showModal()" >
                        <p>Marketplace</p>
                    </button>
                    <?php endif; ?>
                </li>
                    </ul>
                </li>
            <li><a href="../../user/blog.php">Blog</a></li>
            <li><a href="../../user/kontak_kami.php">Kontak Kami</a></li>
          </ul>
        </div>
        <!-- BRAND LOGO -->
        <a href="." class="">
          <img src="../../images/Logo.png" alt="Logo Lestari">
        </a>
      </div>
<!-- DESKTOP MODE -->
<div class="navbar-center hidden lg:flex">
  <ul class="menu menu-horizontal px-1 text-dark text-base">
    <li><a href="../../landingpage.php">Home</a></li>
    <li><a href="../../user/tentang.php">Tentang kami</a></li>
    <li>
      <details>
        <summary>Layanan</summary>
        <ul class="bg-light absolute left-1/2 transform -translate-x-1/2 rounded-[10px] border-[1px] shadow-[0px_4px_4px_-0px_rgba(0,0,0,0.25)] border-gray px-[14px] py-[20px] flex flex-wrap items-center gap-3 min-w-[300px] max-w-[600px]">
          <!-- Drop Off -->
          <li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
              <button onclick="window.location.href='../../user/drop_off/dropoff.php'" class="btn btn-success flex-grow shadow-[0px_4px_4px_-0px_rgba(0,0,0,0.25)] rounded-[20px] flex items-center justify-center px-4 py-2 gap-2 min-w-[120px] max-w-[200px]">
                <img src="../../images/truck.png" class="w-8 h-8" alt="">
                <p>Drop Off</p>
              </button>
            <?php else: ?>
              <button onclick="showModal()" class="btn btn-success flex-grow shadow-[0px_4px_4px_-0px_rgba(0,0,0,0.25)] rounded-[20px] flex items-center justify-center px-4 py-2 gap-2 min-w-[120px] max-w-[200px]">
                <img src="../../images/truck.png" class="w-8 h-8" alt="">
                <p>Drop Off</p>
              </button>
            <?php endif; ?>
          </li>
          <!-- Rewards -->
          <li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
              <button onclick="window.location.href='../../user/drop_off/poin.php'" class="btn btn-success flex-grow shadow-[0px_4px_4px_-0px_rgba(0,0,0,0.25)] rounded-[20px] flex items-center justify-center px-4 py-2 gap-2 min-w-[120px] max-w-[200px]">
                <img src="../../images/reward.png" class="w-8 h-8" alt="">
                <p>Rewards</p>
              </button>
            <?php else: ?>
              <button onclick="showModal()" class="btn btn-success flex-grow shadow-[0px_4px_4px_-0px_rgba(0,0,0,0.25)] rounded-[20px] flex items-center justify-center px-4 py-2 gap-2 min-w-[120px] max-w-[200px]">
                <img src="../../images/reward.png" class="w-8 h-8" alt="">
                <p>Rewards</p>
              </button>
            <?php endif; ?>
          </li>
         
          <!-- Marketplace -->
          <li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
              <button onclick="window.location.href='../../user/marketplace/marketplace.php'" class="btn btn-success flex-grow shadow-[0px_4px_4px_-0px_rgba(0,0,0,0.25)] rounded-[20px] flex items-center justify-center px-4 py-2 gap-2 min-w-[120px] max-w-[200px]">
                <img src="../../images/marketplace.png" class="w-8 h-8" alt="">
                <p>Marketplace</p>
              </button>
            <?php else: ?>
              <button onclick="showModal()" class="btn btn-success flex-grow shadow-[0px_4px_4px_-0px_rgba(0,0,0,0.25)] rounded-[20px] flex items-center justify-center px-4 py-2 gap-2 min-w-[120px] max-w-[200px]">
                <img src="../../images/marketplace.png" class="w-8 h-8" alt="">
                <p>Marketplace</p>
              </button>
            <?php endif; ?>
          </li>
        </ul>
      </details>
    </li>
    <li><a href="../../user/blog.php">Blog</a></li>
    <li><a href="../../user/kontak_kami.php">Kontak Kami</a></li>
  </ul>
</div>


<!-- Profile -->
<div class="navbar-end ml-[5px] flex items-center gap-x-0 md:gap-4">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <!-- Dropdown User -->
        <div class="relative">
            <button class="font-medium text-sm text-[#1B5E20] focus:outline-none" onclick="toggleDropdown()">
                Halo, <?= htmlspecialchars($_SESSION['user_name']); ?> 
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-md z-10">
                <a href="../../user/profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                <a href="../../backend/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    <?php else: ?>
      <!-- Tombol Sign In dan Sign Up jika belum login -->
        <a href="../../user/signin.php" class="btn md:min-w-[100px] md:h-12 md:shadow-md md:rounded-full md:bg-gradient-to-r from-green to-dark-green md:text-sm md:border md:border-to-r md:from-green md:to-dark-green md:font-medium md:text-white md:text-center text-base bg-transparent text-sm text-[#1B5E20] border-0 shadow-none">
          Sign In
        </a>
        <a href="../../user/signup.php" class="btn btn-outline md:min-w-[100px] md:h-12 md:shadow-md md:border border-to-r from-green to-dark-green md:rounded-full md:text-sm md:font-medium md:text-[#1B5E20] md:text-center text-base bg-transparent text-sm text-[#1B5E20] border-0 shadow-none whitespace-nowrap">
          Sign Up
        </a>
    <?php endif; ?>
</div>

<script>
    // Toggle dropdown visibility
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown if clicked outside
    window.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdownMenu');
        const button = event.target.closest('button');
        // Jika yang diklik bukan tombol atau dropdown, sembunyikan dropdown
        if (!button || button.getAttribute('onclick') !== 'toggleDropdown()') {
            dropdown.classList.add('hidden');
        }
    });
</script>
    </div>
    <!-- navbar -->
    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const dropdownMenu = document.getElementById('dropdown-menu');

        hamburgerBtn.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
  <!-- NAVBAR END -->

  <!-- main content -->
  <main class="container mx-auto md:px-16 px-8 md:py-8 py-3">
    <h2 class="text-3xl font-bold text-[#1B5E20] mb-6">Marketplace</h2>
    <!-- Upload Box -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
      <div class="border-2 border-dashed border-green-900 rounded-lg p-8 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-[#1B5E20] mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 010-8h1a4 4 0 010 8h13m-3 0h-7m-4 0a4 4 0 01-.88-7.874M7 16v5a2 2 0 002 2h6a2 2 0 002-2v-5m-8-4l4-4m0 0l4 4m-4-4v12" />
        </svg>
        <p class="text-gray-500 font-medium">Drop Your File Here or <span class="text-[#1B5E20] font-semibold cursor-pointer">Browse</span></p>
      </div>
    </div>

    <!-- Product Details Form -->
    <div class="bg-white shadow-lg rounded-lg p-6">
      <form action="../../backend/products.php" method="POST" enctype="multipart/form-data" class="space-y-6">
        <!-- Foto Produk -->
        <div>
          <label for="marketplace_image" class="block text-lg font-bold text-[#1B5E20]">Foto Produk</label>
          <div class="mt-2 flex items-center space-x-4">
            <input
              type="file"
              name="marketplace_image"
              id="product-photo"
              accept="image/*"
              class="hidden"
              onchange="updateFileName(this)"
            />
            <label
              for="product-photo"
              class="px-4 py-2 bg-gradient-to-r from-green to-dark-green text-white rounded-lg shadow cursor-pointer hover:bg-green-900"
            >
              Pilih Gambar
            </label>
            <span id="file-name" class="text-gray-700">Belum ada file yang dipilih</span>
          </div>
        </div>

        <!-- Nama Produk -->
        <div>
          <label for="marketplace_product_name" class="block text-lg font-bold text-[#1B5E20]">Nama Produk</label>
          <input
            type="text"
            name="marketplace_product_name"
            id="product-name"
            class="w-full mt-2 border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Bunga Hias Mawar Plastik"
            required
          />
        </div>

        <!-- Harga Produk -->
        <div>
          <label for="marketplace_price" class="block text-lg font-bold text-[#1B5E20]">Harga Produk</label>
          <input
            type="number"
            name="marketplace_price"
            id="product-price"
            class="w-full mt-2 border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="15000"
            required
          />
        </div>

        <!-- Deskripsi Produk -->
        <div>
          <label for="marketplace_description" class="block text-lg font-bold text-[#1B5E20]">Deskripsi Produk</label>
          <textarea
            name="marketplace_description"
            id="product-description"
            rows="4"
            class="w-full mt-2 border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
            placeholder="Deskripsi produk..."
            required
          ></textarea>
        </div>

       <!-- Stock -->
        <div>
          <label for="marketplace_stock" class="block text-lg font-bold text-[#1B5E20]">Stock</label>
          <input 
            type="number" 
            name="marketplace_stock" 
            id="product-stock" 
            class="block w-full mt-2 border-gray-300 rounded-md shadow-sm focus:ring-[#1B5E20] focus:border-[#1B5E20]" 
            placeholder="Masukkan jumlah stock" 
            required
          >
        </div>

        <!-- Tombol Submit -->
        <button
          type="submit" onclick="toggleModal()"
          class="w-full py-3 bg-gradient-to-r from-green to-dark-green text-white font-semibold rounded-lg shadow hover:bg-green-900">
          Upload Produk
        </button>
      </form>
    </div>

    <!-- JavaScript untuk Update Nama File -->
    <script>
      function updateFileName(input) {
        const fileName = input.files[0] ? input.files[0].name : "Belum ada file yang dipilih";
        document.getElementById("file-name").textContent = fileName;
      }
    </script>
  </main>
<!-- Modal -->
<div id="rewardModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
  <div class="bg-white rounded-lg p-6 w-80 text-center relative">
    <div class="absolute top-2 right-2 cursor-pointer" onclick="toggleModal()">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
    <div class="mb-4">
      <img src="../../images/user/selamat.png" alt="Reward Icon" class="mx-auto">
    </div>
    <p class="text-green-700 font-semibold mb-4">Produk berhasil diunggah!</p>
    <div class="bg-green-50 border border-green-500 rounded-lg p-4 flex justify-center items-center mb-4">
      <span class="text-green-600 font-bold text-2xl">+ 100</span>
    </div>
    <button onclick="toggleModal(); window.location.href='../../user/marketplace/marketplace.php';" class="bg-gradient-to-r from-green to-dark-green text-white py-2 px-4 rounded-full shadow-lg hover:bg-green-600">
      Selesai
    </button>
  </div>
</div>

<script>
  function toggleModal() {
    document.getElementById("rewardModal").classList.toggle("hidden");
  }
</script>

<!-- Footer -->
<footer class="bg-gradient-to-r from-green to-dark-green text-white py-7">
  <div class="container mx-auto px-12">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <a href="../../landingpage.php">
        <img src="../../images/Logo.png" alt="Logo Lestari" class="h-20">
      </a>
    </div>
    
    <!-- Grid Container -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 text-center md:text-left">
      <!-- Bagian Lestari -->
      <div class="text-left col-span-1 md:col-span-1">
        <h4 class="font-bold mb-2">Lestari</h4>
        <a href="../../landingpage.php" class="block text-white hover:underline mb-1">Home</a>
        <a href="../../user/tentang.php" class="block text-white hover:underline mb-1">Tentang Kami</a>
        <a href="../../landingpage.php" class="block text-white hover:underline mb-1">Layanan</a>
        <a href="../../user/blog.php" class="block text-white hover:underline mb-1">Blog</a>
      </div>

      <!-- Bagian Informasi -->
      <div class="text-right md:text-center col-span-1 md:col-span-1">
        <h4 class="font-bold mb-2">Informasi</h4>
        <a href="../../user/kontak_kami.php" class="block text-white hover:underline mb-1">Kontak Kami</a>
      </div>

      <!-- Bagian Hubungi Kami -->
      <div class="col-span-2 md:col-span-1 text-center">
        <h4 class="font-bold mb-2">Hubungi Kami</h4>
        <div class="flex justify-center space-x-4 mt-2">
          <a href="#"><img src="../../images/user/sosmed/instagram.png" alt="Instagram"></a>
          <a href="#"><img src="../../images/user/sosmed/fb.png" alt="Facebook"></a>
          <a href="#"><img src="../../images/user/sosmed/x.png" alt="Twitter"></a>
          <a href="#"><img src="../../images/user/sosmed/wa.png" alt="Whatsapp"></a>
          <a href="#"><img src="../../images/user/sosmed/yt.png" alt="YouTube"></a>
        </div>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
