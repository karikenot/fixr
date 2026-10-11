<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Laporan Kerusakan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Laporkan Kerusakan / Masalah</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Judul Kerusakan:</label>
                <input type="text" name="judul" class="w-full border p-2 rounded" placeholder="Contoh: AC Ruang Rapat Mati" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Prioritas:</label>
                <select name="prioritas" class="w-full border p-2 rounded">
                    <option value="low">Rendah (Low)</option>
                    <option value="medium" selected>Sedang (Medium)</option>
                    <option value="high">Tinggi / Mendesak (High)</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Deskripsi Detail:</label>
                <textarea name="deskripsi" rows="4" class="w-full border p-2 rounded" placeholder="Jelaskan detail kerusakannya..." required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Kirim Laporan
            </button>
        </form>
    </div>
</body>
</html>