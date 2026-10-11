<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Laporan Masalah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Daftar Laporan Masalah</h2>
                <p class="text-gray-500 text-sm">Kelola dan pantau semua tiket kerusakan yang masuk.</p>
            </div>
            <a href="{{ route('tickets.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Buat Tiket Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b bg-gray-50 text-gray-600 text-sm">
                        <th class="p-3">ID</th>
                        <th class="p-3">Pelapor</th>
                        <th class="p-3">Judul Masalah</th>
                        <th class="p-3">Prioritas</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Tanggal Lapor</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($tickets as $ticket)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 font-mono font-bold text-gray-500">#{{ $ticket->id }}</td>
                            <td class="p-3 font-medium text-gray-800">
                                {{ $ticket->user->name ?? 'Guest / Anonim' }}
                            </td>
                            <td class="p-3">
                                <div class="font-semibold text-gray-800">{{ $ticket->judul }}</div>
                                <div class="text-xs text-gray-400 truncate max-w-xs">{{ $ticket->deskripsi }}</div>
                            </td>
                            <td class="p-3">
                                <span class="px-2.5 py-1 text-xs font-bold rounded-full uppercase
                                    {{ $ticket->prioritas == 'high' ? 'bg-red-100 text-red-700' : '' }}
                                    {{ $ticket->prioritas == 'medium' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $ticket->prioritas == 'low' ? 'bg-green-100 text-green-700' : '' }}">
                                    {{ $ticket->prioritas }}
                                </span>
                            </td>
                            <td class="p-3">
                                <span class="px-2.5 py-1 text-xs font-bold rounded-full uppercase
                                    {{ $ticket->status == 'open' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $ticket->status == 'in_progress' ? 'bg-purple-100 text-purple-700' : '' }}
                                    {{ $ticket->status == 'resolved' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $ticket->status == 'closed' ? 'bg-gray-100 text-gray-700' : '' }}">
                                    {{ str_replace('_', ' ', $ticket->status) }}
                                </span>
                            </td>
                            <td class="p-3 text-gray-500">
                                {{ $ticket->created_at->format('d M Y, H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-400">
                                Belum ada laporan tiket yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>