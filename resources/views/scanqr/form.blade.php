@csrf
<div>
    <label class="block">Nama Barang</label>
    <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang ?? '') }}" class="w-full border rounded p-2" required>
</div>

<div>
    <label class="block">Kode QR</label>
    <input type="text" name="kode_qr" value="{{ old('kode_qr', $barang->kode_qr ?? '') }}" class="w-full border rounded p-2" required>
</div>

<div>
    <label class="block">Rak</label>
    <select name="rak_id" class="w-full border rounded p-2" required>
        <option value="">-- Pilih Rak --</option>
        @foreach($raks as $rak)
            <option value="{{ $rak->id }}" @if(old('rak_id', $barang->rak_id ?? '') == $rak->id) selected @endif>
                {{ $rak->nama_rak }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <label class="block">Stok</label>
    <input type="number" name="stok" value="{{ old('stok', $barang->stok ?? 0) }}" class="w-full border rounded p-2" required>
</div>

<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>  